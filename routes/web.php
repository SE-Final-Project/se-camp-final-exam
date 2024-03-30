<?php

use App\Http\Controllers\C_Title;
use App\Http\Controllers\C_User;
use Illuminate\Support\Facades\Route;

// ณัฐดนัย ธาราโรจน์ชัยกุล 65160329

//เมื่ออยู่ที่ path -> / จะเรียกใช้ Method index จาก Controller C_User
Route::get('/',[C_User::class, 'index'])->name('homepage');

//เมื่ออยู่ที่ path -> /add-user จะเรียกใช้ Method create จาก Controller C_User
Route::get('/add-user', [C_User::class,'create'])->name('create');
// เมื่อรับ POST request ที่เข้ามาที่ /add-user จะเรียกใช้ Method store ใน Controller C_User
Route::post('/add-user', [C_User::class,'store'])->name('store');

//เมื่อกดแก้ไขจะไปที่ path ->/edit-user/{id} โดย id คือ parameter ที่ระบุ id ผู้ใช้ที่ต้องการแก้ไข จากนั้นเรียกใช้ Method edit จาก Controller C_User
Route::get('/edit-user/{id}', [C_User::class,'edit'])->name('edit');
// เมื่อรับ PUT request ที่เข้ามาที่ /update-user/{id} โดย id คือ parameter ที่ระบุ id ว่าจะอัปเดตข้อมูลคนไหน จะเรียกใช้ Method update ใน Controller C_User
Route::put('/update-user/{id}', [C_User::class,'update'])->name('update');

// เมื่อรับ DELETE request ที่เข้ามาที่ /delete-user/{id} โดย id คือ parameter ที่ระบุ id ว่าจะลบข้อมูลคนไหน โดยใช้ Method delete ใน Controller C_User
Route::delete('/delete-user/{id}', [C_User::class, 'delete'])->name('delete');

