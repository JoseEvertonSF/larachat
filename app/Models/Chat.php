<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function participants()
    {
        return $this->belongsToMany(User::class)->using(ChatUser::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }


}
