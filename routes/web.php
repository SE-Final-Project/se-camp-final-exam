<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/',[userController::class,'index']);

Route::get('/add-user',[userController::class,'create_index']);

Route::get('/edit-user/{id}',[userController::class,'edit_index']);
Route::post('/edit-user/{id}',[userController::class,'edit']);
Route::post('/add-user',[userController::class,'create']);
Route::post('/delete-user/{id}',[userController::class,'destroy']);