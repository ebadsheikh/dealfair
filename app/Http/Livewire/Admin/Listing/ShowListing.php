<?php

namespace App\Http\Livewire\Admin\Listing;

use App\Models\Listing;
use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class ShowListing extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $searchByTitle;
    public $searchByStatus;
    public $searchByStore;

    public $stores;


    public function mount($storeSlug = null)
    {
        $this->stores = Store::all();
    }
    public function render()
    {
        $listings = Listing::with(['category', 'media'])
            ->when(!empty($this->searchByTitle), function ($query) {
                $query->where('title', 'like', '%' . $this->searchByTitle . '%');
            })
            ->when(!empty($this->searchByStatus), function ($query) {
                $query->whereStatus($this->searchByStatus);
            })
            ->when(!empty($this->searchByStore), function ($query) {
                $store = Store::whereSlug($this->searchByStore)->first();
                if ($store) {
                    $query->whereStoreId($store->id);
                }
            })
            ->orderBy('updated_at', 'DESC')->paginate(10);

        return view('livewire.admin.listing.show-listing')->with('listings', $listings);
    }
}
