<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChatUser;
use App\Models\Chat;

class SideBarChats extends Component
{
    public function render()
    {   
        $myChats = ChatUser::where('user_id', auth()->user()->id)->get()->pluck('chat_id');

        $chats = ChatUser::select('chat_id', 'chat_name', 'users.name', 'user_id')
                    ->whereIn('chat_id', $myChats)
                    ->whereNot('user_id', auth()->user()->id)
                    ->join('users', 'users.id', '=', 'user_id')
                    ->join('chats', 'chat_id', '=', 'chats.id')
                ->get();
                     
        return view('livewire.side-bar-chats', [
            'chats' => $chats
        ]);
    }
}
