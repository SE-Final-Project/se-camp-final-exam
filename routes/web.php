<?php

use App\Http\Controllers\TitleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// Route การจัดการ User 65160097
Route::resource('/',UserController::class);
// Route แสดงหน้าเพิ่ม User 65160097
route::get('/add-user',[UserController::class, 'create']);
// Route บันทึกข้อมูลเพิ่ม User 65160097
Route::post('/add-user',[UserController::class, 'store']);
// Route แสดงหน้าแก้ไข User 65160097
Route::get('/edit-user/{id}',[UserController::class, 'show']);
// Route บันทึกข้อมูลแก้ไข User 65160097
Route::put('/edit-user/{id}',[UserController::class, 'update'])->name('users.update');
// Route ลบ User 65160097
Route::delete('/users/{id}', [UserController::class, 'destroy']);
