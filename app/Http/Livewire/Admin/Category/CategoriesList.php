<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CategoriesList extends Component
{
    public string $searchName;
    public string $searchSlug;
    public $searchStatus;
    public $searchByImage;

    public $parentCategory;

    public function mount($parentCategory = null)
    {
        $this->parentCategory = $parentCategory;
    }

    public function render(): View
    {
        $categories = Category::when(empty($this->parentCategory), function ($query) {
            $query->whereNull('category_id');
        })->when(!empty($this->parentCategory), function ($query) {
            $query->whereCategoryId($this->parentCategory);
        })->when(!empty($this->searchName), function ($query) {
            $query->where('name', 'like', '%' . $this->searchName . '%');
        })->when(!empty($this->searchSlug), function ($query) {
            $query->where('slug', 'like', '%' . $this->searchSlug . '%');
        })->when(!empty($this->searchStatus), function ($query) {
            $query->whereStatus($this->searchStatus);
        })->when(!empty($this->searchByImage), function ($query) {
            if ($this->searchByImage == "havingImage") {
                $query->whereNotNull('image_url');
            } elseif ($this->searchByImage == "notHavingImage") {
                $query->whereNull('image_url');
            }
        })->withCount('childrenCategories')
            ->orderBy('children_categories_count', 'DESC')
            ->get();

        return view('livewire.admin.category.categories-list')->with('categories', $categories);
    }
}
