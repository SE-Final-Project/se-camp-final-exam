<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('homepage');
Route::get('/add-user',[App\Http\Controllers\UserController::class, 'viewAddPage']);
Route::post('/add-user', [App\Http\Controllers\UserController::class, 'addUser'])->name('add.user');
Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete.user');
Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit.user');
Route::put('/update-user/{id}', [Usercontroller::class, 'updateUser'])->name('update.user');


// Route::get('/edit-user', function () {
// return view('editpage');
// });

// Route::get('/add-user', function(){
//     $titles = App\Models\Title::all();
//     return view('/addpage', compact('titles'));
// });

// Route::get('/', function () {
//     return view('homepage');
// });

// Route::get('/add-user', function () {
//     return view('addpage');
// });


