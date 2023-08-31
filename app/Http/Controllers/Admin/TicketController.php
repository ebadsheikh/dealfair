<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RolesEnum;
use App\Enums\TicketStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendingStatus = Ticket::where('status', TicketStatusEnum::PENDING)->count();
        $activeStatus = Ticket::where('status', TicketStatusEnum::ACTIVE)->count();
        $inprogressStatus = Ticket::where('status', TicketStatusEnum::INPROGRESS)->count();
        $holdStatus = Ticket::where('status', TicketStatusEnum::HOLD)->count();
        $closedStatus = Ticket::where('status', TicketStatusEnum::CLOSED)->count();
        return view('admin.tickets.show', [
            'pendingStatus' => $pendingStatus,
            'activeStatus' => $activeStatus,
            'inprogressStatus' => $inprogressStatus,
            'holdStatus' => $holdStatus,
            'closedStatus' => $closedStatus
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //        $permission = Permission::where('name', 'tickets')->first();
        $staffUsers = User::role(RolesEnum::STAFF->value)
//            ->permission($permission)
            ->get();
        return view('admin.tickets.view', ['ticket' => $ticket, 'staffUsers' => $staffUsers]);
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

    /**
     * update ticket status.
     * @param Ticket $ticket
     * @param string $status
     * @return mixed
     */
    public function changeStatus(Ticket $ticket, string $status): RedirectResponse
    {
        try {
            $ticket->update([
                'status' => $status
            ]);
            Session::flash('success', 'Status Updated');
            return back()->withMessage('Status Changed');
        } catch (\Exception $th) {
            Session::flash('error', 'Something went wrong!');
            return back()->withError($th->getMessage());
        }
    }

    /**
     * update ticket status.
     * @param Ticket $ticket
     * @param Request $request
     * @return mixed
     */
    public function changeAssignee(Ticket $ticket, Request $request): RedirectResponse
    {
        try {
            $ticket->update([
                'assignee' => $request->input('assignee')
            ]);
            Session::flash('success', 'Assignee Updated');
            return back()->withMessage('Assignee Changed');
        } catch (\Exception $th) {
            Session::flash('error', 'Something went wrong!');
            return back()->withError($th->getMessage());
        }
    }
}
