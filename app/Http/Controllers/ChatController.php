<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Message;
use App\Notifications\NewMessageNotification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatUser;
use App\Events\ToWrite;


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

        $chat->messages =  $chat->messages?->sortBy('created_at')->groupBy(function($message, $key){
            return date('d/m/Y', strtotime($message->created_at));
        });
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

        $chat = Chat::find($request->chatId);
        $user = $chat->participants()->whereNot('user_id', $userTo->id)->first();
        
        $unreadMessages = Message::where('chat_id', $chat->id)->whereNot('user_id', $user->id)->where('read', 'false')->count();

        NewMessage::dispatch($userTo, $chat, $message);
        $user->notify(new NewMessageNotification($userTo, $chat,  $message, $unreadMessages));
    }

    public function updateReadMessage(Request $request)
    {
        $message = Message::find($request->idMessage);
        $message->read = 'true';
        $message->save();
    }

}
