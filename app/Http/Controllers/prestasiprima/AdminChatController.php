<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\prestasiprima\AdminChat;
use App\Events\AdminMessageSent;

class AdminChatController extends Controller
{
    public function index()
    {
        return AdminChat::orderBy('created_at', 'asc')->take(50)->get();
    }

    public function store(Request $request)
    {
        $user = auth('authPP')->user();
        
        $chat = AdminChat::create([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'message' => $request->message,
        ]);

        broadcast(new AdminMessageSent($chat))->toOthers();

        return $chat;
    }
}
