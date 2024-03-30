<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudController;

Route::get('/add-user', function () {
    return view('addpage');
});

Route::get('/edit-user', function () {
    return view('editpage');
});

Route::get('/', function () {
    return view('Enterhome');
});

Route::resource("/Home",crudController::class);
