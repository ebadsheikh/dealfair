<?php


use App\Http\Controllers\Frontend\StoreController;

Route::prefix('seller')
    ->controller(StoreController::class)
    ->name('seller.')->group(function () {
        Route::get('store/dashboard', 'storeDashboard')->name('store.dashboard');
        Route::get('my/stores', 'myStores')->name('my.stores');
        Route::get('create/store', 'createStore')->name('create.store');
        Route::post('store/store', 'store')->name('store.storedata');
        Route::get('edit/store/{store:slug}', 'editStore')->name('edit.store');
        Route::post('update/store/{store:slug}', 'update')->name('update.storedata');
        Route::get('delete/store/{store:slug}', 'deleteStore')->name('delete.store');
    });
