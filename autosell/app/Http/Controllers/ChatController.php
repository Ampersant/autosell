<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function message_send(Request $request){
        $chatId = $request->chatId;
        $text = $request->input('message');
        $user = Auth::user();
        $message = Message::create([
            'text' => $text,
            'user_id' => $user->id,
            'chat_id' => $chatId
        ]);
        MessageEvent::dispatch($user, $message);
    }
}
