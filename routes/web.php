<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

Route::get("/add-user",[userController::class,'create']);
Route::get("/edit-user",[userController::class,'edit']);
Route::resource("/",userController::class);