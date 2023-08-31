<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\RequestFromTypesEnum;
use App\Events\ListingViewEvent;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\View\View;

class ListingController extends Controller
{
    public function listings(): View
    {
        return view('frontend.listings.all-listing');
    }

    public function listingDetails(Listing $listing): View
    {
        event(new ListingViewEvent($listing, RequestFromTypesEnum::WEBSITE->value));
        return view('frontend.listings.listing-details')->with('listing', $listing);
    }
}
