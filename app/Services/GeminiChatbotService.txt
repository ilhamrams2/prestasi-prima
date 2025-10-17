<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Exception;
use Throwable;

class GeminiChatbotService
{
    public const CHAT_HISTORY_KEY = 'gemini.chat_history';
    protected string $apiKey;
    protected string $apiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/';
    
    // Daftar halaman penting untuk System Instruction
    protected array $importantPages = [
        '- Halaman Utama: /',
        '- Penerimaan Siswa Baru: /pendaftaran',
        '- Prestasi: /prestasi',
        '- Formulir Pendaftaran: /formulir',
        '- Galeri: /galeri',
        '- Sambutan: /sambutan',
        '- Kontak: /contact',
        '- Presmalancer: /presmalance',
    ];

    public function __construct()
    {
        // Mengambil kunci API dari environment
        $this->apiKey = env('GEMINI_API_KEY');
    }

    /**
     * Mengirim pesan ke Gemini AI, menggunakan logika pre-processing untuk navigasi cepat.
     *
     * @param string $message Pesan dari pengguna.
     * @param string $modelName Nama model Gemini yang akan digunakan (mis. gemini-2.5-flash).
     * @return string Balasan dari chatbot (termasuk tag NAVIGATE_TO jika ada).
     */
    public function sendMessage(string $message, string $modelName): string
    {
        $history = Session::get(self::CHAT_HISTORY_KEY, []);
        $messageLower = strtolower($message);
        $reply = null;

        // 1. Simpan pesan pengguna ke riwayat sementara
        $history[] = [
            'role' => 'user',
            'text' => $message,
        ];

        // 2. Logika Pre-processing (Jawaban Cepat Tanpa Panggil API)
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
            'principal_speech' => [
                "Silakan baca sambutan dari kepala sekolah kami.",
                "Untuk mengetahui visi dan misi sekolah, silakan baca sambutan kepala sekolah di halaman ini.",
                "Anda bisa membaca kata-kata dari kepala sekolah kami melalui tombol berikut."
            ]
        ];

        if (str_contains($messageLower, 'daftar') || str_contains($messageLower, 'pendaftaran') || str_contains($messageLower, 'formulir')) {
            $randomReply = $responseVariations['registration'][array_rand($responseVariations['registration'])];
            $reply = $randomReply . "\n\n[NAVIGATE_TO:Formulir Pendaftaran|/pendaftaran]";
        } elseif (str_contains($messageLower, 'galeri') || str_contains($messageLower, 'foto')) {
            $randomReply = $responseVariations['gallery'][array_rand($responseVariations['gallery'])];
            $reply = $randomReply . "\n\n[NAVIGATE_TO:Galeri Sekolah|/galeri]";
        } elseif (str_contains($messageLower, 'sambutan') || str_contains($messageLower, 'kepala sekolah') || str_contains($messageLower, 'direktur')) {
            $randomReply = $responseVariations['principal_speech'][array_rand($responseVariations['principal_speech'])];
            $reply = $randomReply . "\n\n[NAVIGATE_TO:Sambutan Kepala Sekolah|/sambutan]";
        } 
        
        // 3. Jika tidak ada jawaban cepat, panggil API Gemini
        else {
            $reply = $this->getResponse($message, $modelName, $history);
        }

        // 4. Simpan balasan AI ke riwayat
        $history[] = [
            'role' => 'model',
            'text' => $reply,
        ];

        Session::put(self::CHAT_HISTORY_KEY, $history);

        return $reply;
    }

    /**
     * Mengirim permintaan ke API Gemini.
     *
     * @param string $prompt Pesan pengguna saat ini.
     * @param string $modelName Nama model Gemini.
     * @param array $history Riwayat chat.
     * @return string Balasan dari AI.
     */
    protected function getResponse(string $prompt, string $modelName, array $history = []): string
    {
        if (empty($this->apiKey)) {
            return "Maaf, kunci API tidak ditemukan. Silakan tambahkan GEMINI_API_KEY ke file .env Anda.";
        }

        try {
            // Instruksi sistem
            $systemInstruction = "Anda adalah asisten virtual untuk website SMK Prestasi Prima. Tugas Anda adalah membantu pengguna menemukan informasi di website. Selalu berikan respons dalam Bahasa Indonesia yang formal dan sopan. Jika pengguna meminta untuk dinavigasikan ke suatu halaman atau Anda merasa sebuah halaman relevan, berikan respons yang menyisipkan tag navigasi di dalamnya. Tag harus dalam format: [NAVIGATE_TO:[Teks Tombol]|/url].

            Contoh Respons dengan Navigasi:
            'Untuk info lebih lanjut tentang prestasi sekolah, silakan kunjungi halaman ini: [NAVIGATE_TO:Lihat Prestasi Kami|/prestasi]'
            
            Berikut adalah daftar halaman penting yang bisa Anda rekomendasikan:
            " . implode("\n", $this->importantPages);

            $contents = [];
            
            // Konversi riwayat ke format API, selalu masukkan systemInstruction sebagai teks pertama
            foreach ($history as $message) {
                // Pastikan role-nya sesuai (user/model) dan tidak terlalu banyak untuk menghindari error payload besar.
                $contents[] = [
                    'role' => $message['role'],
                    'parts' => [
                        ['text' => $message['text']]
                    ]
                ];
            }
            
            // Tambahkan System Instruction ke awal array contents jika ini adalah sesi baru (atau di setiap prompt sebagai system instruction)
            // Namun, karena Gemini API mendukung System Instruction terpisah, kita akan menggunakan fitur itu:
            
            $payload = [
                'contents' => $contents,
                'systemInstruction' => [
                    'parts' => [
                        ['text' => $systemInstruction]
                    ]
                ]
            ];

            $response = Http::withHeaders(['Content-Type' => 'application/json'])
                ->post($this->apiUrl . $modelName . ':generateContent?key=' . $this->apiKey, $payload);

            if ($response->successful()) {
                $content = $response->json();
                
                if (isset($content['candidates'][0]['content']['parts'][0]['text'])) {
                    return $content['candidates'][0]['content']['parts'][0]['text'];
                }
                
                return "Maaf, AI tidak memberikan balasan yang valid. Silakan coba pertanyaan lain.";
            } else {
                $errorInfo = $response->json();
                $errorMessage = $errorInfo['error']['message'] ?? 'Kesalahan tidak diketahui.';

                // Penanganan Error Overload/Quota
                if (str_contains($errorMessage, 'The model is overloaded') || str_contains($errorMessage, 'quota') || str_contains($errorMessage, 'rate') || $response->status() === 503 || $response->status() === 429) {
                    // Pesan ini dikirim jika terjadi overload atau rate limit.
                    return "Maaf, AI Prestasi Prima sedang mengalami beban tinggi (overloaded). Silakan tunggu sebentar dan coba lagi. Ini bukan kesalahan Anda.";
                }

                // Penanganan Error API key
                if ($response->status() === 400 && str_contains($errorMessage, 'API key')) {
                    return "Maaf, Kunci API Anda tidak valid atau kuota habis. Silakan periksa kunci GEMINI_API_KEY di file .env Anda.";
                }

                return "Maaf, terjadi kesalahan saat menghubungi AI: " . $errorMessage . " (Code: " . $response->status() . ")";
            }
        } catch (Throwable $e) {
            return "Maaf, terjadi kesalahan tak terduga: " . $e->getMessage();
        }
    }

    /**
     * Menghapus riwayat chat dari session.
     */
    public function clearChatHistory(): void
    {
        Session::forget(self::CHAT_HISTORY_KEY);
    }
}
