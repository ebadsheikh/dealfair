<?php

namespace App\Http\Livewire\Frontend\Community;

use App\Enums\SortProductsEnum;
use App\Models\Community;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CommunityFilterSidebar extends Component
{
    public Collection $communities;

    public $states;

    public array $selected = [
        'searchByZipCode' => "",
        'searchByName' => "",
        'searchByState' => "",
        'searchByCommunitySize' => "",
        'sortByProducts' => "",
        'searchByNearest' => 0,
    ];

    public function mount()
    {
        $this->states = Community::groupBy('state')->pluck('state');
        $this->selected['sortByProducts'] = SortProductsEnum::HIGH_TO_LOW->name;
    }

    public function updatedSelected(): void
    {
        $this->emit('updatedSidebar', $this->selected);
    }

    public function render()
    {
        return view('livewire.frontend.community.community-filter-sidebar');
    }
}
