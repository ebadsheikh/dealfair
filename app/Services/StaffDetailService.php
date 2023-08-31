<?php

namespace App\Services;

use App\Models\User;

class StaffDetailService
{
    public function getUserData(User $user)
    {
        $userProfile = $user->userProfile()->first();
        return [
            'user' => $user,
            'userProfile' => $userProfile
        ];
    }
}
