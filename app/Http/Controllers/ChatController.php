<?php

namespace App\Http\Controllers;

use App\Models\ChatParticipants;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatUser;


class ChatController extends Controller
{   
    public function chat($idUser)
    {  
        $chat = Chat::with('messages')->whereHas('participants', function($query){
            $query->where('user_id', auth()->id());
        })->whereHas('participants', function($query) use($idUser){
            $query->where('user_id', $idUser);
        })->first();
        
        $userFrom = User::find($idUser);

        if(!$chat){
            $chat = Chat::create();
            ChatUser::create(['chat_id' => $chat->id, 'user_id' => auth()->user()->id]);
            ChatUser::create(['chat_id' => $chat->id, 'user_id' => $idUser]);
        }

        $chat->messages =  $chat->messages?->sortBy('created_at');
        return view('chat', ['user' => $userFrom, 'chat' => $chat, 'userTo' => auth()->user()]);
        
    }

    public function store(Request $request)
    {
        $userTo = auth()->user()->id;
        $createMessage = Message::create([
            'chat_id' => $request->chatId,
            'content' => $request->content,
            'user_id' => $userTo 
        ]);

        return response()->json(['status' => 'created']);
    }

}
