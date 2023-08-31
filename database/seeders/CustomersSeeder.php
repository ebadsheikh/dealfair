<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\UserProfile;
use App\Enums\RolesEnum;
use App\Models\User;

class CustomersSeeder extends Seeder
{
    /**
     * Run the customer database seeders.
     * This method generates new customer records, assigns the 'customer' role to the users,
     * and creates a user profile.
     * @return void
     */
    public function run(): void
    {
        $realEmails = ['mwaqasiu@gmail.com'];

        // Get all customers from the database
        $customers = User::role(RolesEnum::CUSTOMER->value)->get();

        // Get the 'customer' role from the database
        $role = Role::whereName(RolesEnum::CUSTOMER)->first();

        // Check if the number of customers is less than the customer seeder limit
        if (count($customers) < config('seederlimit.customer_seeder_limit')) {
            // Calculate how many more records need to be inserted
            $times = abs(count($customers) - config('seederlimit.customer_seeder_limit'));

            // Generate new user records
            User::factory()->times($times)->create()->each(function ($user) use ($role) {
                $this->profileCreation($user, $role);
            });

            foreach ($realEmails as $realEmail) {
                $user = User::factory()->create(['email' => $realEmail]);
                $this->profileCreation($user, $role);
            }
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
