<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Announcement\StoreAnnouncementAction;
use App\Actions\Announcement\UpdateAnnouncementAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Announcement\StoreAnnouncementRequest;
use App\Http\Requests\Admin\Announcement\UpdateAnnouncementRequest;
use App\Models\Announcement;
use Exception;

class AnnouncementController extends Controller
{
    private StoreAnnouncementAction $storeAnnouncementAction;

    private UpdateAnnouncementAction $updateAnnouncementAction;

    public function __construct(
        StoreAnnouncementAction $storeAnnouncementAction,
        UpdateAnnouncementAction $updateAnnouncementAction
    ) {
        $this->storeAnnouncementAction = $storeAnnouncementAction;
        $this->updateAnnouncementAction = $updateAnnouncementAction;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::all();
        return view('admin.announcement.index')->with('announcements', $announcements);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcement.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnouncementRequest $request)
    {
        try {
            $this->storeAnnouncementAction->handle($request->validated());
            return redirect()->route('admin.announcement.view');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
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
    public function edit(Announcement $announcement)
    {
        return view('admin.announcement.edit')->with('announcement', $announcement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnouncementRequest $request, UpdateAnnouncementAction $action, Announcement $announcement)
    {
        try {
            $announcement = $action->execute($request->validated(), $announcement);
            return redirect()->route('admin.announcement.view');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        try {
            $announcement->delete();
            return redirect()->route('admin.announcement.view');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }
}
