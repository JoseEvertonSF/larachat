<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;
use App\Models\ChatUser;
use App\Models\Chat;

class SideBarChats extends Component
{
    public function render()
    {   
        $myChats = ChatUser::where('user_id', auth()->user()->id)->get()->pluck('chat_id');

        $chats = Chat::with(['messages' => function($query) use($myChats){
                $query->orderBy('created_at', 'DESC')->take(1);
        }])->with(['participants' => function($query) use($myChats){
                $query->whereIn('chat_id', $myChats)->whereNot('user_id', auth()->user()->id);
        }])->get();

        return view('livewire.side-bar-chats', [
            'chats' => $chats
        ]);
    }
}
