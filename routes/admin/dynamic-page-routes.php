<?php

use App\Http\Controllers\Admin\DynamicPageController;
use Illuminate\Support\Facades\Route;

Route::prefix('dynamic-page')
    ->name('dynamic-pages.')
    ->controller(DynamicPageController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'create')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{page}', 'edit')->name('edit');
        Route::post('/update/{page}', 'update')->name('update');
        Route::get('/destroy/{page}', 'destroy')->name('destroy');
    });
