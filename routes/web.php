<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//resource สร้าง path ให้ครบทุก path ตั้งแต่ get post update
Route::resource('user',UserController::class);

Route::get('/',[UserController::class, 'index'])->name('homepage');
