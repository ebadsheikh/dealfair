<?php

use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;

Route::prefix('brands')
    ->name('brands.')
    ->controller(BrandController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{brand}', 'edit')->name('edit');
        Route::post('update/{brand}', 'update')->name('update');
        Route::get('destroy/{brand}', 'destroy')->name('destroy');
        Route::get('update/status/{brand:id}/{status}', 'updateStatus')->name('update.status');
    });
