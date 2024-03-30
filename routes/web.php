<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/', [UserController::class, 'index']);
Route::get('/add-page', [UserController::class, 'create']);

Route::post('/add-page', [UserController::class, 'store']);

Route::get('/edit-page/{id}', [UserController::class, 'edit']);

Route::post('/edit-page/{id}', [UserController::class, 'update']);

Route::get('/delete/{id}', [UserController::class, 'destroy']);


