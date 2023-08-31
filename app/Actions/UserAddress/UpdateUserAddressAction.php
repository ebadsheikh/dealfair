<?php

namespace App\Actions\UserAddress;

use App\Helpers\GoogleAddressHelper;
use App\Models\UserAddress;

class UpdateUserAddressAction
{
    public function handle($data, UserAddress $userAddress)
    {
        $getAddress = GoogleAddressHelper::getAddressInfo($data);

        return $userAddress->update([
            'full_name' => $data['full_name'],
            'telephone' => $data['telephone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'country_id' => $data['country_id'],
            'latitude' => $getAddress['latitude'],
            'longitude' => $getAddress['longitude'],
        ]);
    }
}
