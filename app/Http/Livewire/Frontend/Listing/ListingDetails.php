<?php

namespace App\Http\Livewire\Frontend\Listing;

use App\Events\BidOnListingEvent;
use App\Helpers\GlobalHelper;
use App\Models\Listing;
use App\Models\ListingBid;
use App\Models\ListingWishlist;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListingDetails extends Component
{
    public Listing $listing;

    public Collection $listingBids;

    public $bidPrice;

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
        $this->listing = $listing;
        $this->fetchResults();
    }

    public function fetchResults()
    {
        $customer = GlobalHelper::getCustomer();
        $this->listing = $this->listing->load(['category', 'listingColors', 'listingTags', 'bids' => function ($query) {
            $query->with('bidder');
        }, 'listingWishlists' => function ($query) use ($customer) {
            $query->select('listing_id')
                ->where('user_id', $customer?->id);
        }]);
        $this->listing->isInWishlist = $this->listing->listingWishlists->isNotEmpty();
        unset($this->listing->listingWishlists);

        $this->lastBid = ListingBid::whereListingId($this->listing->id)->orderBy('bid_price', 'desc')
            ->first();
    }


    public function bidNow(Listing $listing)
    {
        $user = GlobalHelper::getUser();
        if ($user) {
            $this->lastBid = ListingBid::whereListingId($listing->id)->orderBy('bid_price', 'desc')
                ->first();

            if (!$this->lastBid) {
                $bidPriceShouldGreaterThan = $listing->starting_bid;
            } else {
                $bidPriceShouldGreaterThan = $this->lastBid->bid_price;
            }

            $validator = Validator::make(
                ['bidPrice' => $this->bidPrice],
                ['bidPrice' => 'required|integer|gt:' . $bidPriceShouldGreaterThan],
                ['bidPrice.gt' => 'Your bid must be greater than the last bid or the starting bid.']
            );

            if ($validator->fails()) {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'message' => $validator->errors()->first('bidPrice')
                ]);
                return 0;
            }

            if ($this->lastBid?->user_id === $user->id) {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'message' => 'Your bid is already high'
                ]);
                return 0;
            }


            ListingBid::updateOrCreate([
                'user_id' => $user->id,
                'listing_id' => $listing->id,
            ], [
                'bid_price' => $this->bidPrice
            ]);

            $this->listing->update([
                'auction_end' => Carbon::now()->addMinutes(GlobalHelper::getSettingValue('countdown_time'))
            ]);

            $this->bidPrice = "";

            event(new BidOnListingEvent($listing));

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Your bid submitted successfully"
            ]);
        } else {
            return redirect()->route('auth.signin');
        }

        return null;
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
        $this->fetchResults();
        return null;
    }

    public function render()
    {
        return view('livewire.frontend.listing.listing-details');
    }
}
