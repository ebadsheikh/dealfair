<?php

namespace App\Actions\Staff;

use App\Actions\UserProfile\StoreUserProfileAction;
use App\Actions\User\StoreUserAction;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

class StoreStaffAction
{
    /**
     * Declare StoreUserProfileAction instance
     *@var StoreUserAction
     */
    private StoreUserAction $storeUserAction;

    /**
     * Declare StoreUserProfileAction instance
     *@var StoreUserProfileAction
     */
    private StoreUserProfileAction $storeUserProfileAction;

    /**
     * User Registration Constructor
     *
     * @param StoreUserAction $storeUserAction - The user action
     * @param StoreUserProfileAction     $storeUserProfileAction - The user profile action.
     */
    public function __construct(
        StoreUserAction $storeUserAction,
        StoreUserProfileAction  $storeUserProfileAction
    ) {
        $this->storeUserAction = $storeUserAction;
        $this->storeUserProfileAction = $storeUserProfileAction;

    }

    /**
     * Handle the incoming request.
     * @param array $data
     * @return User
     */
    public function handle(array $data): User | RedirectResponse
    {
        $user = $this->storeUserAction->handle($data);
        $this->storeUserProfileAction->handle($data, $user);

        // Assign the "user" role to the new user
        $role = Role::findByName('staff');
        $user->assignRole($role);

        return $user;
    }
}
