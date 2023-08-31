<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RoleAndPermissionController extends Controller
{
    public function index()
    {
        $roles = Role::withCount('permissions')->get();
        return view('admin.roles.index')->with('roles', $roles);
    }


    public function create(): View
    {
        return view('admin.roles.create');
    }


    public function store(StoreRoleRequest $request)
    {
        try {
            Role::create($request->validated());
            Session::flash('success', 'Role Created Successfully');
            return redirect()->route('admin.roles.index');
        } catch (Exception $th) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit')->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        try {
            $role->update($request->validated());
            Session::flash('success', 'Role Updated Successfully');
            return redirect()->route('admin.roles.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            Session::flash('success', 'Role Deleted Successfully');
            return redirect()->route('admin.roles.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }
}
