<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userControl;

Route::get('/edit-user/{id}', [userControl::class, 'editUser'])->name('edit.user');
Route::put('/update-user/{id}', [userControl::class, 'updateUser'])->name('update.user');

Route::get('/edit-user', function () {
    return view('editpage');
});
Route::get('/add-user', [App\Http\Controllers\userControl::class, 'showAddPage']);
Route::post('/add-user', [App\Http\Controllers\userControl::class, 'addUser'])->name('add.user');
Route::get('/add-user', function () {
    $titles = App\Models\Title::all();
    return view('addpage', compact('titles'));
});

Route::get('/', [userControl::class, 'id'])->name('home');