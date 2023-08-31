<?php

namespace App\Actions\Admin;

use App\Actions\UserProfile\StoreUserProfileAction;
use App\Actions\User\StoreUserAction;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

class StoreAdminAction
{
    /**
     * Declare StoreUserProfileAction instance
     *@var StoreUserAction
     */
    private StoreUserAction $storeUserAction;

    /**
     * User Registration Constructor
     *
     * @param StoreUserAction $storeUserAction - The user action
     */
    public function __construct(
        StoreUserAction $storeUserAction
    ) {
        $this->storeUserAction = $storeUserAction;
    }

    /**
     * Handle the incoming request.
     * @param array $data
     * @return User
     */
    public function handle(array $data): User | RedirectResponse
    {
        $user = $this->storeUserAction->handle($data);

        // Assign the "user" role to the new user
        $role = Role::findByName('admin');
        $user->assignRole($role);

        // Assign the permissions to the user
        $user->syncPermissions('admin.dashboard');

        return $user;
    }
}
