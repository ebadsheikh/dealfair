<?php

namespace App\Http\Livewire\Frontend\HomePage;

use App\Models\Listing;
use Livewire\Component;

class RecentlyAddedSection extends Component
{
    public function render()
    {
        $recentlyAddedListings = Listing::orderBy('created_at', 'DESC')
            ->take(8)
            ->get();
        return view('livewire.frontend.home-page.recently-added-section')
            ->with('recentlyAddedListings', $recentlyAddedListings);
    }
}
