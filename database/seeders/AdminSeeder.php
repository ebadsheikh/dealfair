<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds for admin users.
     */
    public function run(): void
    {
        // Get all admins from the database
        $staff = User::role(RolesEnum::ADMIN->value)->get();

        // Get the 'admin' role from the database
        $role = Role::whereName(RolesEnum::ADMIN)->first();

        // Check if the number of admin is less than the admin seeder limit
        if (count($staff) < config('seederlimit.admin_seeder_limit')) {
            // Calculate how many more records need to be inserted
            $times = abs(count($staff) - config('seederlimit.admin_seeder_limit'));

            // Generate new user records
            User::factory()->times($times)->create()->each(function ($user) use ($role) {
                $this->profileCreation($user, $role);
            });
        }
    }

    public function profileCreation(User $user, Role $role)
    {
        // Assign the 'customer' role to the user
        $user->assignRole($role);

        // Create a user profile for the user
        $user->userProfile()->save(UserProfile::factory()->make());
    }
}
