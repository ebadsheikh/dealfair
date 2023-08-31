<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CommunityDashboardController extends Controller
{
    public function index(): View
    {
        return view('frontend.panel.dashboards.community');
    }
}
