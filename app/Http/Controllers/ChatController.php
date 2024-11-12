<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ChatController extends Controller
{
    public function index($id)
    {
        // Mensagens aqui
        $usuarios = User::select('username', 'name', 'id')->get();
        return view('chat', ['usuarios' => $usuarios]);
    }
}
