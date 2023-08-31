<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\View\View;

class SellerController extends Controller
{
    public function index(): View
    {
        return view('frontend.user-panel.dashboards.seller-dashboard');
    }

    public function createListing(): View
    {
        return view('frontend.listings.create-listing');
    }

    public function createListingForStore(Store $store): View
    {
        return view('frontend.listings.create-listing')
            ->with('store', $store);
    }

    public function myListing(): View
    {
        if (request()->has('store')) {
            return view('frontend.user-panel.my_listing')->with('store', request('store'));
        } else {
            return view('frontend.user-panel.my_listing');
        }
    }
}
