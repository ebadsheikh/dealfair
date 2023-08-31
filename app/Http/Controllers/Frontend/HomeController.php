<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\HomePageService;

class HomeController extends Controller
{
    private HomePageService $homePageService;

    public function __construct(HomePageService $homePageService)
    {
        $this->homePageService = $homePageService;
    }

    public function home()
    {
        return view('frontend.home.index', $this->homePageService->getHomePageSectionsQueries());
    }
}
