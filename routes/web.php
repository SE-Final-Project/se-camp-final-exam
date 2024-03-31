<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;

//->=redirect
//route 65160360 sirichai paenpiriya
Route::get('/', [Usercontroller::class, 'showHomePage'])->name('homepage');
Route::get('/add-user', [Usercontroller::class, 'create']);
Route::get('/edit-user/{id}', [Usercontroller::class, 'showEdit']);
Route::post('/store-user', [Usercontroller::class, 'store'])->name('store-user');
Route::post('/', [Usercontroller::class, 'store'])->name('store.user');
Route::put('/update-user/{id}', [Usercontroller::class, 'updateUser'])->name('update-user');
Route::delete('/delete-user/{id}', [Usercontroller::class, 'deleteUser'])->name('delete-user');
