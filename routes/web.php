<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::Class , 'index']);

Route::get('/add-user', [UserController::Class , 'addUser']);
Route::post('/submit_add-user', [UserController::Class , 'keep']);

Route::post('/submit_edit-user/{id}', [UserController::Class , 'updateUser']);
Route::get('/edit-user/{id}', [UserController::Class , 'editUser']);


Route::get('/destroy-user/{id}', [UserController::Class , 'destroyUser']);
