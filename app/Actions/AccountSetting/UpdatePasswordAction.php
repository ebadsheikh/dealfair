<?php

namespace App\Actions\AccountSetting;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordAction
{
    /**
     * Method handle
     *
     * @param array $data
     *
     * @return RedirectResponse
     */
    public function handle(array $data): RedirectResponse
    {
        $user = Auth::user();

        if (!Hash::check($data['current_password'], $user->password)) {
            return back()->withError('The provided password does not match your current password.');
        }

        $user->update([
            'password' => $data['new_password'],
        ]);

        return back()->withMessage('Your password has been updated!');
    }
}
