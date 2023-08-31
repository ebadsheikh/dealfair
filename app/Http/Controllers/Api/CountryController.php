<?php

namespace App\Http\Controllers\Api;

use App\Enums\HttpStatusCodesEnum;
use App\Http\Controllers\Controller;
use App\Models\Country;

class CountryController extends Controller
{
    public function getCountries()
    {
        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'countries' => Country::all(),
        ]);
    }
}
