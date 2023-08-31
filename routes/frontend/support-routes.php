<?php

use App\Http\Controllers\Frontend\SupportController;
use Illuminate\Support\Facades\Route;

Route::prefix('support')
    ->controller(SupportController::class)->group(function () {
        Route::get('/', 'index')->name('support');
        Route::get('/sections/{articleCategory:slug}', 'buyerFaq')->name('support.buyerfaqs');
        Route::get('/seller/faqs', 'sellerFaq')->name('support.sellerfaqs');
        Route::get('article/{article:slug}', 'singleFaq')->name('support.singlefaqs');
        Route::get('/search/{search}', 'randomSearch')->name('support.randomsearch');
    });
