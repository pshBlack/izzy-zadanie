<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PartController;


Route::controller(CarController::class)->group(function () {
    Route::get('/', 'index')->name('cars.index');
    Route::get('/cars/create', 'create')->name('cars.create');
    Route::post('/cars', 'store')->name('cars.store');
    Route::get('/cars/{car}', 'show')->name('cars.show');
    Route::get('/cars/{car}/edit', 'edit')->name('cars.edit');
    Route::patch('/cars/{car}', 'update')->name('cars.update');
    Route::delete('/cars/{car}', 'destroy')->name('cars.destroy');
});
Route::controller(PartController::class)->group(function () {
    Route::get('/parts', 'index')->name('parts.index');
    Route::get('/parts/create', 'create')->name('parts.create');
    Route::post('/parts', 'store')->name('parts.store');
    Route::get('/parts/{part}/edit', 'edit')->name('parts.edit');
    Route::patch('/parts/{part}', 'update')->name('parts.update');
    Route::delete('/parts/{part}', 'destroy')->name('parts.destroy');

});
