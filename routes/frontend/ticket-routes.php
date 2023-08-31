<?php

use App\Http\Controllers\Frontend\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\TicketReplyController;

Route::prefix('ticket')
    ->controller(TicketController::class)->group(function () {
        Route::get('/', 'index')->name('ticket.index');
        Route::get('create', 'newTicket')->name('ticket.create');
        Route::post('store', 'store')->name('ticket.store');
        Route::get('/show/{ticket}', 'show')->name('ticket.show');
    });

Route::prefix('ticketreply')
    ->name('ticketreply.')
    ->controller(TicketReplyController::class)
    ->group(function () {
        Route::post('store/{ticket}', 'store')->name('store');
    });
