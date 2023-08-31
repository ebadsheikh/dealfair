<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OnBoardingController extends Controller
{
    public function onBoardingView(): View|RedirectResponse
    {
        $step = GlobalHelper::getUser()?->userProfile?->onboarding_step ?? 1;
        if ($step >= 4) {
            return redirect()->route(GlobalHelper::getPreviousRouteName());
        }
        $preparedStep = $step + ($step === 1 ? 0 : 1);
        return view('frontend.onboarding.index')->with('step', $preparedStep);
    }
}
