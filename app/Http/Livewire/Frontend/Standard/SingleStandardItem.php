<?php

namespace App\Http\Livewire\Frontend\Standard;

use App\Helpers\GlobalHelper;
use App\Models\Listing;
use App\Models\ListingWishlist;
use Livewire\Component;

class SingleStandardItem extends Component
{
    public Listing $listing;

    public function mount(Listing $listing)
    {
        $this->attachQuery($listing);
    }

    public function attachQuery(Listing $listing)
    {
        $customer = GlobalHelper::getCustomer();
        $listing->with([
            'listingWishlists' => function ($query) use ($customer) {
                $query->select('listing_id')
                    ->where('user_id', $customer?->id);
            }
        ]);
        $listing->isInWishlist = $listing->listingWishlists->isNotEmpty();
        unset($listing->listingWishlists);

        $this->listing = $listing;
    }

    public function toggleWishlist($listingSlug)
    {
        $customer = GlobalHelper::getCustomer();
        if ($customer) {
            $listingId = Listing::whereSlug($listingSlug)->first()->id;
            $listingWishlist = ListingWishlist::whereListingId($listingId)
                ->whereUserId($customer->id)
                ->first();
            if ($listingWishlist) {
                $listingWishlist->delete();
            } else {
                ListingWishlist::create([
                    'user_id' => $customer->id,
                    'listing_id' => $listingId
                ]);
            }
        } else {
            return redirect()->route('auth.signin');
        }
        $this->attachQuery($this->listing);
        $this->emit('wishlistUpdated');
        return null;
    }

    public function render()
    {
        return view('livewire.frontend.standard.single-standard-item')
            ->with('listing', $this->listing);
    }
}
