<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ProductStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    public function index()
    {
        return view('admin.listings.show', ['listings' => Listing::paginate(10)]);
    }

    public function updateListingStatus(Listing $listing, ProductStatusEnum $status)
    {

        try {
            $listing->update([
                'status' =>  $status
            ]);
            Session::flash('success', 'Listing status changed successfully');
            return back();
        } catch(\Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }

    }

    public function destroy(Listing $listing)
    {

        try {
            $listing->delete();
            Session::flash('success', 'Listing deleted');
            return back();
        } catch(\Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }

    }
}
