<?php

namespace App\Actions\Role;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UpdateRoleAction
{
    public function handle(array $data, Role $role): Role
    {
        $role->update($data);

        if (array_key_exists('permission_checkbox', $data)) {
            $permissions = Permission::whereIn('id', $data['permission_checkbox'])->get();
            $role->syncPermissions($permissions);
        } else {
            $role->syncPermissions();
        }

        return $role;
    }
}
