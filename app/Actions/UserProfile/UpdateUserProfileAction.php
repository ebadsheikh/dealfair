<?php

namespace App\Actions\UserProfile;

use App\Models\User;

class UpdateUserProfileAction
{
    /**
     * Handle the incoming request.
     * @param array $data
     * @return User
     */
    public function handle(array $data, User $user)
    {
        $update_user_profile = $user->userProfile()->update([
            'user_id' => $user->id,
            'date_of_birth' => $data['date_of_birth'],
            'telephone' => $data['telephone'],
        ]);
        return $update_user_profile;
    }
}
