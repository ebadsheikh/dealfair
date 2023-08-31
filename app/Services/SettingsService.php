<?php

namespace App\Services;

use App\Enums\MediaDirectoryNamesEnum;
use App\Enums\SettingTypesEnum;
use App\Helpers\GlobalHelper;
use App\Jobs\SetEnvValuesJob;
use App\Jobs\UploadMediaJob;
use App\Models\Setting;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    /**
     * @throws Exception
     */
    public function updateSettings(array $data): void
    {
        try {
            foreach ($data as $key => $value) {
                if ($value instanceof UploadedFile) {
                    $mediaDTO = MediaService::uploadTempFile($value);
                    UploadMediaJob::dispatch(file: $mediaDTO, directory: MediaDirectoryNamesEnum::SITE_SETTINGS->value, options: ['key' => $key]);
                } else {
                    Setting::updateOrCreate(
                        ['key' => $key],
                        ['value' => $value]
                    );
                }
            }

            Cache::forget('settings');

            $this->setupConfigs();
        } catch (Exception $ex) {
            throw new Exception('Error updating settings: ' . $ex->getMessage());
        }
    }


    public function setupConfigs(): void
    {
        $routesToConfig = [
            'admin.settings.mail' => SettingTypesEnum::MAIL->value,
            'admin.settings.social.auth' => SettingTypesEnum::SOCIALAUTH->value,
            'admin.settings.map' => SettingTypesEnum::GOOGLEADDRESS->value,
            'admin.settings.aws' => SettingTypesEnum::AWS->value,
            'admin.settings.pusher' => SettingTypesEnum::PUSHER->value,
        ];

        foreach ($routesToConfig as $routeName => $envName) {
            if (GlobalHelper::wasPreviousRoute($routeName)) {
                SetEnvValuesJob::dispatch($envName);
            }
        }
    }
}
