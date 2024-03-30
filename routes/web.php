<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userscontroller;
Route::resource('homepage',userscontroller::class);
//Route::resource('titles',Controller::class);
// Route::get('/homepage', function () {
//     return view('homepage');
// });

Route::get('/add-user', function () {
    return view('addpage');
});

// Route::get('/edit-user', function () {
// return view('editpage');
// });
