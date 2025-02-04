<?php

namespace App\Http\Controllers;

use App\Models\ChatParticipants;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatUser;
use Illuminate\Support\Facades\DB;


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
        return view('chat', ['user' => $userFrom, 'chat' => $chat, 'users' => []]);
        
    }

    public function store()
    {
        
    }


}
