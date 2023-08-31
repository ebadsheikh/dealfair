<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Role\StoreRoleAction;
use App\Actions\Role\UpdateRoleAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use Exception;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * private variable to StoreRoleAction.
     */
    private StoreRoleAction $storeRoleAction;

    /**
     * private variable to UpdateRoleAction.
     */
    private UpdateRoleAction $updateRoleAction;

    public function __construct(StoreRoleAction $storeRoleAction, UpdateRoleAction $updateRoleAction)
    {
        $this->storeRoleAction = $storeRoleAction;
        $this->updateRoleAction = $updateRoleAction;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index', ['roles' => Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create', ['permissions' => Permission::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        try {
            $this->storeRoleAction->handle($request->all());
            return redirect()->route('admin.roles.index')->withSuccess("role successfully created");
        } catch (Exception $th) {
            return back()->withError($th->getMessage())->withInput();
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
    public function edit(Role $role)
    {
        return view('admin.roles.edit', ['role' => $role, 'rolePermissions' => $role->permissions, 'permissions' => Permission::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        try {
            $this->updateRoleAction->handle($request->all(), $role);

            return redirect()->route('admin.roles.index')->withSuccess("role successfully updated");
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
