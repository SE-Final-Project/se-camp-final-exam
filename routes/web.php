<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

Route::get('/', function () {
    return view ('homepage');
});

Route::resource("/user",userController::class);