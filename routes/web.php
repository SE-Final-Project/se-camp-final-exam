<?php

use App\Http\Controllers\user_C;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('homepage');
});

Route::get('user',[user_C::class,'user'])->name('user');//หน้ารายชื่อทั้งหมด

Route::get('add',[user_C::class,'add'])->name('add');//หน้าเพิ่มชื่อ
