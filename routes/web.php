<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class,'index']);
Route::get('/add-user', [UserController::class,'addUser']);
Route::post('/add-user-home', [UserController::class,'store']);
Route::get('/delete/{id}', [UserController::class, 'delete']);

Route::get('/edit-user/{id}', [UserController::class,'editUser']);
Route::post('/edit-user-home/{id}', [UserController::class,'update']);


