<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\StoreUpdateSettingRequest;
use App\Models\Setting;
use App\Services\SettingsService;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;

class SettingsController extends Controller
{
    private SettingsService $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }

    public function socialLinksView(): View
    {
        return view('admin.settings.social-links');
    }

    public function generalView(): View
    {
        return view('admin.settings.general');
    }

    public function logoView(): View
    {
        return view('admin.settings.logos');
    }

    public function mailView(): View
    {
        return view('admin.settings.mail');
    }

    public function awsView(): View
    {
        return view('admin.settings.aws');
    }

    public function pusherView(): View
    {
        return view('admin.settings.pusher');
    }

    public function auctionView(): View
    {
        return view('admin.settings.auction');
    }

    public function listingPageView(): View
    {
        return view('admin.settings.listing');
    }

    public function mapView(): View
    {
        return view('admin.settings.map');
    }

    public function socialAuthView(): View
    {
        return view('admin.settings.social-auth');
    }

    public function maintenanceModeView(): View
    {
        return view('admin.settings.maintenance-mode');
    }

    public function feesView(): View
    {
        return view('admin.settings.fees');
    }

    public function walletView(): View
    {
        return view('admin.settings.wallet');
    }

    public function mediaView(): View
    {
        return view('admin.settings.media');
    }

    public function storeUpdate(StoreUpdateSettingRequest $request)
    {
        try {
            $data = $request->validated();
            $this->settingsService->updateSettings($data);
            return back()->withSuccess('Settings successfully updated');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    public function enableMaintenanceMode(StoreUpdateSettingRequest $request)
    {
        try {
            $data = $request->validated();
            Setting::updateOrCreate(
                ['key' => 'enable_maintenance_mode'],
                ['value' => $data['enable_maintenance_mode']]
            );
            if ($data['enable_maintenance_mode']) {
                Artisan::call('down');
                $successMessage = 'Site is in maintenance mode';
            } else {
                Artisan::call('up');
                $successMessage = 'Site is in live mode';
            }
            return back()->withSuccess($successMessage);
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }
}
