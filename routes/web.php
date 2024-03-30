<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersCRUDController;

Route::resource('users' , usersCRUDController::class);


Route::get('/', function () {
    return view('layouts.default');
});

Route::get('/add-user', function () {
    return view('users.addpage');
});

Route::get('/edit-user', function () {
return view('users.editpage');
});

