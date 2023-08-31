<?php

namespace App\Http\Livewire\Frontend\HomePage;

use App\Helpers\GlobalHelper;
use App\Models\Listing;
use Livewire\Component;

class HomeCommunitySection extends Component
{
    public function render()
    {
        $logedInCustomer = GlobalHelper::getCustomer();
        $homeCommunity = null;
        $homeCommunityListings = null;
        if ($logedInCustomer) {
            $homeCommunity = $logedInCustomer->homeCommunity()->first();

            $homeCommunityListings = Listing::with(['communities'])
                ->whereHas('communities', function ($query) use ($homeCommunity) {
                    $query->where('community_id', $homeCommunity?->id);
                })->orderBy('created_at', 'DESC')
                ->take(8)
                ->get();
        }
        return view('livewire.frontend.home-page.home-community-section')
            ->with('homeCommunity', $homeCommunity)
            ->with('homeCommunityListings', $homeCommunityListings);
    }
}
