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

Route::middleware('auth')->prefix('users')->group(function () {
    Route::get('/', [\Modules\Users\Http\Controllers\UsersController::class, 'index'])->name('users_index');
    Route::post('post_data_user', [\Modules\Users\Http\Controllers\UsersController::class, 'post_data_user'])->name('post_data_user');
    Route::post('post_data_edit_user', [\Modules\Users\Http\Controllers\UsersController::class, 'post_data_edit_user'])->name('post_data_edit_user');
    Route::get('edit_users', [\Modules\Users\Http\Controllers\UsersController::class, 'edit_users'])->name('edit_users');
    Route::get('ban_users', [\Modules\Users\Http\Controllers\UsersController::class, 'ban_users'])->name('ban_users');
    Route::get('remove_users', [\Modules\Users\Http\Controllers\UsersController::class, 'remove_users'])->name('remove_users');
    Route::get('add_permission_to_users/{id?}', [\Modules\Users\Http\Controllers\UsersController::class, 'add_permission_to_users'])->name('add_permission_to_users');
    Route::post('post_data_permission_user', [\Modules\Users\Http\Controllers\UsersController::class, 'post_data_permission_user'])->name('post_data_permission_user');

});
