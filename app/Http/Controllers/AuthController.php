<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function index()
    {   
        return view('login');
    }

    public function auth(AuthRequest $request)
    {   
        $credenciais = $request->validated();
        
        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return redirect()->route('login')
                    ->with(['erro' => 'Usuário não existe ou credenciais estão incorretas']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
