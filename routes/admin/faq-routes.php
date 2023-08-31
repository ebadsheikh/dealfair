<?php

use App\Http\Controllers\Admin\FaqController;
use Illuminate\Support\Facades\Route;

Route::prefix('faqs')
        ->name('faqs.')
        ->controller(FaqController::class)
        ->group(function () {
            Route::get('/{topic_id?}', 'index')->name('index');
            Route::get('add/buyer/{topic_id?}', 'addBuyer')->name('add.buyer.faq');
            Route::get('add/seller/{topic_id?}', 'addSeller')->name('add.seller.faq');
            Route::post('/store/{topic_id?}', 'store')->name('store');
            Route::get('/edit/{faq}', 'edit')->name('edit');
            Route::post('/update/{faq}', 'update')->name('update');
            Route::get('/destroy/{faq}', 'destroy')->name('destroy');
        });
