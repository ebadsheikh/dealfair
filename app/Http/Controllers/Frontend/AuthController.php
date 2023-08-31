<?php

namespace App\Http\Controllers\Frontend;

use App\Actions\EmailVerification\StoreEmailVerificationCodeAction;
use App\Actions\EmailVerification\VerifyEmailVerificationCodeAction;
use App\Actions\ResetPassword\StoreResetPasswordTokenAction;
use App\Actions\User\StoreUserAction;
use App\Enums\EmailVerificationEnums;
use App\Enums\RolesEnum;
use App\Exceptions\EmailVerification\VerificationCodeDidNotExistException;
use App\Exceptions\EmailVerification\VerificationCodeExpiresException;
use App\Exceptions\EmailVerification\VerificationCodeIncorrectException;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\ResetPasswordRequest;
use App\Http\Requests\Frontend\Auth\SignInRequest;
use App\Http\Requests\Frontend\Auth\SignUpRequest;
use App\Http\Requests\Frontend\Auth\VerifyEmailRequest;
use App\Http\Requests\Frontend\Auth\VerifyEmailVerificationCodeRequest;
use App\Jobs\SendEmailVerificationCodeJob;
use App\Models\PasswordReset;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    private StoreUserAction $storeUserAction;
    private StoreEmailVerificationCodeAction $storeEmailVerificationCodeAction;
    private VerifyEmailVerificationCodeAction $verifyEmailVerificationCodeAction;
    private StoreResetPasswordTokenAction $storeResetPasswordTokenAction;

    public function __construct(
        StoreUserAction                   $storeUserAction,
        StoreEmailVerificationCodeAction  $storeEmailVerificationCodeAction,
        VerifyEmailVerificationCodeAction $verifyEmailVerificationCodeAction,
        StoreResetPasswordTokenAction     $storeResetPasswordTokenAction
    ) {
        $this->storeUserAction = $storeUserAction;
        $this->storeEmailVerificationCodeAction = $storeEmailVerificationCodeAction;
        $this->verifyEmailVerificationCodeAction = $verifyEmailVerificationCodeAction;
        $this->storeResetPasswordTokenAction = $storeResetPasswordTokenAction;
    }

    public function signInView(): View
    {

        if (!session()->has('intendedRoute')) {
            session(['intendedRoute' => GlobalHelper::getPreviousRouteName() != 'auth.logout' ? url()->previous() : '']);
        }
        return view('frontend.auth.sign-in');
    }

    public function signIn(SignInRequest $request): RedirectResponse
    {
        try {
            $authenticated = Auth::attempt($request->validated());

            if (!$authenticated) {
                return back()->withError('Email or password is incorrect');
            }

            $user = Auth::user();

            if ($user->hasRole(RolesEnum::CUSTOMER->value)) {
                GlobalHelper::forgetUserCache($user->id);
                $redirectTo = session('intendedRoute');
                session()->forget('intendedRoute');
                return $redirectTo ? redirect($redirectTo) : redirect()->route('home');
            }

            return back()->withError('You are not authorized to access this page');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    public function signUpView(): View
    {
        return view('frontend.auth.sign-up');
    }

    public function signUp(SignUpRequest $request): RedirectResponse
    {
        try {
            $user = $this->storeUserAction->handle($request->validated());
            $verificationCode = $this->storeEmailVerificationCodeAction->handle($user, EmailVerificationEnums::EMAILVERIFICATION->value);
            SendEmailVerificationCodeJob::dispatch($user, $verificationCode);
            // Get the 'customer' role from the database
            $role = Role::whereName(RolesEnum::CUSTOMER)->first();
            $user->assignRole($role);
            Auth::login($user, true);
            GlobalHelper::forgetUserCache($user->id);
            return redirect()->route('auth.email.verification');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    public function emailVerificationView(): View
    {
        return view('frontend.auth.email-verification');
    }

    /**
     * @throws VerificationCodeDidNotExistException
     * @throws VerificationCodeIncorrectException
     * @throws VerificationCodeExpiresException
     */
    public function verifyEmailVerificationCode(VerifyEmailVerificationCodeRequest $request): RedirectResponse
    {
        $this->verifyEmailVerificationCodeAction->handle($request->validated());
        return redirect()->route('onboarding.index');
    }

    public function forgotPasswordView(): View
    {
        return view('frontend.auth.forgot-password');
    }

    /**
     * @throws Exception
     */
    public function verifyEmail(VerifyEmailRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        $this->storeResetPasswordTokenAction->handle($user);

        return back()->withSuccess('We have e-mailed your password reset link!');
    }


    public function resetPasswordView($token, $email): View
    {
        return view('frontend.auth.reset-password', ['token' => $token, 'email' => $email]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $updatePassword = PasswordReset::where([
            'email' => $request->email,
            'token' => $request->token
        ])
            ->first();

        if (!$updatePassword) {
            return back()->withError('Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        PasswordReset::where(['email' => $request->email])->delete();

        return redirect()->Route('auth.signin')->withMessage('Your password has been changed!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
