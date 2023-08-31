<?php

namespace App\Actions\Store;

use App\Enums\MediaDirectoryNamesEnum;
use App\Enums\StoreStatusEnum;
use App\Helpers\GoogleAddressHelper;
use App\Models\Store;
use Exception;
use Illuminate\Support\Str;

class StoreAction
{
    /**
     * @throws Exception
     */
    public function handle($data, $user)
    {
        $getAddress = GoogleAddressHelper::getAddressInfo($data);

        $store = Store::create(
            [
                'user_id' => $user->id,
                'slug' => Str::slug($data['store_name'] . '-' . random_int(1000, 10000)),
                'store_name' => $data['store_name'],
                'category_id' => $data['category_id'],
                'email' => $data['email'],
                'telephone' => $data['telephone'],
                'zip' => $data['zip'],
                'address' => $data['address'],
                'city' => $data['city'],
                'state' => $data['state'],
                'state_code' => $data['state_code'] ?? $data['state'],
                'country_id' => $data['country_id'],
                'latitude' => $getAddress['latitude'],
                'longitude' => $getAddress['longitude'],
                'status' => StoreStatusEnum::ACTIVE,
            ]
        );

        $store->addMediaFromRequest('store_logo')->toMediaCollection(MediaDirectoryNamesEnum::STORE_LOGO->value);
        $store->addMediaFromRequest('store_thumbnail')->toMediaCollection(MediaDirectoryNamesEnum::STORE_THUMBNAIL->value);

        return $store;
    }
}
