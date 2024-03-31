<?php

use App\Http\Controllers\CustomersController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('homepage');
});


Route::resource("/customers",CustomersController::class);