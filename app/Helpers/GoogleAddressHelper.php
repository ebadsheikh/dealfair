<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class GoogleAddressHelper
{
    public static function getAddressInfo(array $data): array
    {
        $apiKey = config('map.google_map_api_key');

        $latitude = 0;
        $longitude = 0;

        $addressQuery = urlencode($data['address'] . ', ' . $data['city'] . ', ' . $data['state'] . ', ' . $data['zip']);

        $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json?address=$addressQuery&key=$apiKey");

        if ($response->status() == 200) {
            $result = $response->json();

            if ($result['status'] == 'OK') {
                $location = $result['results'][0];

                $latitude = $location['geometry']['location']['lat'];
                $longitude = $location['geometry']['location']['lng'];
            }
        }

        return [
            'latitude' => $latitude,
            'longitude' => $longitude
        ];
    }
}
