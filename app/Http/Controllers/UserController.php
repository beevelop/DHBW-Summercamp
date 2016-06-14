<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserRegisterRequest;
use App\User;
use Auth;

class UserController extends Controller
{

    public function register(UserRegisterRequest $request)
    {
        $user = User::create($request->all());

        Auth::login($user);

        return redirect('categories');
    }
    
}