<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// 65160216 ญาณากร

// Home Page
Route::get('/', [UserController::class, 'index'])->name('home');

// Add
Route::post('/add-user', [App\Http\Controllers\UserController::class, 'addUser'])->name('add.user');
Route::get('/add-user', [App\Http\Controllers\UserController::class, 'showAddPage']);

Route::get('/add-user', function () {
    $titles = App\Models\Title::all();
    return view('addpage', compact('titles'));
});

// Edit
Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit.user');
Route::put('/update-user/{id}', [UserController::class, 'updateUser'])->name('update.user');

Route::get('/edit-user', function () {
return view('editpage');
});

// Delete
Route::delete('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('delete.user');
