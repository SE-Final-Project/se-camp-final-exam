<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);

Route::get('/add-user', [UserController::class, 'showAddForm']);

Route::get('/edit-user/{id}', [UserController::class, 'showEditForm']);

Route::post('/adddata', [UserController::class, 'showUpdateAddForm']);

Route::post('/editdata}', [UserController::class, 'showUpdateEditForm']);

// Route::get('/delete-user/{id}', [UserController::class, 'deleteUser']);
Route::get('/delete/{id}',[UserController::class,'delete'])->name('delete');
