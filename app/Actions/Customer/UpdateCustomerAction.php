<?php

namespace App\Actions\Customer;

use App\Actions\User\UpdateUserAction;
use App\Actions\UserProfile\UpdateUserProfileAction;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class UpdateCustomerAction
{
    /**
     * Declare UpdateUserProfileAction instance
     *@var UpdateUserProfileAction
     */
    private UpdateUserProfileAction $updateUserProfileAction;

    /**
     * Declare UpdateUserProfileAction instance
     *@var UpdateUserAction
     */
    private UpdateUserAction $updateUserAction;

    /**
     * User Registration Constructor
     *
     * @param UpdateUserProfileAction     $updateUserProfileAction - The user profile action.
     * @param UpdateUserAction     $updateUserAction - The user profile action.
     */
    public function __construct(
        UpdateUserProfileAction $updateUserProfileAction,
        UpdateUserAction $updateUserAction,
    ) {
        $this->updateUserProfileAction = $updateUserProfileAction;
        $this->updateUserAction = $updateUserAction;
    }

    /**
     * Handle the incoming request.
     * @param array $data
     * @return User
     */
    public function handle(array $data, User $user): User|RedirectResponse
    {
        DB::beginTransaction();

        try {
            $user = $this->updateUserAction->handle($data, $user);
            $this->updateUserProfileAction->handle($data, $user);
            // Commit the transaction
            DB::commit();

            return $user;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw $ex;
        }
    }
}
