<?php

namespace App\Actions\Customer;

use App\Actions\Community\StoreCommunityAction;
use App\Actions\CommunityMember\StoreCommunityMemberAction;
use App\Actions\User\StoreUserAction;
use App\Actions\UserAddress\StoreUserAddressAction;
use App\Actions\UserProfile\StoreUserProfileAction;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class StoreCustomerAction
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
     * Declare StoreUserAddressAction instance
     *@var StoreUserAddressAction
    */
    private StoreUserAddressAction $storeUserAddressAction;

    /**
     * Declare StoreCommunityAction instance
    *@var StoreCommunityAction
    */
    private StoreCommunityAction $storeCommunityAction;

    /**
     * Declare StoreCommunityMemberAction instance
    *@var StoreCommunityMemberAction
    */
    private StoreCommunityMemberAction $storeCommunityMemberAction;


    /**
     * User Registration Constructor
     *
     * @param StoreUserProfileAction     $storeUserProfileAction - The user profile action.
     * @param StoreUserAddressAction     $storeUserAddressAction - The user address action.
     * @param StoreCommunityAction       $storeCommunityAction   - The community action.
     * @param StoreCommunityMemberAction $storeCommunityMemberAction - The community member action.
     * @param StoreUserAction $storeUserAction - The user action
     */
    public function __construct(
        StoreUserProfileAction     $storeUserProfileAction,
        StoreUserAddressAction     $storeUserAddressAction,
        StoreCommunityAction       $storeCommunityAction,
        StoreCommunityMemberAction $storeCommunityMemberAction,
        StoreUserAction $storeUserAction
    ) {
        $this->storeUserProfileAction = $storeUserProfileAction;
        $this->storeUserAddressAction = $storeUserAddressAction;
        $this->storeCommunityAction = $storeCommunityAction;
        $this->storeCommunityMemberAction = $storeCommunityMemberAction;
        $this->storeUserAction = $storeUserAction;
    }


    /**
     * Handle the incoming request.
     * @param array $data
     * @return User|RedirectResponse
     */
    public function handle(array $data): User|RedirectResponse
    {
        DB::beginTransaction();

        try {
            $user = $this->storeUserAction->handle($data);
            $this->storeUserProfileAction->handle($data, $user);
            $this->storeUserAddressAction->handle($data, $user);
            $community = $this->storeCommunityAction->handle($data);
            $this->storeCommunityMemberAction->handle(['user_id' => $user->id, 'community_id' => $community->id]);

            // Assign the "user" role to the new user
            $role = Role::findByName('customer');
            $user->assignRole($role);

            // Commit the transaction
            DB::commit();

            return $user;
        } catch (Exception $ex) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
            throw new Exception($ex->getMessage());
        }
    }
}
