<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Community\StoreCommunityAction;
use App\Actions\CommunityMember\StoreCommunityMemberAction;
use App\Actions\User\StoreUserAction;
use App\Actions\User\UpdateUserAction;
use App\Actions\UserAddress\StoreUserAddressAction;
use App\Actions\UserProfile\StoreUserProfileAction;
use App\Actions\UserProfile\UpdateUserProfileAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\Country;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::all();

        return view('admin.users.show', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.users.add', ['countries' => Country::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreRequest               $request,
        StoreUserAction            $userAction,
        StoreUserProfileAction     $userProfileAction,
        StoreUserAddressAction     $userAddressAction,
        StoreCommunityAction       $communityAction,
        StoreCommunityMemberAction $communityMemberAction
    ): RedirectResponse {
        try {
            DB::transaction(function () use ($request, $userAction, $userProfileAction, $userAddressAction, $communityAction, $communityMemberAction) {
                $user = $userAction->handle($request->validated());
                $user_profile = $userProfileAction->handle($request->validated(), $user);
                $user_address = $userAddressAction->handle($request->validated(), $user);
                $community = $communityAction->handle($request->validated());
                $community_member = $communityMemberAction->handle(['user_id' => $user->id, 'community_id' => $community->id]);
            });

            return redirect()->Route('admin.users');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $countries = Country::all();

        return view('admin.users.edit', ['user' => $user, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateRequest           $request,
        User                    $user,
        UpdateUserAction        $updateUserAction,
        UpdateUserProfileAction $updateUserProfileAction
    ) {
        try {
            DB::transaction(function () use ($request, $updateUserAction, $updateUserProfileAction, $user) {
                $user = $updateUserAction->handle($request->all(), $user);
                $updateUserProfileAction->handle($request->validated(), $user);
            });

            return redirect()->Route('admin.users');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }

    /**
     * Retrieve users with the role 'Super Admin'
     */
    public function adminUsers()
    {
        $users = User::role('superadmin')->get();

        return view('admin.users.admin', ['users' => $users]);
    }
}
