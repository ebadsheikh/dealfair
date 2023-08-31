<?php

namespace App\Http\Controllers\Frontend;

use App\Actions\Ticket\StoreTicketAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Ticket\StoreTicketRequest;
use App\Models\Ticket;
use App\Models\TicketCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    private StoreTicketAction $storeTicketAction;

    public function __construct(
        StoreTicketAction $storeTicketAction
    ) {
        $this->storeTicketAction = $storeTicketAction;
    }

    public function index()
    {
        return view('frontend.user-panel.ticket.index');
    }

    public function newTicket()
    {
        $ticketCategories = TicketCategory::all();
        return view('frontend.user-panel.ticket.new_ticket')->with('ticketCategories', $ticketCategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request): RedirectResponse
    {
        try {
            $this->storeTicketAction->handle($request->validated());
            Session::flash('success', 'Stored Successfully');
            return redirect()->route('ticket.index');
        } catch (\Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('frontend.user-panel.ticket.show', ['ticket' => $ticket]);
    }
}
