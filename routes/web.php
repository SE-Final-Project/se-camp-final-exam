<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('homepage');
Route::get('/add-user',[App\Http\Controllers\UserController::class, 'viewAddPage']);
Route::post('/add-user', [App\Http\Controllers\UserController::class, 'addUser'])->name('add.user');

Route::get('/add-user', function(){
    $titles = App\Models\Title::all();
    return view('/addpage', compact('titles'));
});

// Route::get('/', function () {
//     return view('homepage');
// });

// Route::get('/add-user', function () {
//     return view('addpage');
// });

// Route::get('/edit-user', function () {
// return view('editpage');
// });
