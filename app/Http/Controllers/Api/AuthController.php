<?php

namespace App\Http\Controllers\Api;

use App\Actions\EmailVerification\StoreEmailVerificationCodeAction;
use App\Actions\EmailVerification\VerifyEmailVerificationCodeAction;
use App\Actions\User\StoreUserAction;
use App\Enums\EmailVerificationEnums;
use App\Enums\HttpStatusCodesEnum;
use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\SignUpRequest;
use App\Http\Requests\Api\Auth\VerifyCodeRequest;
use App\Http\Requests\Frontend\Auth\SignInRequest;
use App\Jobs\SendEmailVerificationCodeJob;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    private StoreUserAction $storeUserAction;
    private StoreEmailVerificationCodeAction $storeEmailVerificationCodeAction;
    private VerifyEmailVerificationCodeAction $verifyEmailVerificationCodeAction;

    public function __construct(
        StoreUserAction $storeUserAction,
        StoreEmailVerificationCodeAction $storeEmailVerificationCodeAction,
        VerifyEmailVerificationCodeAction $verifyEmailVerificationCodeAction
    ) {
        $this->storeUserAction = $storeUserAction;
        $this->storeEmailVerificationCodeAction = $storeEmailVerificationCodeAction;
        $this->verifyEmailVerificationCodeAction = $verifyEmailVerificationCodeAction;
    }



    public function register(SignUpRequest $request)
    {
        $user = $this->storeUserAction->handle($request->validated());
        $verificationCode = $this->storeEmailVerificationCodeAction->handle($user, EmailVerificationEnums::EMAILVERIFICATION->value);
        SendEmailVerificationCodeJob::dispatch($user, $verificationCode);
        // Get the 'customer' role from the database
        $role = Role::whereName(RolesEnum::CUSTOMER)->first();
        $user->assignRole($role);
        Auth::login($user, true);

        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'message' => 'User Created',
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken,
        ], HttpStatusCodesEnum::OK);
    }

    /**
     * @throws VerificationCodeDidNotExistException
     * @throws VerificationCodeIncorrectException
     * @throws VerificationCodeExpiresException
     */
    public function verifyCode(VerifyCodeRequest $request)
    {
        $verify = $this->verifyEmailVerificationCodeAction->handle($request->validated());
        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'message' => 'Verified',
            'isVerified' => true
        ], HttpStatusCodesEnum::OK);
    }

    public function login(SignInRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return response()->json([
                'status' => HttpStatusCodesEnum::UNAUTHORIZED,
                'message' => 'Credentials not match',
            ], HttpStatusCodesEnum::UNAUTHORIZED);
        }

        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'message' => 'Successfully Logged In',
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('API Token')->plainTextToken,
        ], HttpStatusCodesEnum::OK);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Tokens Revoked! Logout Successfully',
        ]);
    }
}
