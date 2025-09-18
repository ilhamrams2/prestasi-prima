<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class GeminiChatbotService
{
    public const CHAT_HISTORY_KEY = 'gemini.chat_history';
    protected string $apiKey;
    protected string $model = 'gemini-1.5-flash-latest';
    protected string $apiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/';

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
    }

    public function sendMessage(string $message): string
    {
        $history = Session::get(self::CHAT_HISTORY_KEY, []);
        $messageLower = strtolower($message);

        // Tambahkan pesan user ke histori
        $history[] = [
            'role' => 'user',
            'text' => $message,
        ];

        // Deteksi niat pengguna
        if (str_contains($messageLower, 'daftar') || str_contains($messageLower, 'pendaftaran') || str_contains($messageLower, 'formulir')) {
            $reply = "Tentu, Anda bisa mendaftar melalui tombol ini.\n\n[NAVIGATE_TO:Formulir Pendaftaran|/formulir]";
        } elseif (str_contains($messageLower, 'galeri') || str_contains($messageLower, 'foto')) {
            $reply = "Silakan lihat galeri kami untuk melihat foto-foto kegiatan siswa.\n\n[NAVIGATE_TO:Galeri Sekolah|/galeri]";
        } elseif (str_contains($messageLower, 'sambutan') || str_contains($messageLower, 'kepala sekolah') || str_contains($messageLower, 'direktur')) {
            $reply = "Silakan baca sambutan dari kepala sekolah kami.\n\n[NAVIGATE_TO:Sambutan|/sambutan]";
        } else {
            // Panggil API Gemini jika tidak ada niat khusus
            $reply = $this->getResponse($message, $history);
        }

        // Tambahkan balasan (baik dari logika if/else maupun dari Gemini) ke histori
        $history[] = [
            'role' => 'model',
            'text' => $reply,
        ];

        Session::put(self::CHAT_HISTORY_KEY, $history);

        return $reply;
    }

    public function getResponse(string $prompt, array $history = []): string
    {
        if (empty($this->apiKey)) {
            return "Maaf, kunci API tidak ditemukan. Silakan tambahkan GEMINI_API_KEY ke file .env Anda.";
        }

        try {
            // Instruksi sistem untuk AI
            $systemInstruction = "Anda adalah asisten virtual untuk website SMK Prestasi Prima. Tugas Anda adalah membantu pengguna menemukan informasi di website. Jika pengguna meminta untuk dinavigasikan ke suatu halaman, berikan respons yang menyisipkan tag navigasi di dalamnya. Tag harus dalam format: [NAVIGATE_TO:[Teks Tombol]|/url]. Jika tidak, jawablah secara normal.

            Contoh:
            pengguna: 'Siapa orang paling ganteng di seluruh smk prestasi prima?'
            Respons AI: 'Orang yang paling ganteng di smk prestasi prima adalah siswa bernama Zwingli Savanarola Lubis'
            Pengguna: 'Bawa saya ke halaman pendaftaran'
            Respons AI: 'Tentu, silakan klik tombol di bawah ini: [NAVIGATE_TO:Halaman Pendaftaran Siswa|/pendaftaran]'.
            
            Berikut adalah daftar halaman penting yang bisa Anda rekomendasikan:
            - Halaman Utama: /
            - Penerimaan Siswa Baru: /pendaftaran
            - prestasi: /prestasi
            - Formulir Pendaftaran: /formulir
            - Galeri: /galeri
            - Sambutan: /sambutan
            - Kontak: /contact
            ";

            $contents = [];
            if (empty($history)) {
                $promptWithInstruction = $systemInstruction . "\n\n" . $prompt;
                $contents[] = [
                    'role' => 'user',
                    'parts' => [['text' => $promptWithInstruction]]
                ];
            } else {
                foreach ($history as $message) {
                    $contents[] = [
                        'role' => $message['role'],
                        'parts' => [
                            ['text' => $message['text']]
                        ]
                    ];
                }
                
                $contents[] = [
                    'role' => 'user',
                    'parts' => [['text' => $prompt]]
                ];
            }

            $response = Http::post($this->apiUrl . $this->model . ':generateContent?key=' . $this->apiKey, [
                'contents' => $contents
            ]);

            if ($response->successful()) {
                $content = $response->json();
                
                if (isset($content['candidates'][0]['content']['parts'][0]['text'])) {
                    return $content['candidates'][0]['content']['parts'][0]['text'];
                }
                
                return "Maaf, terjadi kesalahan saat memproses balasan dari AI.";
            } else {
                $errorInfo = $response->json();
                $errorMessage = $errorInfo['error']['message'] ?? 'Kesalahan tidak diketahui.';

                if (strpos($errorMessage, 'The model is overloaded') !== false || strpos($errorMessage, 'quota') !== false || strpos($errorMessage, 'rate') !== false || $response->status() === 503) {
                    return "Maaf, AI Prestasi Prima sedang kebanyakan menerima request, mohon coba lagi.";
                }

                return "Maaf, terjadi kesalahan saat menghubungi AI: " . $errorMessage;
            }
        } catch (\Exception $e) {
            return "Maaf, terjadi kesalahan saat menghubungi AI: " . $e->getMessage();
        }
    }

    public function clearChatHistory(): void
    {
        Session::forget(self::CHAT_HISTORY_KEY);
    }
}
