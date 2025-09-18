<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeminiChatbotService; // Import service-nya

class ChatbotController extends Controller
{
    protected GeminiChatbotService $chatbotService;

    // Lakukan Dependency Injection di sini
    public function __construct(GeminiChatbotService $chatbotService)
    {
        $this->chatbotService = $chatbotService;
    }

    public function sendMessage(Request $request)
    {
        $request->validate(['prompt' => 'required|string']);

        $prompt = $request->input('prompt');

       
        $reply = $this->chatbotService->getResponse($prompt);
        
        // Kembalikan respons dalam format JSON
        return response()->json(['reply' => $reply]);
    }
}
