<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('auth.auth');
    }
    public function registration(){
        return view('auth.reg');
    }
    public function signUp(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        if ($user->save()) {
            //
        }
    }
    public function login(){
        return view('auth.login');
    }
}
