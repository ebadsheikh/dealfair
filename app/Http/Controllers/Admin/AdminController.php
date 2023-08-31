<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\StoreAdminAction;
use App\Actions\Admin\UpdateAdminAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Request;

class AdminController extends Controller
{
    /**
     * private variable to StoreAdminAction.
     */

    private StoreAdminAction $storeAdminAction;

    /**
     * private variable to UpdateAdminAction.
     */

    private UpdateAdminAction $updateAdminAction;

    /**
     * This is a constructor method.
     *
     * @param StoreAdminAction $storeAdminAction
     */
    public function __construct(
        StoreAdminAction $storeAdminAction,
        UpdateAdminAction $updateAdminAction
    ) {
        $this->storeAdminAction = $storeAdminAction;
        $this->updateAdminAction = $updateAdminAction;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        try {
            $this->storeAdminAction->handle($request->validated());
            return redirect()->route('admin.index')->withMessage('Record Added');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
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
    public function edit(User $user)
    {
        return view('admin.admin.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, User $user)
    {
        try {
            $this->updateAdminAction->handle($request->validated(), $user);

            if (Request::route()->getName('admin.account-settings.index')) {
                return back()->withMessage('Record Updated');
            } else {
                return redirect()->route('admin.index')->withMessage('Record Updated');
            }
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->withMessage('Admin deleted');
    }
}
