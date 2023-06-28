<?php

// Bibinhit_10 ***

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


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

// User Routes

    Route::get('/sign_up',[UserController::class,'SignUp']);
    Route::post('/sign_up',[UserController::class,'SignUp']);


    Route::get('/login',[UserController::class,'login']);
    Route::post('/login',[UserController::class,'login']);

    Route::get('/index',[UserController::class,'index'])->middleware('LoginCheck');
    Route::post('/index',[UserController::class,'index'])->middleware('LoginCheck');

// User Routes



// Admin Routes


    Route::get('/admin/login',[AdminController::class,'AdminLogin']);
    Route::post('/admin/login',[AdminController::class,'AdminLogin']);

    Route::get('/admin/index',[AdminController::class,'AdminIndex'])->middleware('AdminCheck');
    Route::post('/admin/index',[AdminController::class,'AdminIndex'])->middleware('AdminCheck');
    

// Admin Routes
