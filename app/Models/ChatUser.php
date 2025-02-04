<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ChatUser extends Pivot
{
    Use HasFactory;

    protected $fillable = [
        'chat_id',
        'user_id'
    ];
}
