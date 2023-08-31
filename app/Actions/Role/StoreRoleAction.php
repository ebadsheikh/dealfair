<?php

namespace App\Actions\Role;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StoreRoleAction
{
    public function handle(array $data)
    {
        $role = Role::create($data);

        if (array_key_exists('permission_checkbox', $data)) {
            $permissions = Permission::whereIn('id', $data['permission_checkbox'])->get();
            foreach ($permissions as $permission) {
                $role->givePermissionTo($permission);
            }
        }

        return $role;
    }
}
