<?php

namespace App\Actions\Community;

use App\Models\Community;
use App\Models\Country;

class StoreCommunityAction
{
    public function handle(array $data): Community
    {
        $country = Country::whereId($data['country_id'])->first();
        $stateCode = $data['state_code'] ?? $data['state'];
        $community = Community::firstOrCreate([
            'zip' => $data['zip'],
        ], [
            'name' => $data['city'] . ', ' . $stateCode . ' ' . $data['zip'],
            'short_name' => $data['city'] . ', ' . $stateCode,
            'zip' => $data['zip'],
            'state' => $data['state'],
            'state_code' => $stateCode,
            'city' => $data['city'],
        ]);

        return $community;
    }
}
