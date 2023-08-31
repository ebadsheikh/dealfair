<?php

namespace App\Http\Livewire\Admin\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionList extends Component
{
    public Role $role;

    public array $permissions;

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->permissions = $this->fetchPermissions();
    }

    public function allow($permissionId)
    {
        $permission = Permission::find($permissionId);
        if ($permission) {
            $this->role->givePermissionTo($permission);
            $this->permissions = $this->fetchPermissions(); // Refresh permissions
        }
    }

    public function remove($permissionId)
    {
        $permission = Permission::find($permissionId);
        if ($permission) {
            $this->role->revokePermissionTo($permission);
            $this->permissions = $this->fetchPermissions(); // Refresh permissions
        }
    }

    public function toggleGroupPermissions($groupName)
    {
        $groupPermissions = Permission::where('group_name', $groupName)->get();
        $groupPermissionIds = $groupPermissions->pluck('id')->toArray();

        $hasAllPermissions = $this->role->hasAllPermissions($groupPermissionIds);

        if ($hasAllPermissions) {
            $this->role->revokePermissionTo($groupPermissions);
        } else {
            $this->role->givePermissionTo($groupPermissions);
        }

        $this->permissions = $this->fetchPermissions(); // Refresh permissions
    }

    public function togglePermission($permissionId)
    {
        $permission = Permission::find($permissionId);
        if ($permission) {
            if ($this->role->hasPermissionTo($permission)) {
                $this->remove($permissionId);
            } else {
                $this->allow($permissionId);
            }
        }
    }

    public function fetchPermissions(): array
    {
        $rolePermissions = $this->role->permissions->pluck('name')->toArray();

        $permissions = Permission::all()
            ->groupBy('group_name')
            ->map(function ($groupPermissions, $groupName) use ($rolePermissions) {
                $selectAll = collect($groupPermissions->pluck('name')->toArray())->diff($rolePermissions)->isEmpty();

                return [
                    'groupName' => $groupName,
                    'selectAll' => $selectAll,
                    'permissions' => $groupPermissions->map(function ($permission) use ($rolePermissions) {
                        return [
                            'id' => $permission->id,
                            'name' => $permission->name,
                            'hasPermission' => in_array($permission->name, $rolePermissions),
                        ];
                    })->all(),
                ];
            })
            ->values()
            ->all();

        return $permissions;
    }

    public function render()
    {
        return view('livewire.admin.permission.permission-list')->with('permissions', $this->permissions);
    }
}
