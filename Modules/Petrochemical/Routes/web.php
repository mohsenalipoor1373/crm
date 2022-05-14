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

Route::middleware('auth')->prefix('petrochemical')->group(function() {
    Route::get('/', 'PetrochemicalController@index')->name('petrochemical');
    Route::post('post_data_petrochemical', [\Modules\Petrochemical\Http\Controllers\PetrochemicalController::class, 'post_data_petrochemical'])->name('post_data_petrochemical');
    Route::post('post_data_edit_petrochemical', [\Modules\Petrochemical\Http\Controllers\PetrochemicalController::class, 'post_data_edit_petrochemical'])->name('post_data_edit_petrochemical');
    Route::get('edit_petrochemical', [\Modules\Petrochemical\Http\Controllers\PetrochemicalController::class, 'edit_petrochemical'])->name('edit_petrochemical');
    Route::get('remove_petrochemical', [\Modules\Petrochemical\Http\Controllers\PetrochemicalController::class, 'remove_petrochemical'])->name('remove_petrochemical');
});

