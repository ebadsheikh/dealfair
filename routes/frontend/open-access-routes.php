<?php

use App\Http\Controllers\Frontend\CommunityController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ListingController;
use App\Http\Controllers\Frontend\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('communities', [CommunityController::class, 'index'])
    ->name('communities');

Route::get('community/{community:slug}', [CommunityController::class, 'communityDetails'])
    ->name('community.details');

Route::get('listings', [ListingController::class, 'listings'])->name('listings');
Route::get('listing/{listing:slug}', [ListingController::class, 'listingDetails'])->name('listing.details');

Route::get('stores', [StoreController::class, 'index'])
    ->name('stores');

Route::get('store/{store:slug}', [StoreController::class, 'storeDetails'])
    ->name('store.details');
