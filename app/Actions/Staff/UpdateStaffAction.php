<?php

namespace App\Actions\Staff;

use App\Actions\User\UpdateUserAction;
use App\Actions\UserProfile\UpdateUserProfileAction;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UpdateStaffAction
{
    /**
     * Declare UpdateUserProfileAction instance
     *@var UpdateUserAction
     */
    private UpdateUserAction $updateUserAction;

    /**
     * Declare UpdateUserProfileAction instance
     *@var UpdateUserProfileAction
     */
    private UpdateUserProfileAction $updateUserProfileAction;

    /**
     * User Registration Constructor
     *
     * @param UpdateUserAction $updateUserAction - The user action
     */
    public function __construct(
        UpdateUserAction $updateUserAction,
        UpdateUserProfileAction $updateUserProfileAction
    ) {
        $this->updateUserAction = $updateUserAction;
        $this->updateUserProfileAction = $updateUserProfileAction;
    }

    /**
     * Handle the incoming request.
     * @param array $data
     * @return User
     */
    public function handle(array $data, User $user): User | RedirectResponse
    {
        $user = $this->updateUserAction->handle($data, $user);
        $this->updateUserProfileAction->handle($data, $user);
        return $user;
    }
}
