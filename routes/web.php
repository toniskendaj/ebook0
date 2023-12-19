<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\XMLController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/


Route::match(["get", "post"],'/',[ItemController::class,'index'])->name('home');
Route::get('itemcode/{item}', [ItemController::class, 'show']);
Route::match(["get", "post"], "tedhena/read-xml", [XMLController::class, "create"])->name('xml-upload');
Route::match(["get", "post"],'/',[ItemController::class,'filtering'])->name('filter');

Route::get('create',[ItemController::class,'create']);
Route::post('create',[ItemController::class,'store']);
Route::delete('/itemcode/{item}', [ItemController::class, 'destroy']);

Route::get('register',[RegisterController::class,'create']);
Route::post('register',[RegisterController::class,'store']);

Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');
Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('login',[SessionsController::class,'store']);
