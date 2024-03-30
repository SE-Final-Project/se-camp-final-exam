<?php

// 65160244 Audomsuk 65160244 Audomsuk 65160244 Audomsuk 65160244 Audomsuk 65160244 Audomsuk 65160244 Audomsuk 65160244 Audomsuk 65160244 Audomsuk

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('homepage');

Route::resource('user', UserController::class);

// 65160244 Audomsuk 65160244 Audomsuk 65160244 Audomsuk 65160244 Audomsuk 65160244 Audomsuk 65160244 Audomsuk 65160244 Audomsuk 65160244 Audomsuk