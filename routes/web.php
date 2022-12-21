<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/loginproses', [LoginController::class, 'loginproses']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/edit-profile', [EditProfileController::class, 'index'])->middleware('auth');
Route::patch('/profile/{id}', [EditProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::group(['middleware' => ['auth', 'hak:1']], function (){
    Route::get('/user', [UserController::class,'index']);
    Route::post('/user', [UserController::class,'store']);
    Route::get('/user/create', [UserController::class,'create']);
    Route::get('/user/{id}/edit', [UserController::class,'edit']);
    Route::put('/user/{id}', [UserController::class,'update']);
    Route::get('/user/{id}/delete', [UserController::class,'destroy']);
});
