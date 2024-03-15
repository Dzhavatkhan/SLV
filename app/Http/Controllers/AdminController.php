<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
    # code...
    }
    public function createCategory(Request $request)
    {
        $data = $request->only("name");
        $createCategory = Category::create($data);
        if ($createCategory) {
            return $createCategory;
        }
    }
    public function update(Request $request,$id)
    {
    return $request->all();
    }
    public function destroy($id)
    {
    # code...
    }

}
