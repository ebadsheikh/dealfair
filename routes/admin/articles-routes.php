<?php

use App\Http\Controllers\Admin\ArticleController;
use Illuminate\Support\Facades\Route;

Route::prefix('article')
    ->controller(ArticleController::class)
    ->name('article.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:View Articles');
        Route::get('/create', 'create')->name('add')->middleware('permission:Create Article');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{article:slug}', 'edit')->name('edit')->middleware('permission:Edit Article');
        Route::post('update/{article:slug}', 'update')->name('update');
        Route::get('destroy/{article:slug}', 'destroy')->name('destroy')->middleware('permission:Delete Article');
        Route::post('upload', 'uploadFile')->name('uploadfile');
        Route::get('status/{article:slug}/{status}', 'changeStatus')->name('status')->middleware('permission:Change Article Status');
    });
