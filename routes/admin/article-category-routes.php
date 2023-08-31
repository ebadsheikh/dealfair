<?php

use App\Http\Controllers\Admin\ArticleCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('article/category')
    ->controller(ArticleCategoryController::class)
    ->name('article.category.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:View Article Categories');
        Route::post('store', 'store')->name('store');
        Route::post('update/{category}', 'update')->name('update');
        Route::get('destroy/{category}', 'destroy')->name('destroy');
    });
