<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Message;
use App\Notifications\NewMessageNotification;
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
        
        Message::where(['chat_id' => $chat->id, 'read' => 'false'])->whereNot('user_id', auth()->id())->update(['read' => 'true']);

        $chat->messages =  $chat->messages?->sortBy('created_at');
        return view('chat', ['user' => $userFrom, 'chat' => $chat, 'userTo' => auth()->user()]);
        
    }

    public function store(Request $request, Chat $chat)
    {   
        $userTo = auth()->user();
        $message = Message::create([
            'chat_id' => $request->chatId,
            'content' => $request->content,
            'read' => 'false',
            'user_id' => $userTo->id 
        ]);

        $user = $chat->participants()->whereNot('user_id', $userTo->id)->toRawSql();
        $unreadMessages = Message::whereNot('user_id', $userTo->id)
                            ->where('chat_id', $chat->id)->where('read', 'false')
                        ->count();
        
        $user->notify(new NewMessageNotification($userTo->id , $chat,  $message, $unreadMessages));
        NewMessage::dispatch($userTo, $chat, $message);
    }

    public function updateReadMessage(Request $request)
    {
        $message = Message::find($request->idMessage);
        $message->read = 'true';
        $message->save();
    }

}
