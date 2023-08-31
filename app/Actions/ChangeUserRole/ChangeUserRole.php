<?php

namespace App\Actions\ChangeUserRole;

use App\Models\User;
use Spatie\Permission\Models\Role;

class ChangeUserRole
{
    /**
     * Update the user's role.
     *
     * @param User $user
     * @param Role $role
     * @return User
     */
    public function handle(User $user, Role $role): User
    {
        $newRole = Role::whereId($role->id)->first();

        if ($newRole) {
            $user->syncRoles([$newRole]);
        }

        return $user;
    }
}
