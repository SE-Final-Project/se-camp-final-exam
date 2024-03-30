<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { // หน้า homepage
    return view('homepage');
});

Route::get('/add-user', function () { // หน้า add-user
    return view('addpage');
});

Route::get('/edit-user', function () { // หน้า edit-user
    return view('editpage');
});


Route::get('/', [UserController::class, 'index']); // แสดงหน้าผู้ใช้ homepage
Route::post('/', [UserController::class, 'store']); // ส่งข้อมูล เพื่อบันทึกลงในฐานข้อมูล || add-user
Route::delete('/delete-user/{id}', [UserController::class, 'delete']); // ลบข้อมูลผู้ใช้โดยระบุตัว ID || delete-user
Route::get('/edit-user/{id}', [UserController::class, 'edit']); // การเรียกฟอร์มแก้ไขข้อมูลผู้ใช้ || edit-user
Route::put('update-user/{id}', [UserController::class, 'update']); // การส่งข้อมูลการแก้ไขข้อมูลผู้ใช้ หรือก็คือการที่เรา update-user
