<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->prefix('printing_house')->group(function() {
    Route::get('/', 'PrintingHouseController@index')->name('printing_house');
    Route::post('post_data_printing_house', [\Modules\PrintingHouse\Http\Controllers\PrintingHouseController::class, 'post_data_printing_house'])->name('post_data_printing_house');
    Route::post('post_data_edit_printing_house', [\Modules\PrintingHouse\Http\Controllers\PrintingHouseController::class, 'post_data_edit_printing_house'])->name('post_data_edit_printing_house');
    Route::get('edit_printing_house', [\Modules\PrintingHouse\Http\Controllers\PrintingHouseController::class, 'edit_printing_house'])->name('edit_printing_house');
    Route::get('remove_printing_house', [\Modules\PrintingHouse\Http\Controllers\PrintingHouseController::class, 'remove_printing_house'])->name('remove_printing_house');
});

