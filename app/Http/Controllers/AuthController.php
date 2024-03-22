<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registration(){
        return view('auth.reg');
    }
    public function signUp(Request $request){
        try {
            $avatar = $request->image;
            $avatar = time().'.'.$avatar->extension();
            $request->image->move(public_path('img/profiles'),$avatar );

            $createUser = User::create([
                "name"     => $request->name,
                "login"    => $request->login,
                "role_id"  => 2,
                "email"    => $request->email,
                "password" => bcrypt($request->password)
            ]);
            if ($createUser) {
                return response()->json([
                    "message" => "Вы успешно зарегистрировались"
                ], 201);
            }
        } catch (\ErrorException $error) {
            return response()->json([
                "error" => "$error"
            ], 500);
        }

    }
    public function login(){
        return view('auth.login');
    }
    public function signIn(LoginRequest $request){
        try {
            $data = $request->validate([
                "email" => ['string', 'required'],
                "password" => ['required']
            ]);
            $user = User::where("login", "$data[login]")->first();
            if ($user->password == bcrypt($data['password'])) {
                return response()->json([
                    "message" => "Вы успешно вошли"
                ], 200);
            }
            else{
                return response()->json([
                    "error" => "Неверный логин или пароль"
                ], 500);
            }

        } catch (\ErrorException $error) {
            return response()->json([
                "error" => "$error"
            ], 500);
        }

    }
}
