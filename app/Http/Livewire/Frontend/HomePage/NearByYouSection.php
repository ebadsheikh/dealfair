<?php

namespace App\Http\Livewire\Frontend\HomePage;

use App\Models\Community;
use App\Models\Listing;
use Livewire\Component;

class NearByYouSection extends Component
{
    public function render()
    {
        $nearByCommunities = Community::nearByCommunities(100)->pluck('id')->toArray();

        $nearByYouListings = Listing::with(['communities' => function ($query) use ($nearByCommunities) {
            $query->whereIn('community_id', $nearByCommunities);
        }])->take(8)->get();
        return view('livewire.frontend.home-page.near-by-you-section')
            ->with('nearByYouListings', $nearByYouListings);
    }
}
