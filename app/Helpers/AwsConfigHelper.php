<?php

namespace App\Helpers;

class AwsConfigHelper
{
    /**
     * @return array
     */
    public static function getProductionEnvAwsConfigs(): array
    {
        return [
            'AWS_ACCESS_KEY_ID' => GlobalHelper::getSettingValue('aws_access_key_id'),
            'AWS_SECRET_ACCESS_KEY' => GlobalHelper::getSettingValue('aws_secret_access_key'),
            'AWS_DEFAULT_REGION' => GlobalHelper::getSettingValue('aws_default_region'),
            'AWS_BUCKET' => GlobalHelper::getSettingValue('aws_bucket'),
            'AWS_USE_PATH_STYLE_ENDPOINT' => GlobalHelper::getSettingValue('aws_use_path_style_endpoint'),
        ];
    }
    /**
     *
     * @return array
     */
    public static function getDevelopmentEnvAwsConfigs(): array
    {
        return [
            'DEVELOPMENT_AWS_ACCESS_KEY_ID' => GlobalHelper::getSettingValue('development_aws_access_key_id'),
            'DEVELOPMENT_AWS_SECRET_ACCESS_KEY' => GlobalHelper::getSettingValue('development_aws_secret_access_key'),
            'DEVELOPMENT_AWS_DEFAULT_REGION' => GlobalHelper::getSettingValue('development_aws_default_region'),
            'DEVELOPMENT_AWS_BUCKET' => GlobalHelper::getSettingValue('development_aws_bucket'),
            'DEVELOPMENT_AWS_USE_PATH_STYLE_ENDPOINT' => GlobalHelper::getSettingValue('development_aws_use_path_style_endpoint'),
        ];
    }
}
