<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::controller(CarController::class)->group(function () {
    Route::get('/', 'index')->name('cars.index');
    Route::get('/cars/create', 'create')->name('cars.create');
    Route::post('/cars', 'store')->name('cars.store');
    Route::get('/cars/{car}', 'show')->name('cars.show');
    Route::get('/cars/{car}/edit', 'edit')->name('cars.edit');
    Route::patch('/cars/{car}', 'update')->name('cars.update');
    Route::delete('/cars/{car}', 'destroy')->name('cars.destroy');
});

    