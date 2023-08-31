<?php

use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\TicketReplyController;
use Illuminate\Support\Facades\Route;

Route::prefix('tickets')
    ->name('tickets.')
    ->controller(TicketController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:View Tickets');
        Route::get('/show/{ticket}', 'show')->name('show')->middleware('permission:View Ticket Detail');
        Route::get('change/status/{ticket}/{status}', 'changeStatus')->name('change-status')->middleware('permission:Update Ticket Status');
        Route::post('change/assignee/{ticket}', 'changeAssignee')->name('change-assignee')->middleware('permission:Change Assignee');
    });

Route::prefix('ticketreply')
    ->name('ticketreply.')
    ->controller(TicketReplyController::class)
    ->group(function () {
        Route::post('store/{ticket}', 'store')->name('store');
    });
