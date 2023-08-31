<?php

namespace App\Actions\Product;

use App\Enums\MediaDirectoryNamesEnum;
use App\Enums\ProductStatusEnum;
use App\Helpers\GlobalHelper;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class StoreProductAction
{
    public function handle(array $data, $pickUpAddress): Product
    {
        $user = GlobalHelper::getUser();

        $shippingAddress = UserAddress::whereId($pickUpAddress)->first();


        $product = Product::create([
            'title' => $data['listingTitle'],
            'slug' => Str::slug($data['listingTitle'].' '.Str::random(8)),
            'user_id' => $user->id,
            'category_id' => $data['parentCategory'],
            'brand' => $data['brand'],
            'sub_category_id' => $data['childCategory'],
            'color' => $data['color'],
            'description' => $data['listingDetails'],
            'product_condition' => $data['productCondition'],
            'listing_type' => $data['listingType'],
            'starting_bid' => $data['startingBid'] ?? 0,
            'selling_fee' => $data['sellSellingFee'] ?? 0,
            'processing_fee' => $data['sellProcessingFee'] ?? 0,
            'price' => $data['productPrice'] ?? 0,
            'discounted_price' => $data['discountedProductPrice'] ?? 0,
            'shipping_cost_payer' => $data['shippingCostPayer'],
            'weight' => $data['weight'] ?? 0,
            'length' => $data['length'] ?? 0,
            'width' => $data['width'] ?? 0,
            'height' => $data['height'] ?? 0,
            'visible_range' => $data['visibleRange'] ?? 0,
            'shipping_address' => $shippingAddress->address,
            'shipping_city' => $shippingAddress->city,
            'shipping_latitude' => $shippingAddress->latitude,
            'shipping_longitude' => $shippingAddress->longitude,
            'shipping_state' => $shippingAddress->state,
            'shipping_zip' => $shippingAddress->zip,
            'shipping_country' => $shippingAddress->country_id,
            'status' => ProductStatusEnum::PUBLISH->value
        ]);

        $folderPath = storage_path('app/tmp');
        if (is_dir($folderPath)) {
            $files = File::allFiles($folderPath);
            $timestamp = time();

            foreach ($files as $file) {
                $imageName = $file->getFilename();

                $newImageName = $timestamp . '_' . $imageName; // Concatenate the current time with the image name

                $path = $folderPath . '/' . $imageName;
                $newPath = $folderPath . '/' . $newImageName; // Construct the new path with the concatenated image name

                // Rename the file with the concatenated image name
                File::move(
                    $path,
                    $newPath
                );

                $product->addMedia($newPath)->toMediaCollection(MediaDirectoryNamesEnum::PRODUCT_IMAGES->value);

            }

            $mediaCollection = $product->getMedia(MediaDirectoryNamesEnum::PRODUCT_IMAGES->value);

            $selectedPhotoName = $timestamp . '_' . pathinfo($data['selectedMainPhotoId'], PATHINFO_FILENAME);
            // Find the main photo
            $mainPhoto = $mediaCollection->firstWhere('name', $selectedPhotoName);

            if ($mainPhoto) {
                // Move the main photo to the beginning of the collection
                $mediaCollection = $mediaCollection->filter(function ($media) use ($mainPhoto) {
                    return $media->id !== $mainPhoto->id;
                });
                $mediaCollection->prepend($mainPhoto);
            }
            $order = 1;

            // Update the order of the media items in the collection, starting from 1
            $mediaCollection->each(function ($media) use (&$order) {
                // Add 1 to the order to start from 1 instead of 0
                $media->order_column = $order;
                $media->save();
                $order++;
            });
        }

        return $product;
    }
}
