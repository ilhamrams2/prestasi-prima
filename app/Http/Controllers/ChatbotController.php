<?php

namespace App\Http\Controllers;

use App\Services\GeminiChatbotService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    protected $chatbotService;

    public function __construct(GeminiChatbotService $chatbotService)
    {
        $this->chatbotService = $chatbotService;
    }

    public function sendMessage(Request $request)
    {
        try {
            $validated = $request->validate([
                'prompt' => 'required|string|max:1000',
            ]);

            $reply = $this->chatbotService->sendMessage($validated['prompt']);
            
            return response()->json(['reply' => $reply]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Input tidak valid.'], 422);
        } catch (\Exception $e) {
            // Log the detailed error for server-side debugging
            Log::error('Chatbot Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json(['reply' => 'Maaf, terjadi kesalahan. Silakan coba lagi.'], 500);
        }
    }

    public function clearChat()
    {
        $this->chatbotService->clearChatHistory();
        return response()->json(['message' => 'Chat history cleared.']);
    }

    public function getChatHistory()
    {
        $history = Session::get(GeminiChatbotService::CHAT_HISTORY_KEY, []);
        return response()->json(['history' => $history]);
    }
}
