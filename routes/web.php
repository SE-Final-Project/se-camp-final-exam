<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('homepage');
});


Route::get('/add-user', function () {
    return view('addpage');
});


Route::get('/edit-user', function () {
return view('editpage');
});


Route::get('user/delete/{id}', [UserController::class,'destroy']);

// connect to UserController
// 65160232 พิชญุตม์ จงรักดี
Route::resource('user', UserController::class);
