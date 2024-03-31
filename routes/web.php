<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/add-user', function () {
    return view('addpage');
});

Route::get('/edit-user', function () {
return view('editpage');
});

Route::get('/',[UserController::class,'index'])->name('home');

Route::post('/add-user',[UserController::class,'store'])->name('add-user');


Route::get('/edit-user/{id}', [UserController::class, 'showEditForm'])->name('edit-user');

Route::PATCH ('/edit-user/{id}', [UserController::class, 'update'])->name('edit-user');

Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');



//  65160231 พงศ์พิสูทธิ์ เคนชาติ
