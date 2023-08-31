<?php

use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;

Route::prefix('settings')->name('settings.')
    ->controller(SettingsController::class)->group(function () {
        Route::get('social-links', 'socialLinksView')->name('social.links');
        Route::get('general', 'generalView')->name('general');
        Route::get('logo', 'logoView')->name('logos');
        Route::get('mail', 'mailView')->name('mail');
        Route::get('aws', 'awsView')->name('aws');
        Route::get('pusher', 'pusherView')->name('pusher');
        Route::get('auction', 'auctionView')->name('auction');
        Route::get('listing-page', 'listingPageView')->name('listing.page');
        Route::get('map', 'mapView')->name('map');
        Route::get('social-auth', 'socialAuthView')->name('social.auth');
        Route::get('maintenance-mode', 'maintenanceModeView')->name('maintenance.mode');
        Route::get('fees', 'feesView')->name('fees');
        Route::get('wallet', 'walletView')->name('wallet');
        Route::post('store-update', 'storeUpdate')->name('storeupdate');
        Route::post('enable-maintenance-mode', 'enableMaintenanceMode')->name('enable.maintenance.mode');
        Route::get('media', 'mediaView')->name('media');
    });
