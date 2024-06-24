<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
// Home Page Login.....
Route::get('/',function(Request $request){
    return view('layouts.login');
})->name('home');


// Club And Product Route...
Route::resource('clubs',ClubController::class)->middleware('auth');
Route::resource('products',ProductController::class)->middleware('auth');


// User Register
Route::get('userRegister',[UserController::class,'index'])->name('userRegister');
Route::post('userData',[UserController::class,'store'])->name('userData');

// Login & LogOut
Route::post('userLogin',[UserController::class,'userLogin'])->name('userLogin');
Route::get('userLogOut',[UserController::class,'userLogOut'])->name('userLogOut');


// Forgot Password && Reset Password




// Custom Command
Route::get('/cmd',[CommandController::class,'index']);