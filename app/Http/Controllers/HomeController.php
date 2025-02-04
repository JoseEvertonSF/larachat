<?php

namespace App\Http\Controllers;

use App\Models\ChatParticipants;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatUser;

class HomeController extends Controller
{   
    public function index()
    {   
        return view('home');
    }
}
