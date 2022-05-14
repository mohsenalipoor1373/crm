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

Route::middleware('auth')->prefix('grade')->group(function() {
    Route::get('/', 'GradeController@index')->name('grade');
    Route::post('post_data_grade', [\Modules\Grade\Http\Controllers\GradeController::class, 'post_data_grade'])->name('post_data_grade');
    Route::post('post_data_edit_grade', [\Modules\Grade\Http\Controllers\GradeController::class, 'post_data_edit_grade'])->name('post_data_edit_grade');
    Route::get('edit_grade', [\Modules\Grade\Http\Controllers\GradeController::class, 'edit_grade'])->name('edit_grade');
    Route::get('remove_grade', [\Modules\Grade\Http\Controllers\GradeController::class, 'remove_grade'])->name('remove_grade');
});

