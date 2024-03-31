<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Https\Request;


Route::resource('/add-user', UserController::class );
Route::get('/', [UserController::class, 'index']);
Route::get('/add-user', [UserController::class, 'create']);
Route::post('/add-user', [UserController::class, 'store']);
Route::post('/', [UserController::class, 'index']);
Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');

// Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit');
Route::put('/update-user/{id}', [UserController::class, 'update'])->name('update-user');

// Route::post('/update-user', [UserController::class, 'update']);
// Route::post('/', [UserController::class, 'index']);
// Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');

// Route::put('/update-user/{id}', [UserController::class, 'update'])->name('update-user');




// Route::get('students', [StudentController::class, 'index']);
// Route::get('edit-student/{id}', [StudentController::class, 'edit']);

// Route::put('update-student/{id}', [StudentController::class, 'update']);



// Route::get('/add-user', [UserController::class, 'index'])->name('addpage');
// Route::post('/add-user', [UserController::class, 'store'])->name('addpage');
// Route::post('/add-user', [UserController::class, 'store'])->name('add-user');


// Route::get('/register', [MyAuth::class, 'register_view']);
// Route::get('/logout', [MyAuth::class, 'logout_process']);
// Route::post('/login', [MyAuth::class, 'login_process']);
// Route::post('/register', [MyAuth::class, 'register_process']);



// Route::get('/add-user', function () {
//     return view('addpage');
// });



Route::get('/edit-user', function () {
return view('editpage');
});
