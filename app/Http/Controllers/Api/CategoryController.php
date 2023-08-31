<?php

namespace App\Http\Controllers\Api;

use App\Enums\HttpStatusCodesEnum;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getTopSixCategories()
    {
        $topSixCategories = Category::with('media')->take(6)->get();
        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'categories' => $topSixCategories,
        ]);
    }

    public function getCategoriesWithPagination()
    {
        $categories  = Category::with('media')->paginate(10);
        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'categories' => $categories,
        ]);
    }
}
