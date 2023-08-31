<?php

namespace App\Http\Controllers\Admin;

use App\Actions\TicketCategory\StoreTicketCategoryAction;
use App\Actions\TicketCategory\UpdateTicketCategoryAction;
use App\Enums\TicketCategoryStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TicketCategory\StoreRequest;
use App\Http\Requests\Admin\TicketCategory\UpdateRequest;
use App\Models\TicketCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class TicketCategoryController extends Controller
{
    /**
     * private variable to StoreTicketCategoryAction.
     */
    private StoreTicketCategoryAction $storeTicketCategoryAction;

    /**
     * private variable to UpdateTicketCategoryAction.
     */
    private UpdateTicketCategoryAction $updateTicketCategoryAction;

    public function __construct(StoreTicketCategoryAction $storeTicketCategoryAction, UpdateTicketCategoryAction $updateTicketCategoryAction)
    {
        $this->storeTicketCategoryAction = $storeTicketCategoryAction;
        $this->updateTicketCategoryAction = $updateTicketCategoryAction;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.ticket-categories.index', ['ticketCategories' => TicketCategory::all()]);
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
    public function store(StoreRequest $request)
    {
        try {
            $this->storeTicketCategoryAction->handle($request->validated());
            Session::flash('success', 'Stored Successfully');
            return back();
        } catch(\Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
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
    public function update(UpdateRequest $request, TicketCategory $category)
    {
        try {
            $this->updateTicketCategoryAction->handle($request->validated(), $category);
            Session::flash('success', 'Updated Successfully');
            return back();
        } catch(\Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketCategory $category)
    {
        $category->delete();
        Session::flash('success', 'Deleted Successfully');
        return back();
    }

    /**
     * update category status.
     * @param TicketCategory $ticketCategory
     * @param TicketCategoryStatusEnum $status
     * @return mixed
     */
    public function updateStatus(TicketCategory $ticketCategory, TicketCategoryStatusEnum $status): RedirectResponse
    {
        try {
            $ticketCategory->update(['status' => $status]);
            Session::flash('success', 'Status Updated');
        } catch (\Exception $ex) {
            Session::flash('error', 'Something went wrong!');
        }
        return back();
    }
}
