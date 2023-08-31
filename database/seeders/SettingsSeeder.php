<?php

namespace Database\Seeders;

use App\Services\SettingsService;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws Exception
     */
    public function run(): void
    {
        $finalPreparedData = Arr::collapse([
            $this->preparedEmailConfigData(),
            $this->prepareListingPageSettingData(),
            $this->prepareStepOneOnBoardingData(),
            $this->prepareStepTwoOnBoardingData(),
            $this->prepareStepThreeOnBoardingData(),
            $this->prepareStepFourOnBoardingData(),
            $this->prepareStepFiveOnBoardingData(),
            $this->prepareStepSixOnBoardingData(),
            $this->prepareSocialAuthData(),
            $this->prepareFeesSettings(),
            $this->preparePusherSettingsData(),
            $this->prepareMediaSettingData(),
            $this->prepareProductSettingData(),
            $this->prepareGeneralSettingData(),
            $this->prepareAwsSettingsData(),
            $this->prepareMapSettingsData(),
            $this->prepareLogoSettingsData()
        ]);

        (new SettingsService())->updateSettings($finalPreparedData);
    }

    public function preparedEmailConfigData(): array
    {
        return [
            'development_mail_mailer' => 'smtp',
            'development_mail_host' => 'smtp.gmail.com',
            'development_mail_port' => 587,
            'development_mail_encryption' => 'tls',
            'development_mail_username' => 'mwaqasiu@gmail.com',
            'development_mail_password' => 'shbcuzlbmplgfvml',
            'development_mail_from_address' => 'mwaqasiu@gmail.com',
            'development_mail_from_name' => 'Dealfair',
            'mail_mailer' => 'smtp',
            'mail_host' => 'smtp.gmail.com',
            'mail_port' => 587,
            'mail_encryption' => 'tls',
            'mail_username' => 'mwaqasiu@gmail.com',
            'mail_password' => 'shbcuzlbmplgfvml',
            'mail_from_address' => 'mwaqasiu@gmail.com',
            'mail_from_name' => 'Dealfair',
            'test_email_receiver' => 'randall.compton@gmail.com',
        ];
    }

    public function prepareListingPageSettingData(): array
    {
        return [
            'listing_image_dropzone_description' => 'Upload Image',
            'listing_video_dropzone_description' => 'Upload Video',
        ];
    }

    public function prepareStepOneOnBoardingData(): array
    {
        return [
            'step_one_left_side_title' => 'Introduction',
            'step_one_left_side_subtitle' => 'Watch video about dealfair',
            'step_one_form_title' => 'Welcome to Dealfair',
            'step_one_form_subtitle' => 'Thank you for joining Dealfair family.Enjoy and we wish you great success!',
            'step_one_welcome_video' => 'https://s3.us-east-2.amazonaws.com/dealfair.app/default_site_settings/pfbQuqPBfS5iwxCRM17apQWIRZxSK33MEbJVfdiE.mp4',
        ];
    }

    public function prepareStepTwoOnBoardingData(): array
    {
        return [
            'step_two_left_side_title' => 'Account Info',
            'step_two_left_side_subtitle' => 'Setup your account settings',
            'step_two_form_title' => 'Account Info',
            'step_two_form_subtitle' => 'Please fill out the below fields.',
        ];
    }

    public function prepareStepThreeOnBoardingData(): array
    {
        return [
            'step_three_left_side_title' => 'Create Community',
            'step_three_left_side_subtitle' => 'Setup community details',
            'step_three_form_title' => 'Create Community',
            'step_three_form_subtitle' => 'Create your own community to get better results.',
        ];
    }

    public function prepareStepFourOnBoardingData(): array
    {
        return [
            'step_four_left_side_title' => 'Verification Badge',
            'step_four_left_side_subtitle' => 'Get your verification badge',
            'step_four_form_title' => 'Verification Badge',
            'step_four_form_subtitle' => 'By submitting below documents you can get verification badge.',
        ];
    }

    public function prepareStepFiveOnBoardingData(): array
    {
        return [
            'step_five_left_side_title' => 'Join Communtities',
            'step_five_left_side_subtitle' => 'Create your circle',
            'step_five_form_title' => 'Join Communtities',
            'step_five_form_subtitle' => 'Join communities to grow your network.',
        ];
    }

    public function prepareStepSixOnBoardingData(): array
    {
        return [
            'step_six_left_side_title' => 'More Info',
            'step_six_left_side_subtitle' => 'Know about buying and selling',
            'step_six_form_title' => 'Info about platform',
            'step_six_form_subtitle' => 'Watch how you can sell and buy on dealfair',
            'step_six_seller_video' => 'https://s3.us-east-2.amazonaws.com/dealfair.app/default_site_settings/pfbQuqPBfS5iwxCRM17apQWIRZxSK33MEbJVfdiE.mp4',
            'step_six_buyer_video' => 'https://s3.us-east-2.amazonaws.com/dealfair.app/default_site_settings/h6zhIItKqFixtmJKCrtD7YVP3F690lKbkYkpkaIi.mp4',
        ];
    }

    public function prepareSocialAuthData(): array
    {
        return [
            'enable_facebook_login' => true,
            'facebook_app_id' => '2025760810959200',
            'facebook_app_secret' => '53bdd0b26e6b311d38ae04893f13bf03',
            'facebook_app_redirect' => route('social.auth.signin.callback', 'facebook'),
            'enable_google_login' => true,
            'google_app_id' => '773006605602-q37jqhiu2dtlbqcmck59f23tvjd0ogja.apps.googleusercontent.com',
            'google_app_secret' => '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',
            'google_app_redirect' => route('social.auth.signin.callback', 'google'),
            'enable_apple_login' => false,
            'apple_app_id' => '',
            'apple_app_secret' => '',
            'apple_app_redirect' => route('social.auth.signin.callback', 'apple'),
        ];
    }

    public function prepareFeesSettings(): array
    {
        return [
            'community_admin_commission' => 2,
            'selling_fees' => 2.9,
            'payment_charges_percentage' => 10,
            'payment_charges_fixed' => 0.35
        ];
    }

    public function preparePusherSettingsData(): array
    {
        return [
            'pusher_app_id' => '1216879',
            'pusher_app_key' => 'f442576e0be5eca3aeab',
            'pusher_app_secret' => '08638c498fb60fabc378',
            'pusher_port' => '443',
            'pusher_scheme' => 'https',
            'pusher_app_cluster' => 'ap2',
            'development_pusher_app_id' => '1216879',
            'development_pusher_app_key' => 'f442576e0be5eca3aeab',
            'development_pusher_app_secret' => '08638c498fb60fabc378',
            'development_pusher_port' => '443',
            'development_pusher_scheme' => 'https',
            'development_pusher_app_cluster' => 'ap2',
        ];
    }

    public function prepareMediaSettingData(): array
    {
        return [
            'website_default_avatar_image' => 'https://s3.us-east-2.amazonaws.com/dealfair.app/default_site_settings/website_default_avatar_image.png',
            'website_default_listing_image' => 'https://s3.us-east-2.amazonaws.com/dealfair.app/default_site_settings/website_default_listing_image.svg',
            'website_default_community_image' => 'https://s3.us-east-2.amazonaws.com/dealfair.app/default_site_settings/website_default_community_image.svg',
            'website_default_store_thumbnail' => 'https://s3.us-east-2.amazonaws.com/dealfair.app/default_site_settings/website_default_store_thumbnail.svg',
            'website_default_store_Logo' => 'https://s3.us-east-2.amazonaws.com/dealfair.app/default_site_settings/website_default_store_logo.svg',
            'max_picture_size' => '2',
            'max_video_duration' => '30',
            'max_video_size' => '20',
            'allowed_picture_types' => 'png,jpeg,jpg,jfif.gif',
            'max_number_of_pictures' => '12',
        ];
    }

    public function prepareProductSettingData(): array
    {
        return [
            'delete_auctions_older_than' => '0',
            'delete_unpaid_auctions_older_than' => '0',
            'countdown_time' => '5'
        ];
    }

    public function prepareGeneralSettingData(): array
    {
        return [
            'website_name' => 'Dealfair',
            'website_copyright' => '2023© DealFair',
        ];
    }

    public function prepareAwsSettingsData(): array
    {

        return [
            'aws_access_key_id' => 'akiaqmqnfmosxc47gkme',
            'aws_secret_access_key' => 'dgwhrv7ex2pvoz6bfenwzw01+cpqgk+nzhruvhsp',
            'aws_default_region' => 'us-east-2',
            'aws_bucket' => 'dealfair.app',
            'aws_use_path_style_endpoint' => 'false',
            'development_aws_access_key_id' => 'akiaqmqnfmosxc47gkme',
            'development_aws_secret_access_key' => 'dgwhrv7ex2pvoz6bfenwzw01+cpqgk+nzhruvhsp',
            'development_aws_default_region' => 'us-east-2',
            'development_aws_bucket' => 'dealfair.app',
            'development_aws_use_path_style_endpoint' => 'false',
        ];
    }

    public function prepareMapSettingsData(): array
    {

        return [
            'enable_google_map' => 0,
            'google_map_api_key' => 'AIzaSyDCdy3x9XvNXA7K-Dxo54Zl3lwqz54fF_Q',
            'map_key_account_reference' => 'mwaqasiu@gmail.com',
            'development_enable_google_map' => 0,
            'development_google_map_api_key' => 'AIzaSyDCdy3x9XvNXA7K-Dxo54Zl3lwqz54fF_Q',
            'development_map_key_account_reference' => 'mwaqasiu@gmail.com',
        ];
    }

    public function prepareLogoSettingsData(): array
    {

        return [
            'website_favicon' => 'https://s3.us-east-2.amazonaws.com/dealfair.app/default_site_settings/Favicon.webp',
            'website_only_logo_for_light_mode' => 'https://s3.us-east-2.amazonaws.com/dealfair.app/default_site_settings/website_only_logo_for_light_mode.webp',
            'website_only_logo_for_dark_mode' => 'https://s3.us-east-2.amazonaws.com/dealfair.app/default_site_settings/website_only_logo_for_dark_mode.webp',
            'website_full_logo_for_light_mode' => 'https://s3.us-east-2.amazonaws.com/dealfair.app/default_site_settings/website_full_logo_for_light_mode.webp',
            'website_full_logo_for_dark_mode' => 'https://s3.us-east-2.amazonaws.com/dealfair.app/default_site_settings/website_full_logo_for_dark_mode.webp',
        ];
    }
}
