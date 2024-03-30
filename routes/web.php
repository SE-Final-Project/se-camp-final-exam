//

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// กำหนดเส้นทางโดยใช้ UserController โดยตรง
Route::get('/', [UserController::class, 'index']); // เปลี่ยนจากการใช้ฟังก์ชันประกาศเป็นการใช้ Controller โดยตรง
Route::get('/add-user', [UserController::class, 'create']);
Route::post('/submit-user', [UserController::class, 'store'])->name('submit-user');
Route::get('/edit-user/{id}', [UserController::class, 'edit']);
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('delete-user'); // ลบการกำหนดเส้นทางซ้ำ
Route::put('/update-user/{id}', [UserController::class, 'update'])->name('update-user');
