<?php

namespace App\Actions\ChangePasswordFromAdmin;

use App\Models\User;

class ChangePasswordAction
{
    /**
     * Handle the password update.
     *
     * @param array $data
     * @param User $user
     * @return User
     */
    public function handle(array $data, User $user): User
    {
        $user->update([
            'password' => $data['new_password']
        ]);

        return $user;
    }
}
