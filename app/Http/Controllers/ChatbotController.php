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
    private function extractReplyText(array $responseBody): ?string
    {
        $keys = ['reply', 'text', 'output', 'message'];
        
        foreach ($keys as $key) {
            if (isset($responseBody[$key]) && is_string($responseBody[$key])) {
                return $responseBody[$key];
            }
        }
        
        // Kasus N8N mengembalikan array data (misalnya [0] => {reply: "..."})
        if (isset($responseBody[0]) && is_array($responseBody[0])) {
            return $this->extractReplyText($responseBody[0]);
        }
        
        return null;
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

        // PERBAIKAN: Mengambil input menggunakan kunci 'content'
        $prompt = $request->input('content');
        $replyText = '';
        $navigation = null;

        try {
            // 1. Ambil riwayat chat dari session
            $history = $this->getChatHistory(); 

            // 2. Format riwayat dan prompt untuk dikirim ke N8N
            // Asumsi N8N mengharapkan 'content' (pesan baru) dan 'history'
            $response = Http::withoutVerifying()->timeout(15)->post($this->n8nUrl, [
                'content' => $prompt, // Pesan baru dari user
                'history' => $history, // Riwayat chat lengkap
            ]);

            if ($response->successful()) {
                $responseBody = $response->json();
                
                // EKSTRAKSI: Menggunakan helper untuk mendapatkan teks balasan
                $extractedReply = $this->extractReplyText($responseBody);

                if (!$extractedReply) {
                    // Log jika N8N berhasil dihubungi tapi balasan tidak ditemukan
                    Log::error("N8N Reply Format Error: Reply key not found in response body.", ['body' => $responseBody]);
                    $extractedReply = 'Maaf, server AI merespons, tetapi balasan dalam format yang tidak diharapkan.';
                }

                $replyText = $extractedReply;
                
                // 3. Ekstraksi Tag Navigasi
                $pattern = '~\[NAVIGATE_TO:\[(.*?)\]\|(.*?)\]~';
                $replyText = preg_replace_callback($pattern, function ($matches) use (&$navigation) {
                    $navigation = [
                        'text' => $matches[1], // Teks Tombol
                        'url' => $matches[2],  // URL Tujuan
                    ];
                    return ''; // Hapus tag dari teks balasan utama
                }, $replyText);

                $replyText = trim($replyText);

                // 4. Simpan prompt dan balasan AI ke riwayat menggunakan Session Helper
                $this->saveMessage($prompt, $replyText);

                // 5. Kembalikan respons JSON yang terstruktur
                return response()->json([
                    'reply' => $replyText,
                    'navigation' => $navigation,
                    'debug_history_count' => count($this->getChatHistory()) // Optional: for debugging
                ]);

            } else {
                // Gagal menghubungi N8N (4xx atau 5xx)
                return response()->json([
                    'reply' => 'Gagal menghubungi server AI (N8N). Status: ' . $response->status(),
                    'details' => $response->body()
                ], $response->status());
            }

        } catch (Throwable $e) {
            // Log error internal dan berikan pesan JSON 500
            Log::error("Chatbot N8N/Session Error: " . $e->getMessage());
            return response()->json([
                'reply' => 'Maaf, terjadi kesalahan tak terduga pada server.',
                'details' => $e->getMessage()
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
