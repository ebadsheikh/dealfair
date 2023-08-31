<?php

namespace App\Http\Livewire\Frontend\Listing;

use App\Helpers\GlobalHelper;
use App\Models\Category;
use App\Models\Community;
use App\Models\Listing;
use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class ListingList extends Component
{
    use WithPagination;

    public $searchByListingTitle = "";
    public $searchByListingType = "";
    public $searchByListingPriceRange = "";

    public $searchByListingCondition = "";

    public $searchByShippingCostPayer = "";

    public $perPage = 20;

    public $community;
    public $category;
    public $store;

    public function mount(string $communitySlug = null, string $categorySlug = null, string $storeSlug = null)
    {
        $this->community = Community::whereSlug($communitySlug)->first();
        $this->category = Category::whereSlug($categorySlug)->first();
        $this->store = Store::whereSlug($storeSlug)->first();
    }

    protected $queryString = [
        'searchByListingTitle' => ['except' => "", 'as' => "title"],
        'searchByListingType' => ['except' => "", 'as' => "type"],
        'searchByListingPriceRange' => ['except' => "", 'as' => "price_range"],
        'searchByListingCondition' => ['except' => "", 'as' => "condition"],
        'searchByShippingCostPayer' => ['except' => "", 'as' => "shipping_cost_payer"]
    ];

    protected $listeners = [
        'updatedSearchByListingTitleValue' => 'setSearchByListingTitleValue',
        'updatedSearchByListingTypeValue' => 'setSearchByListingTypeValue',
        'updatedSearchByListingPriceRangeValue' => 'setSearchByListingPriceRangeValue',
        'updatedSearchByListingConditionValue' => 'setSearchByListingConditionValue',
        'updatedSearchByShippingCostPayerValue' => 'setSearchByShippingCostPayerValue',
    ];

    public function setSearchByListingTitleValue($value)
    {
        $this->searchByListingTitle = $value;
    }

    public function setSearchByListingTypeValue($value)
    {
        $this->searchByListingType = $value;
    }

    public function setSearchByListingPriceRangeValue($value)
    {
        $this->searchByListingPriceRange = $value;
    }

    public function setSearchByListingConditionValue($value)
    {
        $this->searchByListingCondition = $value;
    }

    public function setSearchByShippingCostPayerValue($value)
    {
        $this->searchByShippingCostPayer = $value;
    }


    public function loadMore()
    {
        $this->perPage += 20;
    }

    public function render()
    {
        $listings = Listing::select("*")->withFilters(
            $this->searchByListingTitle,
            $this->searchByListingType,
            $this->searchByListingPriceRange,
            $this->searchByListingCondition,
            $this->searchByShippingCostPayer,
        )->when($this->community, function ($query) {
            $query->withCommunityOrNoCommunity($this->community->id);
        })->when($this->category, function ($query) {
            $query->whereIn('category_id', GlobalHelper::pluckChildCategoryIds($this->category));
        })->when($this->store, function ($query) {
            $query->whereStoreId($this->store->id);
        })->paginate($this->perPage);
        return view('livewire.frontend.listing.listing-list')
            ->with('listings', $listings);
    }
}
