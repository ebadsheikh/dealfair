<?php

use App\Http\Controllers\Admin\CategoryBrandController;
use Illuminate\Support\Facades\Route;

Route::prefix('category/brand')
    ->name('category.brand.')
    ->controller(CategoryBrandController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{categoryBrand}', 'edit')->name('edit');
        Route::post('update/{categoryBrand}', 'update')->name('update');
        Route::get('destroy/{categoryBrand}', 'destroy')->name('destroy');
    });
