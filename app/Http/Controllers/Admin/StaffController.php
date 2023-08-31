<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ChangePasswordFromAdmin\ChangePasswordAction;
use App\Actions\ChangeUserRole\ChangeUserRole;
use App\Actions\Staff\StoreStaffAction;
use App\Actions\Staff\UpdateStaffAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePassword\ChangePasswordRequest;
use App\Http\Requests\Admin\Staff\StoreStaffRequest;
use App\Http\Requests\Admin\Staff\UpdateStaffRequest;
use App\Models\User;
use App\Services\StaffDetailService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    /**
     * private variable to StoreStaffAction.
     */

    private StoreStaffAction $storeStaffAction;

    /**
     * private variable to UpdateStaffAction.
     */

    private UpdateStaffAction $updateStaffAction;

    /**
     * private variable to StaffDetailService.
     */

    private StaffDetailService $staffDetailService;

    /**
     * private variable to changePasswordAction.
     */
    private ChangePasswordAction $changePasswordAction;

    /**
     * private variable to ChangeUserRole.
     */
    private ChangeUserRole $changeUserRole;

    /**
     * This is a constructor method.
     *
     * @param StoreStaffAction $storeStaffAction
     * @param UpdateStaffAction $updateStaffAction
     * @param StaffDetailService $staffDetailService
     * @param ChangePasswordAction $changePasswordAction
     * @param ChangeUserRole $changeUserRole
     */
    public function __construct(
        StoreStaffAction $storeStaffAction,
        UpdateStaffAction $updateStaffAction,
        StaffDetailService $staffDetailService,
        ChangeUserRole $changeUserRole,
        ChangePasswordAction $changePasswordAction
    ) {
        $this->storeStaffAction = $storeStaffAction;
        $this->updateStaffAction = $updateStaffAction;
        $this->staffDetailService = $staffDetailService;
        $this->changePasswordAction = $changePasswordAction;
        $this->changeUserRole = $changeUserRole;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffRequest $request)
    {
        try {
            $this->storeStaffAction->handle($request->validated());
            Session::flash('success', 'Customer Stored Successfully');
            return redirect()->route('admin.staff.index')->withMessage('Record Added');
        } catch (Exception $ex) {
            Session::flash('error', $ex->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $userData = $this->staffDetailService->getUserData($user);
        return view('admin.staff.detail', [
            'user' => $user,
            'userData' => $userData
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffRequest $request, User $user)
    {
        try {
            $this->updateStaffAction->handle($request->validated(), $user);
            Session::flash('success', 'Staff Data Updated');
            return back();
        } catch (Exception $ex) {
            Session::flash('error', 'something went wrong!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('success', 'Staff deleted');
        return back();
    }

    /**
     * Update the user's password.
     *
     * @param ChangePasswordRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function updatePassword(ChangePasswordRequest $request, User $user): RedirectResponse
    {
        try {
            $this->changePasswordAction->handle($request->validated(), $user);
            Session::flash('success', 'Password Updated Successfully');
            return back();
        } catch (Exception $th) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    /**
     * Change the role of a user.
     *
     * @param User $user
     * @param Role $role
     * @return RedirectResponse
     */
    public function changeRole(User $user, Role $role)
    {
        try {
            $this->changeUserRole->handle($user, $role);
            Session::flash('success', 'Role Updated Successfully');
            return back();
        } catch (Exception $th) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }
}
