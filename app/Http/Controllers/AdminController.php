<?php

namespace App\Http\Controllers;

use App\Models\afterImage;
use App\Models\Category;
use App\Models\Push;
use App\Models\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createCategory(Request $request)
    {
        $data = $request->only("name");
        $createCategory = Category::create($data);
        if ($createCategory) {
            return response()->json([
                "message" => "Категория создана",
                "category" => $createCategory
            ], 201);
        }
    }
    public function editCategory(Request $request,$id)
    {
        try {
            Category::findOrFail($id)->update(["name" => $request->name]);
            return response()->json(["message" => "Категория отредактирована"]);
        } catch (\ErrorException $error) {
            return response()->json(["error" => "$error"]);
        }
    }
    public function deleteCategory($id){
        Requests::where("categories_id", $id)->delete();
        Category::findOrFail($id)->delete();
        return response()->json(["message" => "Категория удалена"]);

    }
    public function cancelRequest(Request $request, $id){
        try {
            $cancelReq = Requests::findOrFail($id)->update([
                "status" => "Отклонено"
            ]);
            Push::create([
                "push" => $request->push,
                "user_id" => Requests::findOrFail($id)->user_id
            ]);
            return response()->json([
                "message" => "Запрос отклонен"
            ]);
        } catch (\ErrorException $error) {
            return response()->json([
                "error" => "$error"
            ], 500);
        }

    }

    public function doneRequest(Request $request, $id)
    {
        $image = $request->file('afterImage')->getClientOriginalName();
        afterImage::create([
            "request_id" => $id,
            "image" => $image
        ]);
        $request->afterImage->move(public_path("img/admin/after"), $image);
        Requests::findOrFail($id)->update([
            "status" => "Решено"
        ]);
        return redirect()->back();
    }



}
