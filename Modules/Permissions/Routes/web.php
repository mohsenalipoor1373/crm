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

Route::middleware('auth')->prefix('permissions')->group(function() {
    Route::get('/', 'PermissionsController@index')->name('permissions');
    Route::post('post_data_permissions', [\Modules\Permissions\Http\Controllers\PermissionsController::class, 'post_data_permissions'])->name('post_data_permissions');
    Route::post('post_data_edit_permissions', [\Modules\Permissions\Http\Controllers\PermissionsController::class, 'post_data_edit_permissions'])->name('post_data_edit_permissions');
    Route::get('edit_permissions', [\Modules\Permissions\Http\Controllers\PermissionsController::class, 'edit_permissions'])->name('edit_permissions');
    Route::get('remove_permissions', [\Modules\Permissions\Http\Controllers\PermissionsController::class, 'remove_permissions'])->name('remove_permissions');
});
