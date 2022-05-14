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

Route::middleware('auth')->prefix('roles')->group(function() {
    Route::get('/', 'RolesController@index')->name('roles');
    Route::post('post_data_role', [\Modules\Roles\Http\Controllers\RolesController::class, 'post_data_role'])->name('post_data_role');
    Route::post('post_data_edit_role', [\Modules\Roles\Http\Controllers\RolesController::class, 'post_data_edit_role'])->name('post_data_edit_role');
    Route::get('edit_roles', [\Modules\Roles\Http\Controllers\RolesController::class, 'edit_roles'])->name('edit_roles');
    Route::get('remove_roles', [\Modules\Roles\Http\Controllers\RolesController::class, 'remove_roles'])->name('remove_roles');
    Route::get('add_roles_to_users/{id?}', [\Modules\Roles\Http\Controllers\RolesController::class, 'roles_to_users'])->name('add_roles_to_users');
    Route::post('post_data_permission_role', [\Modules\Roles\Http\Controllers\RolesController::class, 'post_data_permission_role'])->name('post_data_permission_role');

});
