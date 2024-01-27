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
        $avatar = $request->image;
        $avatar = time().'.'.$avatar->extension();
        $request->image->move(public_path('img/profiles'),$avatar );


        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->image = $avatar;
        $user->save();
        if ($user->save()) {
            //
        }
    }
    public function login(){
        return view('auth.login');
    }
    public function login_proccess(LoginRequest $request){
        $data = $request->validate([
            "login" => ['string', 'required'],
            "password" => ['required']
        ]);

    if (auth('web')->attempt($data)) {
        return redirect(route("profile", Auth::id()));
    }
    if (auth('admin')->attempt($data)) {
        return redirect(route("admin"));
    }


    return redirect(route('signIn'))->withErrors([
    "login" => "Пользователь не найден, либо данные были введены неверно"
]);
    }
}
