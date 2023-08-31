<?php

use App\Http\Controllers\Admin\TicketCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('ticket/category')
    ->controller(TicketCategoryController::class)
    ->name('ticket.category.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:View Ticket Categories');
        Route::post('store', 'store')->name('store');
        Route::post('update/{category}', 'update')->name('update');
        Route::get('destroy/{category}', 'destroy')->name('destroy');
        Route::get('update/status/{ticketCategory:slug}/{status}', 'updateStatus')->name('update.status')->middleware('permission:Update Ticket Category Status');
    });
