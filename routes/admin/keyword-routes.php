<?php

use App\Http\Controllers\Admin\KeywordController;
use Illuminate\Support\Facades\Route;

Route::prefix('keywords')
    ->name('keywords.')
    ->controller(KeywordController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('edit/{keyword}', 'edit')->name('edit');
        Route::get('destroy/{keyword}', 'destroy')->name('destroy');
        Route::get('update/status/{keyword:id}/{status}', 'updateStatus')->name('update.status');
    });
