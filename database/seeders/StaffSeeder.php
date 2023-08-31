<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds for staff users.
     */
    public function run(): void
    {
        // Get all staff from the database
        $staff = User::role(RolesEnum::STAFF->value)->get();

        // Get the 'staff' role from the database
        $role = Role::whereName(RolesEnum::STAFF)->first();

        // Check if the number of staff is less than the staff seeder limit
        if (count($staff) < config('seederlimit.staff_seeder_limit')) {
            // Calculate how many more records need to be inserted
            $times = abs(count($staff) - config('seederlimit.staff_seeder_limit'));

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
