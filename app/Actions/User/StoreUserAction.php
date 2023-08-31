<?php

namespace App\Actions\User;

use App\Enums\MediaDirectoryNamesEnum;
use App\Models\User;

class StoreUserAction
{
    /**
     * Handle the incoming request.
     * @param array $data
     * @return User
     */
    public function handle(array $data): User
    {
        $user = User::create($data);
        if (array_key_exists('image', $data)) {
            $user->addMediaFromRequest('image')->toMediaCollection(MediaDirectoryNamesEnum::PROFILE_IMAGES->value);
        }

        return $user;
    }
}
