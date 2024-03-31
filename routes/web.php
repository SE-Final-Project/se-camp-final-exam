<?php

use App\Http\Controllers\user_C;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('homepage');
});

Route::get('user',[user_C::class,'user'])->name('user');//หน้ารายชื่อทั้งหมด
Route::get('/add',[user_C::class,'add'])->name('add');//หน้าเพิ่มชื่อ
Route::post('/insert',[user_C::class,'insert']);//เพิ่มข้อมูลในฐานข้อมูล
Route::get('delete/{id}',[user_C::class,'delete'])->name('delete');//ลบ
Route::get('edit{id}',[user_C::class,'edit'])->name('edit');//แก้ไข
Route::post('update/{id}',[user_C::class, 'update'])->name('update');//อัพเดต
