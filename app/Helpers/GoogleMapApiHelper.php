<?php

namespace App\Helpers;

class GoogleMapApiHelper
{
    /**
     * Retrieve the API configuration for Google Maps.
     *
     * @return array
     */
    public static function getMapEnvApiConfigs(): array
    {
        return [
            'GOOGLE_MAP_API_KEY' => GlobalHelper::getSettingValue('google_map_api_key'),
        ];
    }
}
