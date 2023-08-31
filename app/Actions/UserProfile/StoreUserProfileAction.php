<?php

namespace App\Actions\UserProfile;

use App\Models\UserProfile;

class StoreUserProfileAction
{
    public function handle($data, $user): UserProfile
    {
        return UserProfile::updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'user_id' => $user->id,
                'username' => $data['username'],
                'date_of_birth' => $data['date_of_birth'],
                'telephone' => $data['telephone'],
                'onboarding_step' => array_key_exists('onboarding_step', $data) ? $data['onboarding_step'] : 3
            ]
        );
    }
}
