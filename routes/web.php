<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// */
Route::get('/',function(){
    return view('home');
})->name('home');



Route::resource('clubs',ClubController::class);
Route::resource('products',ProductController::class);


// User Register
Route::get('userRegister',[UserController::class,'index'])->name('userRegister');
Route::post('userData',[UserController::class,'store'])->name('userData');

// Login & LogOut
Route::post('userLogin',[UserController::class,'userLogin'])->name('userLogin');
Route::get('userLogOut',[UserController::class,'userLogOut'])->name('userLogOut');

// Forgot Password && Reset Password


