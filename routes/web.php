<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::resource('home', UserController::class);
Route::resource('', UserController::class);

// Route::get('/', function () {
//     return view('users.homepage');
// });

// Route::get('/add-user', function () {
//     return view('users.addpage');
// });

// Route::get('/edit-user', function () {
// return view('users.editpage');
// });
