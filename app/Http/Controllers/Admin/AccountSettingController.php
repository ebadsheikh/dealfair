<?php

namespace App\Http\Controllers\Admin;

use App\Actions\AccountSetting\UpdatePasswordAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AccountSetting\UpdatePasswordRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AccountSettingController extends Controller
{
    /**
     * private variable to StoreAdminAction.
     */
    private UpdatePasswordAction $updatePasswordAction;

    /**
     * Method __construct
     *
     * @param UpdatePasswordAction $updatePasswordAction
     *
     * @return void
     */
    public function __construct(UpdatePasswordAction $updatePasswordAction)
    {
        $this->updatePasswordAction = $updatePasswordAction;
    }
    /**
     * Display account settings page.
     * @return View
     */
    public function index(): View
    {
        return view('admin.account-setting', ['user' => Auth::user()]);
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
