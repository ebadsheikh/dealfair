<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ListingController;

Route::prefix('listing')
    ->controller(ListingController::class)
    ->group(function () {
        Route::get('/', 'index')->name('listings');
        Route::get('reported', 'reportedListingView')->name('reported.products');
        Route::get('reported/reasons', 'reportedReasonView')->name('reported.reasons');
        Route::get('reported/reasons/create', 'reportedReasonCreate')->name('reported.reason.create');
        Route::post('reported/reasons/store', 'reportedReasonStore')->name('reported.reason.store');
        Route::get('reported/reasons/edit/{reason}', 'reportedReasonEdit')->name('reported.reason.edit');
        Route::post('reported/reasons/update/{reason}', 'reportedReasonUpdate')->name('reported.reason.update');
        Route::post('reported/reasons/delete/{reason}', 'reportedReasonDelete')->name('reported.reason.delete');
        Route::get('/destroy/{product}', 'destroy')->name('listing.destroy');
        Route::get('/change-status/{listing:slug}/{status}', 'updateListingStatus')->name('listing.change.status');
    });
