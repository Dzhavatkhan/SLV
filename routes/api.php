<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
Route::post("createRequest", [UserController::class, "createRequest"]);
Route::post("createCategory", [AdminController::class, "createCategory"]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
