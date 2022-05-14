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

Route::middleware('auth')->prefix('grouping')->group(function() {
    Route::get('/', 'GroupingController@index')->name('grouping');
    Route::post('post_data_grouping', [\Modules\Grouping\Http\Controllers\GroupingController::class, 'post_data_grouping'])->name('post_data_grouping');
    Route::post('post_data_edit_grouping', [\Modules\Grouping\Http\Controllers\GroupingController::class, 'post_data_edit_grouping'])->name('post_data_edit_grouping');
    Route::get('edit_grouping', [\Modules\Grouping\Http\Controllers\GroupingController::class, 'edit_grouping'])->name('edit_grouping');
    Route::get('remove_grouping', [\Modules\Grouping\Http\Controllers\GroupingController::class, 'remove_grouping'])->name('remove_grouping');
});
