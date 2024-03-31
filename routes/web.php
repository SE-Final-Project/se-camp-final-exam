<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/' , [UserController::class , 'index']);

Route::get('/add-user', function () {
    return view('addpage');
});


//delete 65160209
Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete.user');
//edit 65160209
Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit.user');
Route::put('/update-user/{id}', [UserController::class, 'updateUser'])->name('update.user');
Route::get('/edit-user', function () {
return view('editpage');
});



Route::resource('/', UserController::class); //65160209 กุสมา
