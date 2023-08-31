<?php

namespace App\Http\Controllers\Api;

use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\SettingResource;

class SettingApiController extends Controller
{
    /**
     * Method to get all settings
     *
     */
    public function getAllSetting()
    {
        return response()->json(['data' => SettingResource::make(GlobalHelper::getSettings())], 200);
    }
}
