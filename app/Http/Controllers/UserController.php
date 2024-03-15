<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view("auth.profile");
    }
    public function createRequest(Request $request){
        $create = Requests::create([
            "user_id" => Auth::id(),
            "categories_id" => $request->categories_id,
            "title" => $request->title,
            "body" => $request->body,
            "photo" => $request->photo
        ]);
    }
    public function getMyRequests(){
        return Requests::where("user_id", Auth::id());
    }
}
