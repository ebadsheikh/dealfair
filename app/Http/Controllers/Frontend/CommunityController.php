<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\View\View;

class CommunityController extends Controller
{
    public function index(): View
    {
        return view('frontend.communities.index');
    }

    public function communityDetails(Community $community): View
    {
        return view('frontend.communities.community-details')
            ->with('community', $community);
    }
}
