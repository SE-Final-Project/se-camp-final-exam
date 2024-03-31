
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\U_Controllers;

Route::get('/', [U_Controllers::class, 'showHomePage'])->name('homepage');
Route::get('/add-user', [U_Controllers::class, 'showAddPage']);
Route::get('/edit-user/{id}', [U_Controllers::class, 'showEditPage']);
Route::post('/store-user', [U_Controllers::class, 'storeUser'])->name('store-user');
Route::post('/', [U_Controllers::class, 'storeUser'])->name('store.user');
Route::put('/update-user/{id}', [U_Controllers::class, 'updateUser'])->name('update-user');
Route::delete('/delete-user/{id}', [U_Controllers::class, 'deleteUser'])->name('delete-user');
