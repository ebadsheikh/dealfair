<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\Store\StoreRequest;
use App\Http\Requests\Frontend\Store\UpdateRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Actions\Store\UpdateAction;
use App\Actions\Store\StoreAction;
use App\Helpers\GlobalHelper;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Country;
use App\Models\Store;
use Exception;

class StoreController extends Controller
{
    private StoreAction $storeAction;

    private UpdateAction $updateAction;

    public function __construct(StoreAction $storeAction, UpdateAction $updateAction)
    {
        $this->storeAction = $storeAction;
        $this->updateAction = $updateAction;
    }

    public function index(): View
    {
        $stores = Store::whereHas('listings')->get();
        return view('frontend.stores.index', ['stores' => $stores]);
    }

    public function storeDetails(Store $store): View
    {
        return view('frontend.stores.store-details')
            ->with('store', $store);
    }

    public function createStore(): View
    {
        $categories = Category::whereNull('category_id')->get();
        $countries = Country::all();
        return view('frontend.user-panel.stores.create', ['categories' => $categories, 'countries' => $countries]);
    }

    public function storeDashboard()
    {
        return view('frontend.user-panel.dashboards.store-dashboard');
    }

    public function myStores()
    {
        return view('frontend.user-panel.stores.my-stores');
    }

    public function store(StoreRequest $request)
    {
        try {
            $user = GlobalHelper::getUser();
            $this->storeAction->handle($request->validated(), $user);
            Session::flash('success', 'Store Created');
            return redirect()->route('seller.my.stores');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }


    public function editStore(Store $store): View
    {
        return view('frontend.user-panel.stores.edit')->with(['categories' => Category::whereNull('category_id')->get(), 'countries' => Country::all(), 'store' => $store]);
    }

    public function update(UpdateRequest $request, Store $store)
    {
        try {
            $user = GlobalHelper::getUser();
            $this->updateAction->handle($request->validated(), $store, $user);
            Session::flash('success', 'Store Updated');
            return redirect()->route('seller.my.stores');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    public function deleteStore(Store $store): RedirectResponse
    {
        $store->delete();
        Session::flash('success', 'Store Deleted');
        return back();

    }
}
