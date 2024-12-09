<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{   
    public function index()
    {   
        $usuarios = User::select('username', 'name', 'id')->get();
        return view('chat', ['usuarios' => $usuarios]);
    }
}
