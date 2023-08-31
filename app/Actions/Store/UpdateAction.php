<?php

namespace App\Actions\Store;

use App\Enums\MediaDirectoryNamesEnum;
use App\Enums\StoreStatusEnum;
use App\Helpers\GoogleAddressHelper;
use App\Models\Store;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class UpdateAction
{
    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function handle(array $data, Store $store, User $user): Store
    {
        $getAddress = GoogleAddressHelper::getAddressInfo($data);

        $store->update(
            [
                'user_id' => $user->id,
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

        if (array_key_exists('store_logo', $data)) {
            $store->clearMediaCollection(MediaDirectoryNamesEnum::STORE_LOGO->value);
            $store->addMediaFromRequest('store_logo')->toMediaCollection(MediaDirectoryNamesEnum::STORE_LOGO->value);
        }

        if (array_key_exists('store_thumbnail', $data)) {
            $store->clearMediaCollection(MediaDirectoryNamesEnum::STORE_THUMBNAIL->value);
            $store->addMediaFromRequest('store_thumbnail')->toMediaCollection(MediaDirectoryNamesEnum::STORE_THUMBNAIL->value);
        }
        return $store;
    }
}
