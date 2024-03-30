<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::controller(UserController::class)->group(function () {
    Route::get('/', 'homePage');
    Route::get('/add-user', 'addPage');
    Route::post('/add-user', 'insert');
    Route::get('user', 'user');
    Route::get('title', 'title');
    Route::get('/edit-page/{id}', 'edit')->name('user.edit');
    Route::put('/edit-page/{id}', 'update')->name('user.update');
    Route::delete('/delete/{id}', 'delete');
});


