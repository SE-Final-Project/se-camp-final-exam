<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::resource("companies",UserController::class);

Route::get('/', function () {
    return view('homepage');
});

Route::get('/add-user', function () {
    return view('addpage');
});

Route::get('/edit-user', function () {
return view('editpage');
});
