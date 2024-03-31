<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// Route::get('/', function () {
//     return view('homepage');
// });

// Route::get('/add-user', function () {
//     return view('addpage');
// });

// Route::get('/edit-user', function () {
// return view('editpage');
// });


Route::get('/add-user', [UserController::class, 'addUserPage'])->name('add.user');

Route::post('/add-user', [UserController::class, 'addUser']);

Route::get('/', [UserController::class, 'homepage']);

Route::get('/delete-user/{id}', [UserController::class, 'deleteUser']);

Route::get('/edit-user/{id}', [UserController::class, 'editUserPage']);

Route::post('/update-user/{id}', [UserController::class, 'updateUser']);




