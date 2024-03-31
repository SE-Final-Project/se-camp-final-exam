<?php

/**
* @author : Thidarat Onsanit 65160337
* @create-date : 2024-03-31
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;


Route::get('/', [DataController::class, 'index']); // Enter the Route / through the get() and call the index() with the DataController class. Thidarat Onsanit 65160337

Route::post('/', [DataController::class, 'store']); // Enter the Route / through the post() and call the store() with the DataController class. Thidarat Onsanit 65160337

Route::post('/{id}', [DataController::class, 'update']); // Enter the Route / with id through the post() and call the update() with the DataController class. Thidarat Onsanit 65160337

Route::get('/add-user', [DataController::class, 'ShowAdd']); // Enter the Route / with add-user through the get() and call the showAdd() with the DataController class. Thidarat Onsanit 65160337

Route::put('/edit-user/{id}', [DataController::class, 'ShowEdit']); // Enter the Route / with edit-user through the put() and call the destroy() with the DataController class. Thidarat Onsanit 65160337

Route::delete('/{id}', [DataController::class, 'destroy']); // Enter the Route / with id through the delete() and call the destroy() with the DataController class. Thidarat Onsanit 65160337
