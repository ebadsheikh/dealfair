<?php

namespace App\Http\Controllers\Api;

use App\Actions\EmailVerification\StoreEmailVerificationCodeAction;
use App\Enums\EmailVerificationEnums;
use App\Enums\HttpStatusCodesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\VerifyEmailRequest;
use App\Http\Requests\Frontend\Auth\ResetPasswordRequest;
use App\Jobs\SendEmailVerificationCodeJob;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordController extends Controller
{
    private StoreEmailVerificationCodeAction $storeEmailVerificationCodeAction;

    public function __construct(
        StoreEmailVerificationCodeAction $storeEmailVerificationCodeAction,
    ) {
        $this->storeEmailVerificationCodeAction = $storeEmailVerificationCodeAction;
    }


    /**
     * Write code on Method
     *
     * @return JsonResponse()
     */
    public function verifyEmail(VerifyEmailRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        $verificationCode = $this->storeEmailVerificationCodeAction->handle($user, EmailVerificationEnums::RESETPASSWORD->value);
        SendEmailVerificationCodeJob::dispatch($user, $verificationCode);

        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'message' => 'Email Send successfully',
        ], HttpStatusCodesEnum::OK);
    }


    /**
       * Write code on Method
       *
       * @return JsonResponse()
       */
    public function resetPassword(ResetPasswordRequest $request)
    {
        $updatePassword = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

        if (!$updatePassword) {
            return response()->json([
                'status' => HttpStatusCodesEnum::INTERNAL_SERVER_ERROR,
                'message' => 'Something Went Wrong',
            ], HttpStatusCodesEnum::INTERNAL_SERVER_ERROR);
        }
        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'message' => 'Password Updated Successfully',
        ], HttpStatusCodesEnum::OK);
    }
}
