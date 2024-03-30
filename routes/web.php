<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/homepage', [UserController::class, 'index'])
->name('UserController.index');

Route::get('/', [UserController::class, 'index'])
->name('UserController.index');

Route::get('/add-user', [UserController::class, 'view_adduser'])
->name('UserController.view_adduser');

Route::post('/add-user/store', [UserController::class, 'store'])
->name('UserController.store');

Route::get('/edit-user/{id}', [UserController::class, 'view_edituser'])
->name('UserController.view_edituser');

Route::post('/edit-user/{items}', [UserController::class, 'update'])
->name('users.update');

Route::get('delete-user/{items}', [UserController::class, 'destroy'])
->name('users.destroy');
