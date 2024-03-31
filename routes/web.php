<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/add-user', function () {
    return view('addpage');
});
Route::post('/insert',[userController::class,'insert']);

Route::get('/edit-user', function () {
    return view('editpage');
});
