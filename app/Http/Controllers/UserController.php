<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){

        return view("auth.profile", [
            "user" => Auth::user()
        ]);
    }
    public function createRequest(Request $request){
        $create = Requests::create([
            "user_id" => Auth::id(),
            "categories_id" => $request->categories_id,
            "title" => $request->title,
            "body" => $request->body,
            "photo" => $request->photo,
            "status" =>  "Рассматривается"
        ]);
    }
    public function getMyRequests(){
        return response()->json([
            "requests" => Requests::where("user_id", Auth::id())
        ]);
    }
    public function editRequest(Request $request, string $id){
        $data = $request->all(["photo", "body", "title", "categories_id"]);
        $req = Requests::findOrFail($id);
        if ($data["photo"] == null) {
            $data["photo"] == $req->photo;
        }
        $updateReq = $req->update($data);
        return response()->json([
            "message" => "Запрос отредактирован"
        ]);
    }
    public function deleteRequest(string $id){
        try {
            $deleteReq = Requests::findOrFail($id)->delete();
            return response()->json([
                "message" => "Запрос удален"
            ]);
        } catch (\ErrorException $error) {
            return response()->json([
                "error" => "$error"
            ], 500);
        }

    }
}
