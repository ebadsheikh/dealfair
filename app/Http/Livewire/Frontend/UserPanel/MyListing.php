<?php

namespace App\Http\Livewire\Frontend\UserPanel;

use App\Helpers\GlobalHelper;
use App\Models\Listing;
use App\Models\Store;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class MyListing extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $searchByTitle;
    public $searchByStatus;

    public $user;

    public $searchByStore;

    public $stores;

    protected $queryString = [
        'searchByTitle' => ['except' => '', 'as' => 'title'],
        'searchByStatus' => ['except' => '', 'as' => 'status'],
        'searchByStore' => ['except' => '', 'as' => 'store']
    ];


    public function mount($storeSlug = null)
    {
        $this->user = GlobalHelper::getUser();
        $this->stores = $this->user->stores()->get();
        if ($storeSlug !== null) {
            $this->searchByStore = $storeSlug;
        }
    }

    public function render(): View
    {
        $listings = Listing::with(['category', 'media'])
            ->where(function ($query) {
                $query->whereUserId($this->user->id)
                    ->orWhereIn('store_id', $this->user->stores()->pluck('id')->toArray());
            })
            ->when(!empty($this->searchByTitle), function ($query) {
                $query->where('title', 'like', '%' . $this->searchByTitle . '%');
            })
            ->when(!empty($this->searchByStatus), function ($query) {
                $query->whereStatus($this->searchByStatus);
            })
            ->when(!empty($this->searchByStore), function ($query) {
                $store = Store::whereUserId($this->user->id)->whereSlug($this->searchByStore)->first();
                if ($store) {
                    $query->whereStoreId($store->id);
                }
            })
            ->orderBy('updated_at', 'DESC')->paginate(10);


        return view('livewire.frontend.user-panel.my-listing')
            ->with('listings', $listings);
    }
}
