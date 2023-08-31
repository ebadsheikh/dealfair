<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('category_id')->get();
        return view('frontend.categories.index')
            ->with('categories', $categories);
    }

    public function categoryDetails(Category $category): View
    {
        $childCategories = Category::whereCategoryId($category->id)->get();
        return view('frontend.categories.category-details')
            ->with('parentCategory', $category)
            ->with('childCategories', $childCategories);
    }
}
