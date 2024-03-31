<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);

Route::get('/add-user', [UserController::class, 'showAddForm']);

Route::get('/edit-user/{id}', [UserController::class, 'showEditForm']);

Route::post('/adddata', [UserController::class, 'showUpdateAddForm']);

Route::post('/editdata}', [UserController::class, 'showUpdateEditForm']);
