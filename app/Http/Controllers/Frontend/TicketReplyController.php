<?php

namespace App\Http\Controllers\Frontend;

use App\Actions\TicketReply\StoreTicketReplyAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TicketReply\StoreTicketReplyRequest;
use App\Models\Ticket;

class TicketReplyController extends Controller
{
    private StoreTicketReplyAction $storeTicketReplyAction;

    public function __construct(StoreTicketReplyAction $storeTicketReplyAction)
    {
        $this->storeTicketReplyAction = $storeTicketReplyAction;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketReplyRequest $request, Ticket $ticket)
    {
        try {
            $this->storeTicketReplyAction->handle($request->validated(), $ticket);
            return back();
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }
}
