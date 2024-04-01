<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Resources\RequestResource;
use App\Models\Category;
use App\Models\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('signIn', [AuthController::class, 'signIn'])->name('signIn');
Route::post('signUp', [AuthController::class, 'signUp'])->name('signUp');



Route::middleware('auth:sanctum')->group(function(){
    //user
    Route::get("getMyRequests", [UserController::class, "getMyRequests"]);
    Route::get("getMyRequestsBlade", [UserController::class, "getMyRequestsBlade"])->name("getMyRequests");
    Route::post("createRequest", [UserController::class, "createRequest"])->name('createRequest');
    Route::put("editRequest/id{id}", [UserController::class, "editRequest"]);
    Route::delete("deleteRequest/id{id}", [UserController::class, "deleteRequest"])->name("deleteRequest");
    Route::get("logout", [AuthController::class, "logout"])->name("logout");

    //admin
    Route::get("getRequests", function() {

    $get = RequestResource::collection(Requests::all());
    return response()->json([
        "requests" => $get
    ]);
    })->name("getRequest");



    Route::get("getUsers", function (){
        return response()->json([
            "users" => User::all()
        ]);
    });
    Route::get("getUser", function (){
        return response()->json([
            "user" => Auth::user()
        ]);
    })->name("getUser");;
    Route::get("getCategory", function (){
        return response()->json([
            "categories" => Category::all()
        ]);
    })->name("getCategory");
    Route::get("getCategoryBlade", function (){
        $categories = Category::all();
        return view("components.ajax.admin.getCategory", compact("categories"));
    })->name("getCategoryBlade");
    Route::post("createCategory", [AdminController::class, "createCategory"])->name("createCategory");
    Route::put("editCategory/id{id}", [AdminController::class, "editCategory"]);
    Route::delete("deleteCategory/id{id}", [AdminController::class, "deleteCategory"])->name("deleteCategory");
    Route::delete("deleteRequest/id{id}", [AdminController::class, "deleteRequest"]);
    Route::put("doneRequest/id{id}", [AdminController::class, "doneRequest"])->name("doneRequest");





});
