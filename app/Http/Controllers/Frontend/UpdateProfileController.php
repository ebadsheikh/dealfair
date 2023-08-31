<?php

namespace App\Http\Controllers\Frontend;

use App\Actions\Customer\UpdatePrivacySettingAction;
use App\Actions\Frontend\Customer\UpdateCustomerAction;
use App\Actions\Frontend\Customer\UpdatePasswordAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Customer\UpdateCustomerRequest;
use App\Http\Requests\Frontend\Customer\UpdatePasswordRequest;
use App\Http\Requests\Frontend\Customer\UpdatePrivacySettingRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Exception;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    /**
     * private variable to UpdateCustomerAction.
     */
    private UpdateCustomerAction $updateCustomerAction;

    /**
     * private variable to StoreAdminAction.
     */
    private UpdatePasswordAction $updatePasswordAction;

    /**
     * private variable to UpdateCustomerAction.
     */
    private UpdatePrivacySettingAction $updatePrivacySettingAction;

    /**
     * This is a constructor method.
     *
     * @param UpdateCustomerAction $updateCustomerAction
     * @param UpdatePasswordAction $updatePasswordAction
     * @param UpdatePrivacySettingAction $updatePrivacySettingAction
     */
    public function __construct(
        UpdateCustomerAction $updateCustomerAction,
        UpdatePasswordAction $updatePasswordAction,
        UpdatePrivacySettingAction $updatePrivacySettingAction
    ) {
        $this->updateCustomerAction = $updateCustomerAction;
        $this->updatePasswordAction = $updatePasswordAction;
        $this->updatePrivacySettingAction = $updatePrivacySettingAction;
    }


    public function index()
    {
        $user = Auth::user();
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        return view('frontend.user-panel.update-profile.update-profile', ['user' => $user , 'userProfile' => $userProfile]);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateCustomerRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function updateProfile(UpdateCustomerRequest $request, User $user): RedirectResponse
    {
        try {
            $this->updateCustomerAction->handle($request->validated(), $user);
            return redirect()->route('profile.index')->with('message', 'Profile updated successfully!');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Display account settings page.
     * @param UpdatePasswordRequest $request
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        try {
            $this->updatePasswordAction->handle($request->validated());
            return back();
        } catch (Exception $th) {
            return back()->withError($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     * @param UpdatePrivacySettingRequest $request
     * @param UserProfile $userProfile
     * @return RedirectResponse
     */
    public function updatePrivacySetting(UpdatePrivacySettingRequest $request, UserProfile $userProfile): RedirectResponse
    {
        try {
            $this->updatePrivacySettingAction->handle($request->validated(), $userProfile);
            return redirect()->route('profile.index')->with('message', 'Privacy setting updated successfully!');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }
}
