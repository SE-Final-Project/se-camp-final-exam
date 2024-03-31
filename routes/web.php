<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
// natapohn 65160218

Route::get('/' , [userController::class , 'index']);

Route::get('/add-user' , [userController::class , 'addpage']);

Route::post('/insert' , [userController::class , 'insert']);

Route::get('/edit-user/{id}', [userController::class , 'edit']);

Route::post('/edit/{id}' , [userController::class , 'update']);

Route::delete('/delete/{id}', [userController::class , 'delete']);
