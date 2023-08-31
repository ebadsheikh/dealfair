<?php

namespace App\Helpers;

class EmailConfigHelper
{
    /**
     *
     * @return array
     */
    public static function getDevelopmentEnvEmailConfigs(): array
    {
        return [
            'DEVELOPMENT_MAIL_MAILER' => GlobalHelper::getSettingValue('development_mail_mailer'),
            'DEVELOPMENT_MAIL_HOST' => GlobalHelper::getSettingValue('development_mail_host'),
            'DEVELOPMENT_MAIL_PORT' => GlobalHelper::getSettingValue('development_mail_port'),
            'DEVELOPMENT_MAIL_ENCRYPTION' => GlobalHelper::getSettingValue('development_mail_encryption'),
            'DEVELOPMENT_MAIL_USERNAME' => GlobalHelper::getSettingValue('development_mail_username'),
            'DEVELOPMENT_MAIL_PASSWORD' => GlobalHelper::getSettingValue('development_mail_password'),
            'DEVELOPMENT_MAIL_FROM_ADDRESS' => GlobalHelper::getSettingValue('development_mail_from_address'),
            'DEVELOPMENT_MAIL_FROM_NAME' => GlobalHelper::getSettingValue('development_mail_from_name'),
        ];
    }

    /**
     * @return array
     */
    public static function getProductionEnvEmailConfigs(): array
    {
        return [
            'MAIL_MAILER' => GlobalHelper::getSettingValue('mail_mailer'),
            'MAIL_HOST' => GlobalHelper::getSettingValue('mail_host'),
            'MAIL_PORT' => GlobalHelper::getSettingValue('mail_port'),
            'MAIL_ENCRYPTION' => GlobalHelper::getSettingValue('mail_encryption'),
            'MAIL_USERNAME' => GlobalHelper::getSettingValue('mail_username'),
            'MAIL_PASSWORD' => GlobalHelper::getSettingValue('mail_password'),
            'MAIL_FROM_ADDRESS' => GlobalHelper::getSettingValue('mail_from_address'),
            'MAIL_FROM_NAME' => GlobalHelper::getSettingValue('mail_from_name'),
        ];
    }

    /**
     * @return array
     */
    public static function getTestEmailReceiver(): array
    {
        return [
            'TEST_EMAIL_RECEIVER' => GlobalHelper::getSettingValue('test_email_receiver')
        ];
    }
}
