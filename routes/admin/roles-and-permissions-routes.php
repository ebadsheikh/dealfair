<?php

use App\Http\Controllers\Admin\RoleAndPermissionController;
use Illuminate\Support\Facades\Route;

Route::prefix('roles')
    ->name('roles.')
    ->controller(RoleAndPermissionController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{role}', 'edit')->name('edit');
        Route::post('update/{role}', 'update')->name('update');
        Route::get('destroy/{role}', 'destroy')->name('destroy');
    });
