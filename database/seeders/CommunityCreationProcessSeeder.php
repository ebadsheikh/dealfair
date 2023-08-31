<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Enums\UserAddressTypesEnum;
use App\Models\Community;
use App\Models\CommunityMember;
use App\Models\UserAddress;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\User;

class CommunityCreationProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->prepareAddresses() as $address) {
            $userAddress = UserAddress::create($address);
            $community = $this->storeCommunity($userAddress);
            $this->storeCommunityMember($community);
        }
    }

    /**
     * Store a new community if it doesn't already exist in the database.
     * The community is created based on the user's address zip code.
     * @param UserAddress $userAddress The user's address information.
     * @return Community The created or existing community.
     */
    public function storeCommunity(UserAddress $userAddress): Community
    {
        // Create or get the community based on the user's address zip code
        return Community::firstOrCreate(
            [
                'zip' => $userAddress->zip
            ],
            [
                'name' => $userAddress->city . ', ' . $userAddress->state_code . ' ' . $userAddress->zip,
                'short_name' => $userAddress->city . ', ' . $userAddress->state_code,
                'zip' => $userAddress->zip,
                'state' => $userAddress->state,
                'state_code' => $userAddress->state_code,
                'city' => $userAddress->city,
            ]
        );
    }

    /**
     * Store a new community member and set the default community admin as a superadmin.
     * @param Community $community The community to add the user to.
     * @return void
     */
    public function storeCommunityMember(Community $community): void
    {
        // Get the superadmin user for the default community admin
        $superAdmin = User::role(RolesEnum::SUPERADMIN->value)->first();

        // Add the superadmin user as an admin for the community if not already added
        CommunityMember::firstOrCreate(
            [
                'community_id' => $community->id,
                'user_id' => $superAdmin->id
            ],
            [
                'community_id' => $community->id,
                'user_id' => $superAdmin->id,
                'is_admin' => true
            ]
        );

        $customer = User::customer()->inRandomOrder()->first();

        // Add the specified user to the community if not already added
        CommunityMember::firstOrCreate(
            [
                'community_id' => $community->id,
                'user_id' => $customer->id
            ],
            [
                'community_id' => $community->id,
                'user_id' => $customer->id,
                'is_admin' => false
            ]
        );
    }

    /**
     * This method is used to get realData of addresses.
     * @return array
     */
    public function prepareAddresses(): array
    {
        $country = Country::first();
        $customer = User::whereEmail('mwaqasiu@gmail.com')->first();

        return [
            [
                'address' => 'Florida, Fort Lauderdale, 33301',
                'state' => 'Florida',
                'state_code' => 'FL',
                'city' => 'Fort Lauderdale',
                'zip' => '33301',
                'latitude' => 26.11939,
                'longitude' => -80.139756,
                'address_type' => UserAddressTypesEnum::PRIMARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ],
            [
                'address' => 'Texas, Austin, 78745',
                'state' => 'Texas',
                'state_code' => 'TX',
                'city' => 'Austin',
                'zip' => '78745',
                'latitude' => 30.2044296227133,
                'longitude' => -97.7658320666902,
                'address_type' => UserAddressTypesEnum::SECONDARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ],
            [
                'address' => 'California, San Diego, 92134',
                'state' => 'California',
                'state_code' => 'CA',
                'city' => 'San Diego',
                'zip' => '92134',
                'latitude' => 32.7252699778674,
                'longitude' => -117.145712602226,
                'address_type' => UserAddressTypesEnum::SECONDARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ],
            [
                'address' => 'New Mexico, New Mexico, 87104',
                'state' => 'New Mexico',
                'state_code' => 'NM',
                'city' => 'Albuquerque',
                'zip' => '87104',
                'latitude' => 35.1252860889708,
                'longitude' => -106.827405274929,
                'address_type' => UserAddressTypesEnum::SECONDARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ],
            [
                'address' => 'Kentucy, Georgetown, 40324',
                'state' => 'Kentucy',
                'state_code' => 'KY',
                'city' => 'Georgetown',
                'zip' => '40324',
                'latitude' => 38.2104171435776,
                'longitude' => -84.5610734434769,
                'address_type' => UserAddressTypesEnum::SECONDARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ],
            [
                'address' => 'Ohio, Cleveland, 44113',
                'state' => 'Ohio',
                'state_code' => 'OH',
                'city' => 'Cleveland',
                'zip' => '44113',
                'latitude' => 41.4863414349838,
                'longitude' => -81.7042241626623,
                'address_type' => UserAddressTypesEnum::SECONDARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ],
            [
                'address' => 'Oklahoma, Oklahoma City, 73103',
                'state' => 'Oklahoma',
                'state_code' => 'OK',
                'city' => 'Oklahoma City',
                'zip' => '73103',
                'latitude' => 35.4996152723344,
                'longitude' => -97.5174993343477,
                'address_type' => UserAddressTypesEnum::SECONDARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ],
            [
                'address' => 'Wisconsin, Kohler, 53044',
                'state' => 'Wisconsin',
                'state_code' => 'WI',
                'city' => 'Kohler',
                'zip' => '53044',
                'latitude' => 43.86887194,
                'longitude' => -87.75491202,
                'address_type' => UserAddressTypesEnum::SECONDARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ],
            [
                'address' => 'Oregon, Carlton, 97111',
                'state' => 'Oregon',
                'state_code' => 'OR',
                'city' => 'Carlton',
                'zip' => '97111',
                'latitude' => 45.35921845,
                'longitude' => -123.5670304,
                'address_type' => UserAddressTypesEnum::SECONDARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ],
            [
                'address' => 'Arkansas, Little Rock, 72202',
                'state' => 'Arkansas',
                'state_code' => 'AR',
                'city' => 'Little Rock',
                'zip' => '72202',
                'latitude' => 34.80526133,
                'longitude' => -92.30863482,
                'address_type' => UserAddressTypesEnum::SECONDARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ],
            [
                'address' => 'Mississippi, Moss Point, 39562',
                'state' => 'Mississippi',
                'state_code' => 'MS',
                'city' => 'Moss Point',
                'zip' => '39562',
                'latitude' => 30.79456972,
                'longitude' => -88.08568747,
                'address_type' => UserAddressTypesEnum::SECONDARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ],
            [
                'address' => 'Alabama, Brent, 35034',
                'state' => 'Alabama',
                'state_code' => 'AL',
                'city' => 'Brent',
                'zip' => '35034',
                'latitude' => 32.94091502,
                'longitude' => -86.89936158,
                'address_type' => UserAddressTypesEnum::SECONDARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ],
            [
                'address' => 'Georgia, Marietta, 30060',
                'state' => 'Georgia',
                'state_code' => 'GA',
                'city' => 'Marietta',
                'zip' => '30060',
                'latitude' => 33.97480078,
                'longitude' => -84.71951509,
                'address_type' => UserAddressTypesEnum::SECONDARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ],
            [
                'address' => 'Kansas, Burrton, 67020',
                'state' => 'Kansas',
                'state_code' => 'KS',
                'city' => 'Burrton',
                'zip' => '67020',
                'latitude' => 38.09905625,
                'longitude' => -97.68024991,
                'address_type' => UserAddressTypesEnum::SECONDARY,
                'country_id' => $country->id,
                'user_id' => $customer->id
            ]
        ];
    }
}
