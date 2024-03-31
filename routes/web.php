<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/update-user/{id}', [UserController::class, 'update'])->name('users.update');


Route::get('/', [UserController::class, 'index']);

Route::get('/add-user', [UserController::class, 'create']);

Route::post('/add-user', [UserController::class, 'store']);

Route::get('/edit-user/{id}', [UserController::class, 'edit']);

Route::post('/update.user/{id}', [UserController::class, 'update']);

Route::get('/delete-user/{id}', [UserController::class, 'destroy']);
