<?php

namespace App\Http\Livewire\Frontend\Auction;

use App\Helpers\GlobalHelper;
use App\Models\Listing;
use App\Models\ListingBid;
use App\Models\ListingWishlist;
use Livewire\Component;

class SingleAuctionItem extends Component
{
    public Listing $listing;

    public $lastBid;

    public function getListeners()
    {
        return [
            "echo:bid-on-listing-{$this->listing->slug},BidOnListingEvent" => 'fetchResults',
            'updateAuctionInfo' => 'fetchResults'
        ];
    }

    public function mount(Listing $listing)
    {
        $this->attachQuery($listing);
        $this->fetchResults();
    }

    public function fetchResults()
    {
        $this->lastBid = ListingBid::with('bidder')->whereListingId($this->listing->id)->orderBy('bid_price', 'desc')
            ->first();
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
        return view('livewire.frontend.auction.single-auction-item');
    }
}
