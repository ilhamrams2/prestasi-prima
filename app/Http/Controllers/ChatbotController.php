<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Services\GeminiChatbotService; // Dihapus karena tidak digunakan lagi
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http; // Import untuk Http request
use Illuminate\Support\Facades\Session; // Ditambahkan untuk manajemen session
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Class ChatbotController
 * Menangani permintaan untuk chatbot menggunakan N8N sebagai perantara AI.
 * Riwayat chat dikelola langsung melalui Session Laravel.
 */
class ChatbotController extends Controller
{
    // Konstanta untuk kunci session riwayat chat
    private const CHAT_HISTORY_KEY = 'chatbot_history';
    protected string $n8nUrl = 'https://kiana-k423n8n.my.id/webhook/ilhamplenger'; // URL N8N Anda

    /**
     * Konstruktor: Tidak lagi menggunakan dependency injection.
     */
    public function __construct()
    {
        // Kontroler ini tidak lagi menggunakan service eksternal
    }

    /**
     * Helper function untuk mendapatkan riwayat chat dari session.
     * @return array
     */
    private function getChatHistory(): array
    {
        return Session::get(self::CHAT_HISTORY_KEY, []);
    }

    /**
     * Helper function untuk menyimpan pesan pengguna dan balasan AI ke riwayat.
     * @param string $userPrompt
     * @param string $aiReply
     */
    private function saveMessage(string $userPrompt, string $aiReply): void
    {
        $history = $this->getChatHistory();

        // Simpan pesan pengguna
        $history[] = [
            'role' => 'user',
            'text' => $userPrompt,
        ];

        // Simpan balasan AI
        $history[] = [
            'role' => 'model',
            'text' => $aiReply,
        ];

        Session::put(self::CHAT_HISTORY_KEY, $history);
    }

    /**
     * Helper function untuk menghapus riwayat chat dari session.
     */
    private function clearChatHistory(): void
    {
        Session::forget(self::CHAT_HISTORY_KEY);
    }
    
    /**
     * Helper function untuk mengekstrak teks balasan dari respons N8N.
     * Mencoba beberapa kunci umum: 'reply', 'text', 'output', atau 'message'.
     *
     * @param array $responseBody
     * @return string|null
     */
private function extractReplyText(?array $responseBody): ?string
{
    if ($responseBody === null) {
        return 'Maaf, saya tidak mendapatkan respon dari AI.';
    }

    $keys = ['reply', 'text', 'output', 'message'];
    
    foreach ($keys as $key) {
        if (isset($responseBody[$key]) && is_string($responseBody[$key])) {
            return $responseBody[$key];
        }
    }
    
    // Kasus N8N mengembalikan array data (misalnya [0] => {reply: "..."}).
    if (isset($responseBody[0]) && is_array($responseBody[0])) {
        return $this->extractReplyText($responseBody[0]);
    }
    
    return 'Maaf, saya belum bisa memproses respon AI.';
}


    /**
     * Mengirim pesan dari pengguna ke N8N/Gemini dan mengembalikan balasan.
     * Endpoint: POST /send
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(Request $request)
    {
        try {
            // PERBAIKAN: Mengubah kunci validasi dari 'prompt' menjadi 'content'
            $request->validate(['content' => 'required|string|max:2000']);
        } catch (ValidationException $e) {
            return response()->json([
                'reply' => 'Maaf, pesan Anda terlalu panjang atau tidak valid.'
            ], 422);
        }

        $prompt = $request->input('content');

        try {
            // 1. Ambil riwayat chat dari session
            $history = $this->getChatHistory();

            // 2. Format riwayat dan prompt untuk dikirim ke N8N
            $response = Http::withoutVerifying()->timeout(15)->post($this->n8nUrl, [
                'content' => $prompt,
                'history' => $history,
            ]);

            if ($response->successful()) {
                $responseBody = $response->json();

                // EKSTRAKSI: Menggunakan helper untuk mendapatkan teks balasan
                $extractedReply = $this->extractReplyText($responseBody);

                // 3. Ekstraksi SEMUA Tag Navigasi (multiple buttons)
                $navigationButtons = [];
                $pattern = '~\[NAVIGATE_TO:\[([^\]]+)\]\|([^\]]+)\]~';

                // Extract all navigation tags from original reply
                preg_match_all($pattern, $extractedReply, $matches, PREG_SET_ORDER);
                foreach ($matches as $match) {
                    $navigationButtons[] = [
                        'text' => trim($match[1]),
                        'url' => trim($match[2])
                    ];
                }

                // Remove all navigation tags from reply text for display
                $replyText = preg_replace($pattern, '', $extractedReply);
                $replyText = trim($replyText);

                // 4. Simpan prompt dan balasan AI ASLI (dengan tag navigasi) ke riwayat
                $this->saveMessage($prompt, $extractedReply);

                // 5. Kembalikan respons JSON yang terstruktur
                return response()->json([
                    'reply' => $replyText,
                    'navigation' => $navigationButtons,
                    'debug_history_count' => count($this->getChatHistory())
                ]);

            } else {
                // Gagal menghubungi N8N (4xx atau 5xx)
                Log::error("N8N HTTP Error", [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return response()->json([
                    'reply' => 'Gagal menghubungi server AI (N8N). Status: ' . $response->status(),
                    'details' => $response->body()
                ], $response->status());
            }

        } catch (Throwable $e) {
            // Log error internal dengan detail lengkap untuk debugging
            Log::error("Chatbot N8N/Session Error", [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'reply' => 'Maaf, terjadi kesalahan tak terduga pada server.',
                'details' => config('app.debug') ? $e->getMessage() : 'Internal Server Error'
            ], 500);
        }
    }

    /**
     * Menghapus riwayat chat dari session.
     * Endpoint: POST /chatbot/clear
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function clear()
    {
        try {
            $this->clearChatHistory();
            // Mengembalikan respons JSON 200 (Sukses)
            return response()->json(['message' => 'Chat history cleared']);
        } catch (Throwable $e) {
            // Log error internal
            Log::error("Chatbot Clear History Error: " . $e->getMessage());
            // Mengembalikan respons JSON 500
            return response()->json(['message' => 'Gagal menghapus riwayat.'], 500);
        }
    }
}


