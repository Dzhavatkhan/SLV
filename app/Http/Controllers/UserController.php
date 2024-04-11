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
        try {
            $photo = $request->photo->getClientOriginalName();
            $create = Requests::create([
                "user_id" => Auth::id(),
                "categories_id" => $request->categories_id,
                "title" => $request->title,
                "body" => $request->body,
                "photo" => $photo,
                "status" =>  "Рассматривается"
            ]);
            $request->photo->move(public_path("img/admin/requests/"), $photo);
            return response()->json([
                "message" => "Заявка отправлена на рассмотрение"
            ]);
        } catch (\ErrorException $error) {
            return response()->json([
                "error" => $error->getMessage()
            ]);
        }


    }
    public function getMyRequests(){
        return response()->json([
            "requests" => Requests::where("user_id", Auth::id())
        ]);
    }
    public function getMyRequestsBlade(){
        $quantity = Requests::where("user_id", Auth::id())->count();
        $requests = Requests::where("user_id", Auth::id())
        ->leftJoin("categories", "requests.categories_id", "categories.id")
        ->leftJoin("after_images", "requests.id", "after_images.request_id")
        ->selectRaw("requests.*, categories.name AS 'category', after_images.image AS 'afterImage'")
        ->get();
        return view("components.ajax.profile.getMyRequests", compact("quantity", "requests"));
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
