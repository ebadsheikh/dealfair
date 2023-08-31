<?php

namespace App\Http\Livewire\Frontend\Listing;

use Livewire\Component;

class ListingFilterSiderbar extends Component
{
    public $searchByListingTitle = "";
    public $searchByListingType = "";
    public $searchByListingPriceRange = "";
    public $searchByListingCondition = "";
    public $searchByShippingCostPayer = "";

    protected $queryString = [
        'searchByListingTitle' => ['except' => "", 'as' => "title"],
        'searchByListingType' => ['except' => "", 'as' => "type"],
        'searchByListingPriceRange' => ['except' => "", 'as' => "price_range"],
        'searchByListingCondition' => ['except' => "", 'as' => "condition"],
        'searchByShippingCostPayer' => ['except' => "", 'as' => "shipping_cost_payer"]
    ];

    public function updatedSearchByListingTitle()
    {
        $this->emit('updatedSearchByListingTitleValue', $this->searchByListingTitle);
    }

    public function updatedSearchByListingType()
    {
        $this->emit('updatedSearchByListingTypeValue', $this->searchByListingType);
    }

    public function updatedSearchByListingPriceRange()
    {
        $this->emit('updatedSearchByListingPriceRangeValue', $this->searchByListingPriceRange);
    }

    public function updatedSearchByListingCondition()
    {
        $this->emit('updatedSearchByListingConditionValue', $this->searchByListingCondition);
    }

    public function updatedSearchByShippingCostPayer()
    {
        $this->emit('updatedSearchByShippingCostPayerValue', $this->searchByShippingCostPayer);
    }

    public function render()
    {
        return view('livewire.frontend.listing.listing-filter-siderbar');
    }
}
