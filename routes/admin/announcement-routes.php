<?php

use App\Http\Controllers\Admin\AnnouncementController;
use Illuminate\Support\Facades\Route;

Route::prefix('announcement/')
    ->name('announcement.')
    ->controller(AnnouncementController::class)
    ->group(function () {
        Route::get('view', 'index')->name('view');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{announcement}', 'edit')->name('edit');
        Route::post('update/{announcement}', 'update')->name('update');
        Route::get('delete/{announcement}', 'destroy')->name('delete');
    });
