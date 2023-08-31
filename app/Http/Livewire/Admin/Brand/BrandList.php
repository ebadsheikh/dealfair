<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Illuminate\View\View;
use Livewire\Component;

class BrandList extends Component
{
    /**
     * Declare a public property $searchName
     * @var string
     */
    public string $searchName;

    /**
     * Declare a public property $searchStatus
     * @var string
     */
    public string $searchStatus;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchName = '';
        $this->searchStatus ='';
    }

    /**
     * Lifecycle method that returns a View object
     * @return View
     */
    public function render(): View
    {
        $brands = Brand::when($this->searchName != '', function ($query) {
            $query->where('name', 'like', '%' . $this->searchName . '%');
        })->when(!empty($this->searchStatus), function ($query) {
            $query->whereStatus($this->searchStatus);
        })->paginate(10);

        return view('livewire.admin.brand.brand-list')->with('brands', $brands);
    }
}
