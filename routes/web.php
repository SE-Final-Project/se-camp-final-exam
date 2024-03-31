<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/homepage',[UsersController::class,'index'])->name('homepage');
Route::get('/add-user',[UsersController::class,'create']);
Route::get('/update-user',[UsersController::class,'update']);
Route::get('/edit-user/{id}',[UsersController::class,'showedit'])->name('showedit');
Route::post('/add-user',[UsersController::class,'store']);
Route::delete('/delete-user/{id}',[UsersController::class,'destroy']);
Route::put('/update-user/{id}', [UsersController::class, 'update'])->name('update-user');
