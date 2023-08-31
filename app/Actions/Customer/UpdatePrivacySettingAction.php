<?php

namespace App\Actions\Customer;

use App\Models\UserProfile;

class UpdatePrivacySettingAction
{
    public function handle($data, $userProfile): UserProfile
    {
        return UserProfile::updateOrCreate(
            [
                'user_id' => $userProfile->user_id,
            ],
            [
                'user_id' => $userProfile->user_id,
                'show_name' => $data['show_name'],
            ]
        );
    }
}
