<?php
use App\Http\Controllers\C_User;
use Illuminate\Support\Facades\Route;

Route::get('/',[C_User::class,'index']);
Route::get('/add-user',[C_User::class,'create']);
Route::post('/add-user',[C_User::class,'store']);
Route::get('edit-user/{id}',[C_User::class, 'edit']);
Route::put('update-user/{id}',[C_User::class, 'update']); 
Route::delete('delete-user/{id}',[C_User::class, 'destroy']);

