<?php

namespace App\Http\Controllers\Api;

use App\Enums\HttpStatusCodesEnum;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    public function getTopSixBrands()
    {
        $topSixBrands = Brand::take(6)->get();
        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'brands' => $topSixBrands,
        ]);
    }

    public function getBrandsWithPagination()
    {
        $brands  = Brand::paginate(10);
        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'brands' => $brands,
        ]);
    }
}
