<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);
Route::get('/add-user', [UserController::class, 'create']);
Route::post('/add-user', [UserController::class, 'store']);
Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');

Route::get('/edit-user/{id}', [UserController::class, 'showedit'])->name('showedit');
Route::put('/update-user/{id}', [UserController::class, 'update'])->name('update-user');
