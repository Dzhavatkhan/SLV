<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
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
            $request->image->move(public_path('img/avatars'),$avatar );

            $createUser = User::create([
                "name"     => $request->name,
                "login"    => $request->login,
                "role_id"  => 2,
                "image" => $avatar,
                "email"    => $request->email,
                "password" => bcrypt($request->password)
            ]);
            if ($createUser) {
                auth('web')->login($createUser);
                $createUser->createToken("user_token")->plainTextToken;
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
    public function signIn(Request $request){

        try {
            $data = $request->only("login", "password");

            $user = User::where("login", $data['login'])->first();
            if ($user == null) {
                return response()->json([
                    "error" => "Неверный логин или пароль"
                ], 500);
            }
            if ($user->password == bcrypt($data['password']) || auth('web')->attempt($data)) {

                if ($user->role_id == 1) {
                    $token = $user->createToken('admin_token')->plainTextToken;
                }
                else{
                 $token = $user->createToken('user_token')->plainTextToken;
                }

                return response()->json([
                    "message" => "Вы успешно вошли",
                    "role_id" => $user->role_id
                ], 200);
            }
            else{
                return response()->json([
                    "error" => "Неверный логин или пароль"
                ], 500);
            }

        } catch (\ErrorException $error) {
            return response()->json([
                "error" => $error->getMessage()
            ], 500);
        }

    }
    public function logout(){
        auth('web')->logout();
        User::findOrFail(Auth::id())->tokens()->delete();
    }
}
