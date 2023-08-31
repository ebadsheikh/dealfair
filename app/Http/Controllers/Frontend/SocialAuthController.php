<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\RolesEnum;
use App\Enums\SignUpTypesEnum;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Models\SocialAuth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();
        $user = User::firstOrNew(['email' => $userSocial->getEmail()]);
        $socialAuth = $user->socialAuth ?: new SocialAuth();

        $signUpType = ($provider == SignUpTypesEnum::GOOGLE->value) ? SignUpTypesEnum::GOOGLE->value : (($provider == SignUpTypesEnum::FACEBOOK->value) ? SignUpTypesEnum::FACEBOOK->value : null);

        $socialAuth->fill([
            'provider_id' => $userSocial->getId(),
            'type' => $provider
        ]);

        if (!$user->exists) {
            // Get the 'customer' role from the database
            $role = Role::whereName(RolesEnum::CUSTOMER)->first();

            // Extract first name and last name from the name field
            $nameParts = explode(' ', $userSocial->getName());
            $firstName = $nameParts[0] ?? '';
            $lastName = $nameParts[1] ?? '';

            $user->fill([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email_verified_at' => now(),
                'signup_type' => $signUpType
            ])->save();

            $user->assignRole($role);
        }

        $user->socialAuth()->save($socialAuth);

        Auth::login($user, true);
        GlobalHelper::forgetUserCache($user->id);
        $redirectTo = session('intendedRoute');
        session()->forget('intendedRoute');
        return $redirectTo ? redirect($redirectTo) : redirect()->route('home');
    }
}
