<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Country;
use App\Models\Store;
use App\Models\User;
use Exception;
use Faker\Provider\en_US\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition(): array
    {
        $userId = User::whereEmail('mwaqasiu@gmail.com')->first()->id;
        $storeName = $this->faker->name;
        $storeSlug = Str::slug($storeName . '-' . random_int(1000, 10000));
        $categoryId = Category::whereNull('category_id')->inRandomOrder()->first()->id;

        return [
            'user_id' => $userId,
            'slug' => $storeSlug,
            'store_name' => $storeName,
            'category_id' => $categoryId,
            'email' => $this->faker->safeEmail,
            'telephone' => $this->faker->regexify('^(\+92)[0-9]{10}$'),
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => Address::state(),
            'state_code' => Address::stateAbbr(),
            'zip' => $this->faker->unique()->postcode,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'country_id' => Country::first()
        ];
    }
}
