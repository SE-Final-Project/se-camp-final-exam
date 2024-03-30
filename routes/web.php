<?php

use App\Models\User;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class,'index']);//แสดงหน้า homepage

// Route::get('/', function () {
//     return view('homepage');
// });
Route::delete('/delete/{id}', [UserController::class, 'destroy']); //เรียกใช้method destroy จาก UserController

Route::post('/add-new-user', [UserController::class, 'createUser']);//เรียกใช้mehod createUser จาก UserController
Route::get('/add-user', [UserController::class, 'addUser']);//แสดงหน้าเพิ่มUser (addpage)

Route::post('/edit/{id}', [UserController::class, 'edit']);//เรียกใช้ method edit จาก UserController
Route::get('/edit-user/{id}', [UserController::class, 'editUser']);//แสดงหน้าแก้ไขUser (editpage)
// Route::get('/add-user', function () {
//     return view('addpage');
// });

// Route::get('/edit-user', function () {
// return view('editpage');
// });
