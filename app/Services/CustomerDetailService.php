<?php

namespace App\Services;

use App\Models\ListingView;
use App\Models\User;

class CustomerDetailService
{
    public function getUserData(User $user)
    {
        $listingVieweds = ListingView::where('user_id', $user->id)->with('listings')->get();
        //        $userActivities = $user->activities()->orderBy('created_at', 'desc')->get();
        $userProfile = $user->userProfile()->first();
        return [
            'user' => $user,
            'listingVieweds' => $listingVieweds,
//            'userActivities' => $userActivities,
            'userProfile' => $userProfile
        ];
    }
}
