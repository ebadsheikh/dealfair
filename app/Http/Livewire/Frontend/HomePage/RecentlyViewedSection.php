<?php

namespace App\Http\Livewire\Frontend\HomePage;

use App\Helpers\GlobalHelper;
use App\Models\ListingView;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RecentlyViewedSection extends Component
{
    public function render()
    {
        $recentlyViewedListings = null;
        $isLoggedInCustomer = GlobalHelper::getCustomer();
        if ($isLoggedInCustomer) {
            $recentlyViewedListings = ListingView::select('listing_id', DB::raw('MAX(created_at) as max_created_at'))
                ->whereUserId($isLoggedInCustomer->id)
                ->orderBy('max_created_at', 'DESC')
                ->groupBy('listing_id')
                ->whereHas('listing')
                ->with('listing')
                ->take(8)
                ->get();
        }

        return view('livewire.frontend.home-page.recently-viewed-section')
            ->with('recentlyViewedListings', $recentlyViewedListings);
    }
}
