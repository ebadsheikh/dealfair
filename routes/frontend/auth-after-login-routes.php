<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\ChatController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')
    ->controller(AuthController::class)
    ->name('auth.')->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });

Route::get('chat', [ChatController::class, 'index'])->name('chat');
Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');
