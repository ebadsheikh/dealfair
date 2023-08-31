<?php

namespace App\Helpers;

class SocialAuthConfigHelper
{
    public static function getFacebookEnvConfigs(): array
    {
        return [
            'ENABLE_FACEBOOK_LOGIN' => GlobalHelper::getSettingValue('enable_facebook_login') ? 'true' : 'false',
            'FACEBOOK_APP_ID' => GlobalHelper::getSettingValue('facebook_app_id'),
            'FACEBOOK_APP_SECRET' => GlobalHelper::getSettingValue('facebook_app_secret'),
            'FACEBOOK_APP_REDIRECT' => route('social.auth.signin.callback', 'facebook'),
        ];
    }

    public static function getGoogleEnvConfigs(): array
    {
        return [
            'ENABLE_GOOGLE_LOGIN' => GlobalHelper::getSettingValue('enable_google_login') ? 'true' : 'false',
            'GOOGLE_APP_ID' => GlobalHelper::getSettingValue('google_app_id'),
            'GOOGLE_APP_SECRET' => GlobalHelper::getSettingValue('google_app_secret'),
            'GOOGLE_APP_REDIRECT' => route('social.auth.signin.callback', 'google')
        ];
    }

    public static function getAppleEnvConfigs(): array
    {
        return [
            'ENABLE_APPLE_LOGIN' => GlobalHelper::getSettingValue('enable_apple_login') ? 'true' : 'false',
            'APPLE_APP_ID' => GlobalHelper::getSettingValue('apple_app_id'),
            'APPLE_APP_SECRET' => GlobalHelper::getSettingValue('apple_app_secret'),
            'APPLE_APP_REDIRECT' => route('social.auth.signin.callback', 'apple')
        ];
    }
}
