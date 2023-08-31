<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class OnBoardingController extends Controller
{
    public function stepOneView(): View
    {
        return view('admin.onboarding.step-one');
    }

    public function stepTwoView(): View
    {
        return view('admin.onboarding.step-two');
    }

    public function stepThreeView(): View
    {
        return view('admin.onboarding.step-three');
    }

    public function stepFourView(): View
    {
        return view('admin.onboarding.step-four');
    }

    public function stepFiveView(): View
    {
        return view('admin.onboarding.step-five');
    }

    public function stepSixView(): View
    {
        return view('admin.onboarding.step-six');
    }
}
