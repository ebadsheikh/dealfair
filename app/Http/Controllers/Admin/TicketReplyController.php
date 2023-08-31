<?php

namespace App\Http\Controllers\Admin;

use App\Actions\TicketReply\StoreTicketReplyAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TicketReply\StoreTicketReplyRequest;
use App\Models\Ticket;
use Exception;
use Illuminate\Http\Request;

class TicketReplyController extends Controller
{
    private StoreTicketReplyAction $storeTicketReplyAction;

    public function __construct(StoreTicketReplyAction $storeTicketReplyAction)
    {
        $this->storeTicketReplyAction = $storeTicketReplyAction;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketReplyRequest $request, Ticket $ticket)
    {
        try {
            $this->storeTicketReplyAction->handle($request->validated(), $ticket);
            return back();
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
