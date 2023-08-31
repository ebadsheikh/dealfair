<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds for superadmin users.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'king@dealfair.app'],
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'king@dealfair.app',
                'password' => 'password',
            ]
        );

        // Get the role for superadmin
        $role = Role::whereName(RolesEnum::SUPERADMIN)->first();

        $this->profileCreation($user, $role);
    }

    public function profileCreation(User $user, Role $role)
    {
        // Assign the 'customer' role to the user
        $user->assignRole($role);

        // Create a user profile for the user
        $user->userProfile()->save(UserProfile::factory()->make());
    }
}
