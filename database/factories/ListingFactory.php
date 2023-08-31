<?php

namespace Database\Factories;

use App\Enums\ProductConditionsEnum;
use App\Enums\ProductListingTypesEnum;
use App\Enums\ProductShippingCostPayerEnum;
use App\Enums\ProductStatusEnum;
use App\Helpers\GlobalHelper;
use App\Models\CategoryBrand;
use App\Models\Listing;
use App\Models\User;
use App\Models\UserAddress;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends Factory<Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition(): array
    {
        $listingType = Arr::random(ProductListingTypesEnum::cases());

        $price = fake()->numberBetween(200, 55500);
        $startingBid = fake()->numberBetween(50, $price * 0.3);
        $discountedPrice = fake()->numberBetween(50, $price * 0.4);

        $prepareData = [];

        switch ($listingType->value) {
            case ProductListingTypesEnum::AUCTION->value:
                $prepareData['starting_bid'] = $startingBid;
                break;

            case ProductListingTypesEnum::SELL->value:
                $prepareData['price'] = $price;
                $prepareData['discounted_price'] = Arr::random([0, $discountedPrice]);
                break;

            case ProductListingTypesEnum::BOTH->value:
                $prepareData['starting_bid'] = $startingBid;
                $prepareData['price'] = $price;
                $prepareData['discounted_price'] = Arr::random([0, $discountedPrice]);
                break;
        }


        $prepareData['selling_fees'] = GlobalHelper::getSettingValue('selling_fees');
        $prepareData['payment_charges_fixed'] = GlobalHelper::getSettingValue('payment_charges_fixed');
        $prepareData['payment_charges_percentage'] = GlobalHelper::getSettingValue('payment_charges_percentage');

        $user = User::whereEmail('mwaqasiu@gmail.com')->first();
        $pickUpAddress = UserAddress::whereUserId($user->id)->with('country')->inRandomOrder()->first();
        $categoryBrand = CategoryBrand::with('brand')->inRandomOrder()->first();

        $shippingCostPayer = Arr::random(ProductShippingCostPayerEnum::toArray());

        if ($shippingCostPayer === ProductShippingCostPayerEnum::PICKUP_ONLY->value) {
            $visibleRange = random_int(25, 100);
        } else {
            $visibleRange = 0;
        }

        $currentMonthStartDate = now()->startOfMonth(); // Get the start date of the current month
        $currentMonthEndDate = now(); // Get the end date of the current month
        $randomCreatedAt = fake()->dateTimeBetween($currentMonthStartDate, $currentMonthEndDate); // Generate random date within current month

        return [
            'user_id' => $user->id,
            'title' => fake()->unique()->words(2, true),
            'category_id' => $categoryBrand->category_id,
            'product_condition' => Arr::random(ProductConditionsEnum::toArray()),
            'listing_type' => $listingType,
            'brand' => $categoryBrand->brand->name,
            'starting_bid' => $prepareData['starting_bid'] ?? 0,
            'selling_fees' => $prepareData['selling_fees'],
            'payment_charges_fixed' => $prepareData['payment_charges_fixed'],
            'payment_charges_percentage' => $prepareData['payment_charges_percentage'],
            'price' => $prepareData['price'] ?? 0,
            'discounted_price' => $prepareData['discounted_price'] ?? 0,
            'description' => fake()->sentence,
            'quantity' => fake()->numberBetween(1, 10000),
            'shipping_cost_payer' => $shippingCostPayer,
            'visible_range' => $visibleRange,
            'pickup_latitude' => $pickUpAddress->latitude,
            'pickup_longitude' => $pickUpAddress->longitude,
            'pickup_address' => $pickUpAddress->address,
            'pickup_city' => $pickUpAddress->city,
            'pickup_state' => $pickUpAddress->state,
            'pickup_zip' => $pickUpAddress->zip,
            'pickup_country' => $pickUpAddress->country->name,
            'status' => ProductStatusEnum::PUBLISHED,
            'created_at' => $randomCreatedAt,
            'updated_at' => $randomCreatedAt,
        ];
    }
}
