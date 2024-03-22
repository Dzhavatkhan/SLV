<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createCategory(Request $request)
    {
        $data = $request->only("name");
        $createCategory = Category::create($data);
        if ($createCategory) {
            return response()->json(["message" => "Категория создана"], 201);
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

    public function doneRequest($id)
    {
        Requests::findOrFail($id)->update([
            "status" => "Решено"
        ]);
        return response()->json([
            "message" => "Запрос решен"
        ]);
    }

    // public function filter(){

    // }

}
