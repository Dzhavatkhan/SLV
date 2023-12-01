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
});
Route::get('auth/registration', [AuthController::class, 'registration'])->name('reg');
Route::get('auth/log in', [AuthController::class,'login'])->name('login');
Route::post('log in', [AuthController::class, 'login_proccess'])->name('login_proccess');

Route::get('profile', [UserController::class, 'index'])->name("profile");
