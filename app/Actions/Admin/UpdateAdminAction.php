<?php

namespace App\Actions\Admin;

use App\Actions\User\UpdateUserAction;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UpdateAdminAction
{
    /**
     * Declare UpdateUserProfileAction instance
     *@var UpdateUserAction
     */
    private UpdateUserAction $updateUserAction;

    /**
     * User Registration Constructor
     *
     * @param UpdateUserAction $updateUserAction - The user action
     */
    public function __construct(
        UpdateUserAction $updateUserAction
    ) {
        $this->updateUserAction = $updateUserAction;
    }

    /**
     * Handle the incoming request.
     * @param array $data
     * @return User
     */
    public function handle(array $data, User $user): User | RedirectResponse
    {
        $user = $this->updateUserAction->handle($data, $user);
        return $user;
    }
}
