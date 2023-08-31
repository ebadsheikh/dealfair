<?php

namespace App\Http\Controllers\Api;

use App\Enums\HttpStatusCodesEnum;
use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    public function getUserProfile()
    {
        $user = Auth::user();
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        return response()->json([
            'status' => HttpStatusCodesEnum::OK,
            'profile' =>$userProfile,
            'user' => $user,
        ]);
    }
}
