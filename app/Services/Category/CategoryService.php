<?php

namespace App\Services\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function getCategoryTree(): Collection
    {
        return Category::whereNull('category_id')
            ->with('childrenCategories')->get();
    }

    public function getLeafCategoriesWithoutOther(): Collection
    {
        return Category::where('name', '!=', 'other')->whereDoesntHave('categories')->get();
    }

    public function getLeafCategoriesWithOther(): Collection
    {
        return Category::whereDoesntHave('categories')->get();
    }
}
