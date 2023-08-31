<?php

namespace App\Jobs;

use App\Enums\SettingTypesEnum;
use App\Helpers\AwsConfigHelper;
use App\Helpers\EmailConfigHelper;
use App\Helpers\GlobalHelper;
use App\Helpers\GoogleMapApiHelper;
use App\Helpers\PusherConfigHelper;
use App\Helpers\SocialAuthConfigHelper;
use Brotzka\DotenvEditor\Exceptions\DotEnvException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SetEnvValuesJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private string $type;

    /**
     * Create a new job instance.
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * Execute the job.
     * @throws DotEnvException
     */
    public function handle(): void
    {
        $configs = match ($this->type) {
            SettingTypesEnum::MAIL->value => [
                EmailConfigHelper::getDevelopmentEnvEmailConfigs(),
                EmailConfigHelper::getProductionEnvEmailConfigs(),
                EmailConfigHelper::getTestEmailReceiver(),
            ],
            SettingTypesEnum::SOCIALAUTH->value => [
                SocialAuthConfigHelper::getFacebookEnvConfigs(),
                SocialAuthConfigHelper::getGoogleEnvConfigs(),
                SocialAuthConfigHelper::getAppleEnvConfigs(),
            ],
            SettingTypesEnum::GOOGLEADDRESS->value => [
                GoogleMapApiHelper::getMapEnvApiConfigs(),
            ],
            SettingTypesEnum::AWS->value => [
                AwsConfigHelper::getProductionEnvAwsConfigs(),
                AwsConfigHelper::getDevelopmentEnvAwsConfigs(),
            ],
            SettingTypesEnum::PUSHER->value => [
                PusherConfigHelper::getEnvProductionPusherConfigs(),
                PusherConfigHelper::getEnvDevelopmentPusherConfigs(),
            ],

            default => [],
        };

        $this->setConfigsInEnv($configs);

        GlobalHelper::optimizeClear();
        GlobalHelper::configCache();
    }

    /**
     * @throws DotEnvException
     */
    private function setConfigsInEnv(array $configs): void
    {
        foreach ($configs as $config) {
            GlobalHelper::setValuesInEnv($config);
        }
    }
}
