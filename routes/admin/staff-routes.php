<?php

use App\Http\Controllers\Admin\StaffController;
use Illuminate\Support\Facades\Route;

Route::prefix('staff')
    ->name('staff.')
    ->controller(StaffController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:View Staff List');
        Route::get('create', 'create')->name('create')->middleware('permission:View Staff List');
        Route::post('store', 'store')->name('store');
        Route::get('detail/{user}', 'show')->name('details')->middleware('permission:View Staff List');
        Route::post('update/{user}', 'update')->name('update');
        Route::get('destroy/{user}', 'destroy')->name('destroy')->middleware('permission:View Staff List');
        Route::post('update-password/{user}', 'updatePassword')->name('update-password')->middleware('permission:View Staff List');
        Route::get('change-role/{user}/{role}', 'changeRole')->name('change-role')->middleware('permission:View Staff List');
    });
