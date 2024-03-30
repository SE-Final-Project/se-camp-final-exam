<?php

use App\Http\Controllers\C_User;
use Illuminate\Support\Facades\Route;

//เมื่อหน้า path / จะเรียกฟังก์ชันการทำงาน index จาก  C_User //65160240 นายอภิภัสร์ ทศพร
Route::get('/',[C_User::class, 'index']);
//เมื่อหน้า add-user จะเรียกฟังก์ชันการทำงาน create จาก C_User //65160240 นายอภิภัสร์ ทศพร
Route::get('/add-user',[C_User::class,'create']);
//จะแสดงค่าของฟังก์ชันการทำงาน store ที่ถูกเก็บมาจาก add-user //65160240 นายอภิภัสร์ ทศพร
Route::post('/add-user',[C_User::class,'store']);
//เมื่อไปหน้า edit-user ที่แสดงตาม id ของ user แล้วจะเรียกฟังก์ชันการทำงาน edit จาก C_User //65160240 นายอภิภัสร์ ทศพร
Route::get('/edit-user/{id}',[C_User::class,'edit']);
//จะเรียกฟังก์ชันการทำงาน update แล้วก็จะแก้ไขข้อมูลของ id นั้น //65160240 นายอภิภัสร์ ทศพร
Route::put('/update-user/{id}',[C_User::class,'update']);
//เรียกฟังก์ชันการทำงาน delete ข้อมูล id ที่ถูกเลือกจะถูกลบ //65160240 นายอภิภัสร์ ทศพร
Route::delete('delete-user/{id}',[C_User::class,'delete']);
