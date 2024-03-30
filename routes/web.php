<?php

use App\Http\Controllers\C_user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('homepage');
// });

// Route::get('/add-user', function () {
//     return view('addpage');
// });

// Route::get('/edit-user', function () {
// return view('editpage');
// });

// (/) เรียกใช้ฟังก์ชัน index จาก C_user //
Route::get('/',[C_user::class, 'index']);

// /add-user เรียกใช้ฟังก์ชัน create จาก C_user //
Route::get('/add-user',[C_user::class, 'create']);

// /add-user เรียกใช้ฟังก์ชัน store จาก C_user //
Route::post('/add-user',[C_user::class, 'store']);

// /edit-user เรียกใช้ฟังก์ชัน edit จาก C_user //
Route::get('/edit-user/{id}',[C_user::class, 'edit']);

// /update-user เรียกใช้ฟังก์ชัน update จาก C_user //
Route::put('/update-user/{id}',[C_user::class, 'update']);

// /delete เรียกใช้ฟังก์ชัน delete จาก C_user //
Route::delete('/delete-user/{id}',[C_user::class, 'delete']);