<?php

namespace App\Http\Livewire\Admin\Communities;

use App\Enums\ProductListingTypesEnum;
use App\Enums\ProductStatusEnum;
use App\Models\Community;
use App\Models\Listing;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class CommunitiesList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $searchByZip;
    public string $searchBySoldItems;
    public string $searchByMembers;
    public string $searchBySales;
    public string $searchByState;
    public string $searchByListingType;
    public array $allStates;
    public $listingTypes;

    public function mount(): void
    {
        $this->listingTypes = $this->productListingWithCount();
        $this->allStates = Community::groupBy('state')->pluck('state')->toArray();
    }

    public function productListingWithCount()
    {
        $types = [];

        foreach (ProductListingTypesEnum::toArray() as $listingType) {
            $types[] = [
                'type' => $listingType->value,
                'counts' => Listing::whereListingType($listingType->value)->count()
            ];
        }

        return $types;
    }

    public function render(): View
    {
        $communities = Community::with(['members', 'listings', 'media'])
            ->withCount(['members', 'listings', 'listings as sold_products_count' => function ($query) {
                $query->byStatus(ProductStatusEnum::SOLD->value);
            }])
            ->when(!empty($this->searchByZip), function ($query) {
                $query->where('zip', 'like', '%' . $this->searchByZip . '%');
            })
            ->when(!empty($this->searchByState), function ($query) {
                $query->where('state', $this->searchByState);
            })
            ->when(!empty($this->searchByListingType), function ($query) {
                $query->whereHas('listings', function ($subQuery) {
                    $subQuery->where('listing_type', $this->searchByListingType);
                });
            })
            ->when(!empty($this->searchBySoldItems), function ($query) {
                if ($this->searchBySoldItems === 'higherSoldItems') {
                    $query->latest('sold_products_count');
                } elseif ($this->searchBySoldItems === 'lowerSoldItems') {
                    $query->oldest('sold_products_count');
                }
            })
            ->when(!empty($this->searchByMembers), function ($query) {
                if ($this->searchByMembers === 'higherSoldItems') {
                    $query->latest('members_count');
                } elseif ($this->searchByMembers === 'lowerSoldItems') {
                    $query->oldest('members_count');
                }
            })
            ->paginate(10);

        return view('livewire.admin.communities.communities-list')->with('communities', $communities)->with('states', $this->allStates);
    }
}
