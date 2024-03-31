<!-- 65160219 นางสาวดวงกมล ลืออริยทรัพย์ -->
<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::resource('/', UserController::class);

Route::get('/', function () {
    return view('homepage');
});

Route::get('/add-user', function () {
    return view('addpage');
});


Route::get('/edit-user', function () {
return view('editpage');
});
