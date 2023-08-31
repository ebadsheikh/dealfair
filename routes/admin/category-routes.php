<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('categories')->name('category.')
    ->controller(CategoryController::class)->group(function () {
        Route::get('create/{parentCategory?}', 'create')->name('add')->middleware('permission:Create Category');
        Route::post('store', 'store')->name('store')->middleware('permission:Create Category');
        Route::get('edit/{category:slug}', 'edit')->name('edit')->middleware('permission:Edit Category');
        Route::post('update/{category:slug}', 'update')->name('update')->middleware('permission:Edit Category');
        Route::get('delete/{category:slug}', 'destroy')->name('delete')->middleware('permission:Delete Category');
        Route::get('change/status/{category:slug}/{status}', 'changeStatus')->name('change-status')->middleware('permission:Update Category Status');
        Route::get('{parentCategory?}', 'index')->name('index')->middleware('permission:View Categories');
    });
