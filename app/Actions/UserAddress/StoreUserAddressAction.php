<?php

namespace App\Actions\UserAddress;

use App\Enums\UserAddressTypesEnum;
use App\Helpers\GoogleAddressHelper;
use App\Models\UserAddress;

class StoreUserAddressAction
{
    public function handle($data, $user)
    {
        $getAddress = GoogleAddressHelper::getAddressInfo($data);

        return UserAddress::firstOrcreate(
            [
                'zip' => $data['zip'],
                'user_id' => $user->id,
            ],
            [
                'user_id' => $user->id,
                'full_name' => $data['full_name'],
                'telephone' => $data['telephone'],
                'zip' => $data['zip'],
                'address' => $data['address'],
                'city' => $data['city'],
                'state' => $data['state'],
                'state_code' => $data['state_code'] ?? $data['state'],
                'country_id' => $data['country_id'],
                'latitude' => $getAddress['latitude'],
                'longitude' => $getAddress['longitude'],
                'address_type' => array_key_exists('address_type', $data) ? $data['address_type'] : UserAddressTypesEnum::PRIMARY,
            ]
        );
    }
}
