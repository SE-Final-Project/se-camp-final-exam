<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
65160241 Amonpan Noicharoen
Create a route that passes through the controller for display of all pages.
*/
Route::get('/', [UserController::class, 'home_data']);
Route::get('/edit-user/{id}', [UserController::class, 'edit']);
Route::post('update/{id}', [UserController::class,'update']);
Route::get('/delete/{id}', [UserController::class,'delete']);
Route::get('/insert', [UserController::class,'add']);
Route::post('/insert', [UserController::class,'insert']);
