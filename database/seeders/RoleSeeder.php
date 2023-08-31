<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (RolesEnum::cases() as $role) {
            Role::firstorCreate(
                ['name' => $role]
            );
        }
    }
}
