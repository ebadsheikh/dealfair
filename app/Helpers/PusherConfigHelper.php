<?php

namespace App\Helpers;

class PusherConfigHelper
{
    /**
     * @return array
     */
    public static function getEnvProductionPusherConfigs(): array
    {
        return [
            'PUSHER_APP_ID' => GlobalHelper::getSettingValue('pusher_app_id'),
            'PUSHER_APP_KEY' => GlobalHelper::getSettingValue('pusher_app_key'),
            'PUSHER_APP_SECRET' => GlobalHelper::getSettingValue('pusher_app_secret'),
            'PUSHER_PORT' => GlobalHelper::getSettingValue('pusher_port'),
            'PUSHER_SCHEME' => GlobalHelper::getSettingValue('pusher_scheme'),
            'PUSHER_APP_CLUSTER' => GlobalHelper::getSettingValue('pusher_app_cluster'),
        ];
    }

    /**
     * @return array
     */
    public static function getEnvDevelopmentPusherConfigs(): array
    {
        return [
            'DEVELOPMENT_PUSHER_APP_ID' => GlobalHelper::getSettingValue('development_pusher_app_id'),
            'DEVELOPMENT_PUSHER_APP_KEY' => GlobalHelper::getSettingValue('development_pusher_app_key'),
            'DEVELOPMENT_PUSHER_APP_SECRET' => GlobalHelper::getSettingValue('development_pusher_app_secret'),
            'DEVELOPMENT_PUSHER_PORT' => GlobalHelper::getSettingValue('development_pusher_port'),
            'DEVELOPMENT_PUSHER_SCHEME' => GlobalHelper::getSettingValue('development_pusher_scheme'),
            'DEVELOPMENT_PUSHER_APP_CLUSTER' => GlobalHelper::getSettingValue('development_pusher_app_cluster'),
        ];
    }
}
