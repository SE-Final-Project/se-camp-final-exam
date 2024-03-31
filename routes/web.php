<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




// 65160208 kittipoom yuttanava
// route หน้า home
Route::get('/' , [UserController::class , 'index']);

// route ของการเพิ่ม User
Route::get('/add-user' , [UserController::class , 'addpage']);
Route::post('/insertuser' , [UserController::class , 'create']);

//route ของการ edit
Route::get('/edit-user/{id}', [UserController::class , 'edit']);
Route::post('/edit/{id}' , [UserController::class , 'update']);
// route ของ delete
Route::delete('/delete/{id}', [UserController::class , 'destroy']);

