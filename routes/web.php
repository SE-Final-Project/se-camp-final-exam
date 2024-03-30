<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

/**
 * student id: 65160090
 * name: นายเจษฎา นาคะ
 * คำอธิบาย : เป็นคำสั้งที่มีไว้เรียกหน้า home และมีการส่งค่า ของ User ผ่านการเรียกผ่าน Model
 */
Route::get('/', function () {
    $datas = User::all();
    return view('homepage', compact('datas'));
});

/**
 * student id: 65160090
 * name: นายเจษฎา นาคะ
 * คำอธิบาย : เป็น route ที่คอยจัดการเรื่อง CRUD ของ UserController ทั้งหมดผ่านการเรียกใช้งาน route เดียว
 */
Route::resource('/user', UserController::class)
    ->name('edit' , 'user.edit');


?>
