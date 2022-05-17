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

Route::middleware('auth')->prefix('state_city')->group(function() {
    Route::get('/', 'StateCityController@index')->name('state_city');
    Route::post('post_data_state_city', [\Modules\StateCity\Http\Controllers\StateCityController::class, 'post_data_state_city'])->name('post_data_state_city');
    Route::post('post_data_edit_state_city', [\Modules\StateCity\Http\Controllers\StateCityController::class, 'post_data_edit_state_city'])->name('post_data_edit_state_city');
    Route::get('edit_state_city', [\Modules\StateCity\Http\Controllers\StateCityController::class, 'edit_state_city'])->name('edit_state_city');
    Route::get('remove_state_city', [\Modules\StateCity\Http\Controllers\StateCityController::class, 'remove_state_city'])->name('remove_state_city');
});

