<?php

namespace App\Http\Livewire\Frontend\ListingWishlist;

use App\Helpers\GlobalHelper;
use App\Models\ListingWishlist;
use Livewire\Component;

class ListingWishlistPage extends Component
{
    public $perPage = 20;

    protected $listeners = [
        'wishlistUpdated' => '$refresh',
    ];

    public function loadMore()
    {
        $this->perPage += 20;
    }

    public function render()
    {
        $customer = GlobalHelper::getCustomer();
        $listingWishlists = ListingWishlist::with('listing')->whereUserId($customer->id)
            ->paginate($this->perPage);
        return view('livewire.frontend.listing-wishlist.listing-wishlist-page')
            ->with('listingWishlists', $listingWishlists);
    }
}
