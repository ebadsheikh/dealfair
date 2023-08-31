<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Requests\Admin\Auth\ResetPasswordRequest;
use App\Http\Requests\Admin\Auth\VerifyEmailRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display login view.
     */
    public function loginView(): View
    {
        return view('admin.auth.login');
    }

    /**
     * Check Login Credentials
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return redirect()->Route('admin.dashboard');
        }
        // Authentication failed...
        return back()->withError('Credentials Failed');
    }

    /**
     * logout the session.
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->Route('login.view');
    }

    /**
     * Display forgot password view.
     */
    public function forgotPasswordView(): View
    {
        return view('admin.auth.forgot-password');
    }

    /**
     * Verify Email to send reset link.
     */
    public function verifyEmail(VerifyEmailRequest $request)
    {
        $status = Password::sendResetLink(
            $request->validated()
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['message' => __($status)])
            : back()->withError($status);
    }

    /**
     * Display Reset View.
     */
    public function resetpasswordView($token = null, $email = null): View
    {
        return view('admin.auth.reset-password', compact('token', 'email'));
    }

    /**
     * Update new password in database.
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login.view')->with(['message' => __($status)])
            : back()->withError($status);
    }

    /**
     * Function to login user from admin side
     */
    public function loginUserasAdmin(int $id)
    {
        $user = User::find($id);

        if ($user) {
            auth()->guard('customer')->login($user);
            return redirect()->route('seller.dashboard');
        }

        // User not found
        return redirect()->back()->with('error', 'User not found.');
    }
}
