<?php

namespace App\Http\Livewire\Frontend\Community;

use App\Enums\SortProductsEnum;
use App\Models\Community;
use App\Models\Listing;
use Livewire\Component;
use Livewire\WithPagination;

class CommunityList extends Component
{
    use WithPagination;

    public $perPage = 20;

    public $selected = [
        'searchByZipCode' => "",
        'searchByName' => "",
        'searchByState' => "",
        'searchByCommunitySize' => "",
        'sortByProducts' => "",
        'searchByNearest' => 0
    ];

    protected $listeners = ['updatedSidebar' => 'setSelected'];

    public $listingWithoutCommunityCount;

    public function mount()
    {
        $this->selected['sortByProducts'] = SortProductsEnum::HIGH_TO_LOW->name;
        $this->listingWithoutCommunityCount = Listing::doesntHave('communities')->count();
    }

    public function setSelected($selected): void
    {
        $this->selected = $selected;
    }

    public function loadMore()
    {
        $this->perPage += 20;
    }

    public function render()
    {
        $communities = Community::with('media')
            ->withCount(['members', 'listings'])
            ->withFilters(
                $this->selected["searchByZipCode"],
                $this->selected["searchByName"],
                $this->selected["searchByState"],
                $this->selected["searchByCommunitySize"],
                $this->selected["sortByProducts"],
                $this->selected["searchByNearest"]
            )->paginate($this->perPage);
        return view('livewire.frontend.community.community-list')
            ->with('communities', $communities);
    }
}
