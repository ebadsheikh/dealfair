<?php

use App\Http\Controllers\Frontend\SellerController;
use Illuminate\Support\Facades\Route;

Route::prefix('seller')
    ->controller(SellerController::class)
    ->name('seller.')->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('create/listing', 'createListing')->name('create.listing');
        Route::get('create/listing/s/{store:slug}', 'createListingForStore')->name('create.listing.for.store');
        Route::get('mylisting', 'myListing')->name('my.listing');
    });
