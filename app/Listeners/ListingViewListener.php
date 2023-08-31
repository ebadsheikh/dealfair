<?php

namespace App\Listeners;

use App\Events\ListingViewEvent;
use App\Helpers\GlobalHelper;
use App\Models\ListingView;
use Carbon\Carbon;
use Jenssegers\Agent\Facades\Agent;

class ListingViewListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ListingViewEvent $listingViewEvent): void
    {
        $customer = GlobalHelper::getCustomer();

        $browser = Agent::browser();
        $browserVersion = Agent::version($browser);
        $requestIp = request()->getClientIp();

        $prepareData = [];
        if ($customer) {
            $prepareData['user_id'] = $customer->id;
        }

        $isListingViewExist = ListingView::orWhere(function ($query) use ($customer, $requestIp, $listingViewEvent) {
            $query->orWhere('user_id', $customer?->id)
                ->orWhere('ip', $requestIp)
                ->orWhere('listing_id', $listingViewEvent->listing->id);
        })->first();

        if ($isListingViewExist) {
            $prepareData['created_at'] = Carbon::now()->addMinutes(rand(5, 40));
        }

        $prepareData['ip'] = $requestIp;
        $prepareData['listing_id'] = $listingViewEvent->listing->id;
        $prepareData['request_from'] = $listingViewEvent->requestFrom;
        $prepareData['browser'] = $browser;
        $prepareData['browser_version'] = $browserVersion;
        $prepareData['platform'] = Agent::platform();
        $prepareData['device_type'] = Agent::deviceType();
        $prepareData['is_robot'] = Agent::isRobot();

        ListingView::create($prepareData);
    }
}
