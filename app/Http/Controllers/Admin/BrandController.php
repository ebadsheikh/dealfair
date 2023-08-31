<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Brand\UpdateBrandRequest;
use App\Http\Requests\Admin\Brand\StoreBrandRequest;
use App\Actions\Brand\UpdateBrandAction;
use Illuminate\Support\Facades\Session;
use App\Actions\Brand\StoreBrandAction;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Enums\BrandStatusEnum;
use Illuminate\View\View;
use App\Models\Brand;
use Exception;

class BrandController extends Controller
{
    private StoreBrandAction $storeBrandAction;

    private UpdateBrandAction $updateBrandAction;

    public function __construct(StoreBrandAction $storeBrandAction, UpdateBrandAction $updateBrandAction)
    {
        $this->storeBrandAction = $storeBrandAction;
        $this->updateBrandAction = $updateBrandAction;
    }

    public function index(): View
    {
        return view('admin.brands.index');
    }

    public function create(): View
    {
        return view('admin.brands.create');
    }

    public function store(StoreBrandRequest $request): RedirectResponse
    {
        try {
            $this->storeBrandAction->handle($request->validated());
            Session::flash('success', 'Brand Created Successfully');
            return redirect()->route('admin.brands.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    public function edit(Brand $brand): View
    {
        return view('admin.brands.edit')->with('brand', $brand);
    }

    public function update(UpdateBrandRequest $request, Brand $brand): RedirectResponse
    {
        try {
            $this->updateBrandAction->handle($request->validated(), $brand);
            Session::flash('success', 'Brand Updated Successfully');
            return redirect()->route('admin.brands.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        try {
            $brand->delete();
            Session::flash('success', 'Brand Deleted Successfully');
            return redirect()->route('admin.brands.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    public function updateStatus(Brand $brand, BrandStatusEnum $status): RedirectResponse
    {
        try {
            $brand->update(['status' => $status]);
            Session::flash('success', 'Brand Status Updated Successfully');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
        }
        return back();
    }
}
