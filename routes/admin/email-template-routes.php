<?php

use App\Http\Controllers\Admin\EmailTemplateController;
use Illuminate\Support\Facades\Route;

Route::prefix('email-templates')->name('email-templates.')
    ->controller(EmailTemplateController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{emailTemplate:key}', 'edit')->name('edit');
        Route::post('update/{emailTemplate:key}', 'update')->name('update');
    });
