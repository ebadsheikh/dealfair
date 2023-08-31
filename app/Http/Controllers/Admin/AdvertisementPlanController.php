<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdvertisementPlan\StoreAdvertisementPlanRequest;
use App\Http\Requests\Admin\AdvertisementPlan\UpdateAdvertisementPlanRequest;
use App\Models\AdvertisementPlan;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdvertisementPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $advertisementPlans = AdvertisementPlan::all();
        return view('admin.advertisement-plans.index')
            ->with('advertisementPlans', $advertisementPlans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.advertisement-plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdvertisementPlanRequest $request
     * @return RedirectResponse
     */
    public function store(StoreAdvertisementPlanRequest $request): RedirectResponse
    {
        try {
            AdvertisementPlan::create($request->validated());
            return redirect()->route('admin.advertisement-plans.index')
                ->withSuccess('Advertisement Plan Stored Successfully');
        } catch (Exception $ex) {
            return back()->withError('Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AdvertisementPlan $advertisementPlan
     * @return View
     */
    public function edit(AdvertisementPlan $advertisementPlan): View
    {
        return view('admin.advertisement-plans.edit')->with('advertisementPlan', $advertisementPlan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdvertisementPlanRequest $request
     * @param AdvertisementPlan $advertisementPlan
     * @return RedirectResponse
     */
    public function update(UpdateAdvertisementPlanRequest $request, AdvertisementPlan $advertisementPlan): RedirectResponse
    {
        try {
            $advertisementPlan->update($request->validated());
            return redirect()->route('admin.advertisement-plans.index')
                ->withSuccess('Advertisement Plan Updated Successfully');
        } catch (Exception $ex) {
            return back()->withError('Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AdvertisementPlan $advertisementPlan
     * @return RedirectResponse
     */
    public function destroy(AdvertisementPlan $advertisementPlan): RedirectResponse
    {
        try {
            $advertisementPlan->delete();
            return redirect()->route('admin.advertisement-plans.index')
                ->withSuccess('Advertisement Plan Deleted Successfully');
        } catch (Exception $ex) {
            return back()->withError('Something went wrong');
        }
    }
}
