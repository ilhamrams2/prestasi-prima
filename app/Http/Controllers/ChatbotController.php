<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeminiChatbotService;
use Illuminate\Validation\ValidationException;

class ChatbotController extends Controller
{
    protected GeminiChatbotService $geminiService;

    // Lakukan Dependency Injection untuk Service
    public function __construct(GeminiChatbotService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    /**
     * Mengirim pesan dan menerima balasan dari Gemini Chatbot.
     * Endpoint: POST /api/chatbot/send
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(Request $request)
    {
        try {
            // Validasi input: prompt wajib ada dan tidak boleh lebih dari 2000 karakter.
            $request->validate([
                'prompt' => 'required|string|max:2000',
                // Model name diterima dari frontend UI (opsional)
                'model' => 'sometimes|string' 
            ]);
        } catch (ValidationException $e) {
            // Jika validasi gagal
            return response()->json([
                'reply' => 'Maaf, pesan Anda tidak valid atau terlalu panjang.'
            ], 422);
        }

        // Tentukan nama model. Gunakan 'gemini-2.5-flash' sebagai default.
        // Nama model ini dikirim dari UI (HTML) dan diteruskan ke Service.
        $modelName = $request->input('model', 'gemini-2.5-flash'); 
        
        // Panggil service untuk mendapatkan balasan
        $reply = $this->geminiService->sendMessage(
            $request->input('prompt'), 
            $modelName
        );

        return response()->json(['reply' => $reply]);
    }

    /**
     * Menghapus riwayat chat.
     * Endpoint: POST /api/chatbot/clear
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function clearHistory()
    {
        $this->geminiService->clearChatHistory();
        return response()->json(['message' => 'Chat history cleared']);
    }
}
