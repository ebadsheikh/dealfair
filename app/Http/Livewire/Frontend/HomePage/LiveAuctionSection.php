<?php

namespace App\Http\Livewire\Frontend\HomePage;

use App\Enums\ProductListingTypesEnum;
use App\Models\Listing;
use Livewire\Component;

class LiveAuctionSection extends Component
{
    public function render()
    {
        $listings = Listing::whereIn('listing_type', [
            ProductListingTypesEnum::AUCTION->value,
            ProductListingTypesEnum::BOTH->value
        ])
            ->with(['user.homeCommunity'])
            ->take(8)
            ->get();

        return view('livewire.frontend.home-page.live-auction-section')
            ->with('listings', $listings);
    }
}
