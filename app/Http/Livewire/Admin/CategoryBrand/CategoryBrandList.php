<?php

namespace App\Http\Livewire\Admin\CategoryBrand;

use App\Models\CategoryBrand;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryBrandList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $categoryBrands = CategoryBrand::with(['brand', 'category'])->paginate(10);
        return view('livewire.admin.category-brand.category-brand-list')->with('categoryBrands', $categoryBrands);
    }
}
