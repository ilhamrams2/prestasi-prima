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

        // Daftar tanggapan yang lebih bervariasi untuk berbagai topik
        $responseVariations = [
            'registration' => [
                "Tentu, silakan gunakan tombol berikut untuk melanjutkan pendaftaran.",
                "Anda dapat memulai proses pendaftaran dengan menekan tombol ini.",
                "Silakan klik tombol di bawah ini untuk menuju halaman pendaftaran.",
                "Tentu, Anda bisa mendaftar melalui tombol ini."
            ],
            'gallery' => [
                "Silakan lihat galeri kami untuk melihat foto-foto kegiatan siswa.",
                "Ingin melihat keseruan di sekolah kami? Klik tombol di bawah ini untuk melihat galeri foto.",
                "Kami memiliki banyak momen berharga di galeri foto. Silakan kunjungi melalui tombol ini."
            ],
            'greeting' => [
                "Halo! Saya asisten virtual SMK Prestasi Prima. Ada yang bisa saya bantu?",
                "Selamat datang! Saya siap membantu Anda. Silakan ketik pertanyaan Anda.",
                "Hai, saya chatbot dari SMK Prestasi Prima. Apa yang bisa saya bantu hari ini?",
            ],
            'principal_speech' => [
                "Silakan baca sambutan dari kepala sekolah kami.",
                "Untuk mengetahui visi dan misi sekolah, silakan baca sambutan kepala sekolah di halaman ini.",
                "Anda bisa membaca kata-kata dari kepala sekolah kami melalui tombol berikut."
            ]
        ];

        $reply = null;
        
        if (str_contains($messageLower, 'daftar') || str_contains($messageLower, 'pendaftaran') || str_contains($messageLower, 'formulir')) {
            $randomReply = $responseVariations['registration'][array_rand($responseVariations['registration'])];
            $reply = $randomReply . "\n\n[NAVIGATE_TO:Formulir Pendaftaran|/pendaftaran]";
        } elseif (str_contains($messageLower, 'galeri') || str_contains($messageLower, 'foto')) {
            $randomReply = $responseVariations['gallery'][array_rand($responseVariations['gallery'])];
            $reply = $randomReply . "\n\n[NAVIGATE_TO:Galeri Sekolah|/galeri]";
        } elseif (str_contains($messageLower, 'sambutan') || str_contains($messageLower, 'kepala sekolah') || str_contains($messageLower, 'direktur')) {
            $randomReply = $responseVariations['principal_speech'][array_rand($responseVariations['principal_speech'])];
            $reply = $randomReply . "\n\n[NAVIGATE_TO:Sambutan|/sambutan]";
        } else {
            $reply = $this->getResponse($message, $history);
        }

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
            Respons AI: 'Orang yang paling ganteng di smk prestasi prima adalah subyektif dan tergantung pada preferensi masing-masing orang. Kami sarankan Anda mengunjungi galeri foto kami untuk melihat siswa-siswa kami: [NAVIGATE_TO:Galeri Foto|/galeri]'
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
