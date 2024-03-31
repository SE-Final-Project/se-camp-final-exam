<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [UserController::class, 'index'])->name('home');


// Add User
Route::get('/add-user', function () {
    $titles = App\Models\Title::all();
    return view('addpage', compact('titles'));
});

Route::get('/add-user', [App\Http\Controllers\UserController::class, 'show']);
Route::post('/add-user', [App\Http\Controllers\UserController::class, 'store'])->name('add.user');


// Edit
Route::get('/edit-user', function () {
return view('editpage');
});

Route::get('/edit-user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit.user');
Route::put('/update-user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update.user');

// Delete
Route::delete('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete.user');
