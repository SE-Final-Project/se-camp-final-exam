<?php

use App\Http\Controllers\C_Controller;
use Illuminate\Support\Facades\Route;

// <!-- ชินธร สมบัติกำจรกุล 65160105 -->

Route::get('/',[C_Controller::class,'index']);
// เมื่อเป็นหน้า path / ก็จะเรียนใช้งานฟังก์ชัน index จาก C_Controller
Route::get('/add-user',[C_Controller::class,'create']);
// เป็นไปหน้า add-user ก็จะเรียกใช้งานฟังก์ชัน create จาก C_Controller
Route::post('/add-user',[C_Controller::class,'store']);
// มีการแสดงค่าของฟังก์ชัน store ที่เก็บมาจาก add-user
Route::get('edit-user/{id}',[C_Controller::class,'edit']);
// เมื่อกดแก้ไขจะไปหน้า edit-user ที่ระบุตาม id ผู้ใช้ แล้วเรียกใช้ฟังกืชัน edit
Route::put('update-user/{id}',[C_Controller::class,'update']);
// เรียกใช้ฟังก์ชัน update แล้วก็อัปข้อมูลผู้ใช้ที่มี id ตรงกัน
Route::delete('delete-user/{id}',[C_Controller::class,'destroy']);
// ลบข้อมูลไอดีที่ตรงกับ id นั้นๆโดยการเรียนใช้ฟังก์ชัน destroy
