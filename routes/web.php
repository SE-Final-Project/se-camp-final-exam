<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [UserController::class, 'index'])->name('users.index');

Route::get('/add-user', [UserController::class, 'create'])->name('users.create');
Route::post('/add-user', [UserController::class, 'store'])->name('users.store');

Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/edit-user/{id}', [UserController::class, 'update'])->name('users.update');

Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('users.destroy');
