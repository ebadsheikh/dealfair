<?php

use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Route;

Route::prefix('permissions')
    ->name('permissions.')
    ->controller(PermissionController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });
