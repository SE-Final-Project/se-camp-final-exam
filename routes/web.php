<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

// 2. สร้าง route ให้มี URL ที่ครบและใช้งานได้
Route::get('/', [UserController::class, 'index'])->name('users.index'); // แสดงหน้า home
Route::get('/add-user', [UserController::class, 'create'])->name('users.create'); // แสดงหน้า add
Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('users.edit'); // แสดงหน้า edit
Route::post('/users', [UserController::class, 'store'])->name('users.store'); // บันทึกข้อมูลที่เพิ่ม (Add)
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update'); // บันทึกข้อมูลที่แก้ไข (Edit)
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // ลบข้อมูล



