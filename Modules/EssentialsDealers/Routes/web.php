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

Route::middleware('auth')->prefix('essentials_dealers')->group(function() {
    Route::get('/', 'EssentialsDealersController@index')->name('essentials_dealers');
    Route::post('post_data_essentials_dealers', [\Modules\EssentialsDealers\Http\Controllers\EssentialsDealersController::class, 'post_data_essentials_dealers'])->name('post_data_essentials_dealers');
    Route::post('post_data_edit_essentials_dealers', [\Modules\EssentialsDealers\Http\Controllers\EssentialsDealersController::class, 'post_data_edit_essentials_dealers'])->name('post_data_edit_essentials_dealers');
    Route::get('edit_essentials_dealers', [\Modules\EssentialsDealers\Http\Controllers\EssentialsDealersController::class, 'edit_essentials_dealers'])->name('edit_essentials_dealers');
    Route::get('remove_essentials_dealers', [\Modules\EssentialsDealers\Http\Controllers\EssentialsDealersController::class, 'remove_essentials_dealers'])->name('remove_essentials_dealers');
});


