<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {   

        return view('cadastro_usuario');
    }

    public function create(CreateUserRequest $request)
    {   
        $request->validated();
        
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $password = Hash::make($request->password);
        $user->password = $password;
        $user->online = false;
        $user->save();

        return redirect('/');
    }
}
