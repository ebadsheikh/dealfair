<?php

namespace App\Actions\User;

use App\Enums\MediaDirectoryNamesEnum;
use App\Models\User;

class UpdateUserAction
{
    /**
     * Handle the incoming request.
     * @param array $data
     * @return User
     */
    public function handle(array $data, User $user): User
    {
        $user->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);

        if (array_key_exists('image', $data)) {
            // Update the user's image if a new image is uploaded
            $user->clearMediaCollection(MediaDirectoryNamesEnum::PROFILE_IMAGES->value);
            $user->addMediaFromRequest('image')->toMediaCollection(MediaDirectoryNamesEnum::PROFILE_IMAGES->value);
        }

        return $user;
    }
}
