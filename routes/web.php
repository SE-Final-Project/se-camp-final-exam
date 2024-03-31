<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('homepage');
// });

// Route::get('/add-user', function () {
//     return view('addpage');
// });

// Route::get('/edit-user', function () {
// return view('editpage');
// });

Route::get('/' , [UserController::class , 'index']);

Route::get('/add-user' , [UserController::class , 'addpage']);
Route::post('/insertuser' , [UserController::class , 'create']);

Route::get('/edit-user/{id}', [UserController::class , 'edit']);

Route::delete('/delete/{id}', [UserController::class , 'destroy']);

Route::post('/edit/{id}' , [UserController::class , 'update']);
