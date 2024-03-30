<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::resource("/", UserController::class);

Route::get('/add-user', function () {
    return view('addpage');
});

Route::get('/edit-user', function () {
return view('editpage');
});
