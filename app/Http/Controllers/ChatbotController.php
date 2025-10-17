<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function send(Request $request)
    {
        $message = $request->input('message');

        if (!$message) {
            return response()->json(['error' => 'Pesan kosong!'], 400);
        }

        try {
            // ✅ Pastikan hanya ada "https" (tidak "hhttps")
            $n8nUrl = 'https://imaginepresma.com/webhook/test-smkpp';

            // ✅ Kirim POST ke N8N
            $response = Http::timeout(10)->post($n8nUrl, [
                'message' => $message,
            ]);

            if ($response->successful()) {
                return response()->json([
                    'data' => ['reply' => $response->json()['reply'] ?? 'Tidak ada balasan dari N8N.']
                ]);
            } else {
                return response()->json([
                    'error' => 'Gagal menghubungi server n8n',
                    'details' => $response->body()
                ], $response->status());
            }

        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Gagal menghubungi server n8n',
                'details' => $th->getMessage(),
            ], 500);
        }
    }
}
