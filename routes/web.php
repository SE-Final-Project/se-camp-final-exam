<?php

use App\Http\Controllers\C_User;
use Illuminate\Support\Facades\Route;
Route::get('/',[C_User::class,'index']);
//ไปที่ path ข้างต้น โดยจะไปเรียกใช้ function index ที่ระบุใน class C_User
Route::get('/add-user',[C_User::class,'create']);
//ไปที่ path ข้างต้น โดยจะไปเรียกใช้ function create ที่ระบุใน class C_User
Route::post('/add-user',[C_User::class,'store']);
//เมื่อรับ post มาจะไปที่ path ข้างต้น โดยจะไปเรียกใช้ function store ที่ระบุใน class C_User
Route::get('/edit-user/{id}',[C_User::class,'edit']);
//ไปที่ path โดยจะไปเรียกใช้ function edit ที่ระบุใน class C_User
Route::put('/update-user/{id}',[C_User::class,'update']);
//เมื่อรับ put มาจะไปที่ path ข้างต้น โดยจะไปเรียกใช้ function update ที่ระบุใน class C_User
Route::delete('/delete-user/{id}',[C_User::class,'delete']);
//เมื่อรับ delete มาจะไปที่ path ข้างต้น โดยจะไปเรียกใช้ function delete ที่ระบุใน class C_User
