<?php

namespace App\Http\Livewire\Frontend\Store;

use App\Models\Store;
use Livewire\Component;

class StoreDetail extends Component
{
    public $storeSlug;

    public function mount($storeSlug)
    {
        $this->storeSlug = $storeSlug;
    }

    public function render()
    {
        $store = Store::whereSlug($this->storeSlug)
            ->with(['listings', 'category'])
            ->withCount(['listings'])
            ->first();
        return view('livewire.frontend.store.store-detail')
            ->with('store', $store);
    }
}
