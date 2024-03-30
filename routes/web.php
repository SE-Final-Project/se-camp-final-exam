<?php

use App\Http\Controllers\C_Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/add-user', function () {
    return view('addpage');
});

Route::get('/', [C_Controller::class, 'index']);  //กำหนดเส้นทาง GET สำหรับ URL เริ่มต้น '/' ซึ่งจะเรียกใช้เมธอด index() ในคลาส C_Controller เพื่อแสดงหน้าหลักหรือหน้าแรกของเว็บไซต์
Route::post('/', [C_Controller::class, 'store']); //กำหนดเส้นทาง POST สำหรับ URL เริ่มต้น '/' ซึ่งจะเรียกใช้เมธอด store() ในคลาส C_Controller เพื่อทำการบันทึกข้อมูลหรือการทำงานที่เกี่ยวข้องกับการส่งข้อมูลผ่านแบบฟอร์ม
Route::get('/edit-user/{id}', [C_Controller::class,'edit']); //กำหนดเส้นทาง GET สำหรับ URL '/edit-user/{id}' ซึ่ง {id} คือพารามิเตอร์ที่ใช้สำหรับระบุ ID ของผู้ใช้ที่ต้องการแก้ไข และจะเรียกใช้เมธอด edit() ในคลาส C_Controller เพื่อแสดงหน้าแก้ไขข้อมูลของผู้ใช้
Route::put('/update/{id}', [C_Controller::class,'update']); //กำหนดเส้นทาง PUT สำหรับ URL '/update/{id}' ซึ่ง {id} คือพารามิเตอร์ที่ใช้สำหรับระบุ ID ของผู้ใช้ที่ต้องการอัปเดต และจะเรียกใช้เมธอด update() ในคลาส C_Controller เพื่อดำเนินการอัปเดตข้อมูลของผู้ใช้
Route::delete('/delete-user/{id}', [C_Controller::class, 'delete']); //กำหนดเส้นทาง DELETE สำหรับ URL '/delete-user/{id}' ซึ่ง {id} คือพารามิเตอร์ที่ใช้สำหรับระบุ ID ของผู้ใช้ที่ต้องการลบ และจะเรียกใช้เมธอด delete() ในคลาส C_Controller เพื่อลบข้อมูลของผู้ใช้นั้นออกจากฐานข้อมูล

