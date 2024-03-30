<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//Route::resource('homepage', UserController::class);
// Route::get('/', function () {
//     return view('homepage');
// });
Route::get('/', [UserController::class, 'home_data']);

// Route::get('/add-user', function () {
//     return view('addpage');
// });

// Route::get('/edit-user', function () {
//     return view('editpage');
// });
// Route   ::get('edit-user/{id}', [UserController::class,'edit']);

Route::get('/edit-user/{id}', [UserController::class, 'edit']);
Route::post('update/{id}', [UserController::class,'update']);
Route::get('/delete/{id}', [UserController::class,'delete']);
Route::get('/insert', [UserController::class,'add']);
Route::post('/insert', [UserController::class,'insert']);
