<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);
Route::resource("/user",UserController::class);

//Route::get('/', function () {
  //  return view ('users.homepage');
//});

