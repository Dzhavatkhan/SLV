<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::middleware('auth')->group(function(){
    Route::get('admin_panel', function () {
        return view('admin.admin');
    })->name("admin");
    Route::get('profile', [UserController::class, 'index'])->name("profile");
});


Route::get('auth/registration', [AuthController::class, 'registration'])->name('reg');
Route::get('auth/login', [AuthController::class,'login'])->name('login');

