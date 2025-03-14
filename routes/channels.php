<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\User;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{chat_id}', function(User $users, $chat_id){
    return $users->chats()->where('chat_id', '=', $chat_id)->get()->isNotEmpty();
});
