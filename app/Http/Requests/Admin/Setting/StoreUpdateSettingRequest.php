<?php

namespace App\Http\Requests\Admin\Setting;

use App\Helpers\GlobalHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'step_two_form_subtitle' => 'form subtitle',
            'website_name' => 'website name',
            'website_copyright' => 'website copyright',
            'delete_auctions_older_than' => 'delete products older than',
            'delete_unpaid_auctions_older_than' => 'delete unpaid products older than',
            'enable_google_map' => 'enable google map',
            'google_map_api_key' => 'google map api key',
            'enable_maintenance_mode' => 'enable maintenance mode',
            'community_admin_commission' => 'community admin commission',
            'selling_fees' => 'selling fees',
            'payment_charges' => 'payment charges',
            'max_wallet_limit' => 'max wallet limit',
            'minimum_community_admin_withdraw_amount' => 'minimum community admin withdraw amount',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        if (GlobalHelper::getPreviousRouteName() === 'admin.settings.mail') {
            return [
                'mail_mailer' => 'required|string',
                'mail_host' => 'required|string',
                'mail_port' => 'required|integer',
                'mail_username' => 'required|string',
                'mail_password' => 'required|string',
                'mail_encryption' => 'required|string',
                'mail_from_address' => 'required|email',
                'mail_from_name' => 'required|string',
                'development_mail_mailer' => 'required|string',
                'development_mail_host' => 'required|string',
                'development_mail_port' => 'required|integer',
                'development_mail_username' => 'required|string',
                'development_mail_password' => 'required|string',
                'development_mail_encryption' => 'required|string',
                'development_mail_from_address' => 'required|email',
                'development_mail_from_name' => 'required|string',
                'test_email_receiver' => 'required|email',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.settings.social.auth') {
            return [
                'enable_facebook_login' => 'nullable|boolean',
                'facebook_app_id' => 'nullable|string|required_if:enable_facebook_login,true',
                'facebook_app_secret' => 'nullable|string|required_if:enable_facebook_login,true',
                'enable_google_login' => 'nullable|boolean',
                'google_app_id' => 'nullable|string|required_if:enable_google_login,true',
                'google_app_secret' => 'nullable|string|required_if:enable_google_login,true',
                'enable_apple_login' => 'nullable|boolean',
                'apple_app_id' => 'nullable|string|required_if:enable_apple_login,true',
                'apple_app_secret' => 'nullable|string|required_if:enable_apple_login,true',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.onboarding.step.one') {
            return [
                'step_one_left_side_title' => 'required|string',
                'step_one_left_side_subtitle' => 'required|string',
                'step_one_form_title' => 'required|string',
                'step_one_form_subtitle' => 'required|string',
                'step_one_welcome_video' => 'nullable|mimes:mp4,avi,wmv,mov,webm|max:50000',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.onboarding.step.two') {
            return [
                'step_two_left_side_title' => 'required|string',
                'step_two_left_side_subtitle' => 'required|string',
                'step_two_form_title' => 'required|string',
                'step_two_form_subtitle' => 'required|string',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.onboarding.step.three') {
            return [
                'step_three_left_side_title' => 'required|string',
                'step_three_left_side_subtitle' => 'required|string',
                'step_three_form_title' => 'required|string',
                'step_three_form_subtitle' => 'required|string',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.onboarding.step.four') {
            return [
                'step_four_left_side_title' => 'required|string',
                'step_four_left_side_subtitle' => 'required|string',
                'step_four_form_title' => 'required|string',
                'step_four_form_subtitle' => 'required|string',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.onboarding.step.five') {
            return [
                'step_five_left_side_title' => 'required|string',
                'step_five_left_side_subtitle' => 'required|string',
                'step_five_form_title' => 'required|string',
                'step_five_form_subtitle' => 'required|string',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.onboarding.step.six') {
            return [
                'step_six_left_side_title' => 'required|string',
                'step_six_left_side_subtitle' => 'required|string',
                'step_six_form_title' => 'required|string',
                'step_six_form_subtitle' => 'required|string',
                'step_six_seller_video' => 'nullable|mimes:mp4,avi,wmv,mov,webm|max:50000',
                'step_six_buyer_video' => 'nullable|mimes:mp4,avi,wmv,mov,webm|max:50000',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.settings.general') {
            return [
                'website_name' => 'required|regex:/^[A-Za-z\s]+$/|min:3|max:15',
                'website_copyright' => 'required|string|min:3|max:25',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.settings.auction') {
            return [
                'delete_auctions_older_than' => 'required|integer|not_in:0|between:-1,365',
                'delete_unpaid_auctions_older_than' => 'required|integer|not_in:0|between:-1,365',
                'countdown_time' => 'required|integer',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.settings.media') {
            return [
                'default_avatar_image' => 'required',
                'default_listing_image' => 'required',
                'default_community_image' => 'required',
                'default_store_thumbnail' => 'required',
                'default_store_Logo' => 'required',
                'max_picture_size' => 'required|integer|not_in:0',
                'max_video_duration' => 'required|integer|not_in:0',
                'max_video_size' => 'required|integer|not_in:0',
                'allowed_picture_types' => 'required',
                'max_number_of_pictures' => 'required|integer|not_in:0'
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.settings.map') {
            return [
                'enable_google_map' => 'required|boolean',
                'google_map_api_key' => 'required|string',
                'map_key_account_reference' => 'required|string|email',
                'development_enable_google_map' => 'required|boolean',
                'development_google_map_api_key' => 'required|string',
                'development_map_key_account_reference' => 'required|string|email'
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.settings.listing') {
            return [
                'listing_image_dropzone_description' => 'required|string',
                'listing_video_dropzone_description' => 'required|string',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.settings.maintenance-mode') {
            return [
                'enable_maintenance_mode' => 'required|boolean',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.settings.fees') {
            return [
                'community_admin_commission' => 'required|between:0,100',
                'selling_fees' => 'required|between:0,100',
                'payment_charges_percentage' => 'required|between:0,100',
                'payment_charges_fixed' => 'required|between:0,100',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.settings.wallet') {
            return [
                'max_wallet_limit' => 'required|integer',
                'minimum_community_admin_withdraw_amount' => 'required|integer',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.settings.logos') {

            return  [
                'website_favicon' => 'nullable|string',
                'website_only_logo_for_light_mode' => 'nullable|string',
                'website_only_logo_for_dark_mode' => 'nullable|string',
                'website_full_logo_for_light_mode' => 'nullable|string',
                'website_full_logo_for_dark_mode' => 'nullable|string',
            ];

        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.settings.aws') {
            return [
                'aws_access_key_id' => 'required',
                'aws_secret_access_key' => 'required',
                'aws_default_region' => 'required',
                'aws_bucket' => 'required',
                'aws_use_path_style_endpoint' => 'required',
                'development_aws_access_key_id' => 'required',
                'development_aws_secret_access_key' => 'required',
                'development_aws_default_region' => 'required',
                'development_aws_bucket' => 'required',
                'development_aws_use_path_style_endpoint' => 'required',
            ];
        }

        if (GlobalHelper::getPreviousRouteName() === 'admin.settings.pusher') {
            return [
                'pusher_app_id' => 'required|alpha_dash',
                'pusher_app_key' => 'required|alpha_dash',
                'pusher_app_secret' => 'required|alpha_dash',
                'pusher_port' => 'required|integer',
                'pusher_scheme' => 'required',
                'pusher_app_cluster' => 'required|alpha_dash',
                'development_pusher_app_id' => 'required|alpha_dash',
                'development_pusher_app_key' => 'required|alpha_dash',
                'development_pusher_app_secret' => 'required|alpha_dash',
                'development_pusher_port' => 'required|integer',
                'development_pusher_scheme' => 'required',
                'development_pusher_app_cluster' => 'required|alpha_dash',
            ];
        }
        return [
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'website_name' => 'nullable|string',
            'website_copyright' => 'nullable|string',
            'delete_auctions_older_than' => 'nullable|integer|not_in:0|between:-1,365',
            'delete_unpaid_auctions_older_than' => 'nullable|integer|not_in:0|between:-1,365',
            'enable_google_map' => 'nullable|boolean',
            'google_map_api_key' => 'nullable|string',
            'enable_maintenance_mode' => 'nullable|boolean',
            'community_admin_commission' => 'nullable|integer|between:0,100',
            'selling_fees' => 'nullable|integer|between:0,100',
            'payment_charges' => 'nullable|integer|between:0,100',
            'max_wallet_limit' => 'nullable|integer',
            'minimum_community_admin_withdraw_amount' => 'nullable|integer',
            'website_logo' => 'nullable|image',
            'website_favicon' => 'nullable|image',
            'admin_logo' => 'nullable|image',
            'website_dashboard_logo' => 'nullable|image',
            'listing_image_dropzone_description' => 'nullable|string',
            'listing_video_dropzone_description' => 'nullable|string',
            'pusher_app_id' => 'nullable|alpha_dash',
            'pusher_app_key' => 'nullable|alpha_dash',
            'pusher_app_secret' => 'nullable|alpha_dash',
            'pusher_port' => 'nullable|integer',
            'pusher_scheme' => 'nullable',
            'pusher_app_cluster' => 'nullable|alpha_dash',
            'development_pusher_app_id' => 'nullable|alpha_dash',
            'development_pusher_app_key' => 'nullable|alpha_dash',
            'development_pusher_app_secret' => 'nullable|alpha_dash',
            'development_pusher_port' => 'nullable|integer',
            'development_pusher_scheme' => 'nullable',
            'development_pusher_app_cluster' => 'nullable|alpha_dash',
            // Add any other inputs you want to validate here
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'facebook_app_id.required_if' => 'Please provide a Facebook App ID.',
            'facebook_app_secret.required_if' => 'Please provide a Facebook App Secret.',
            'google_app_id.required_if' => 'Please provide a Google App ID.',
            'google_app_secret.required_if' => 'Please provide a Google App Secret.',
            'apple_app_id.required_if' => 'Please provide an Apple App ID.',
            'apple_app_secret.required_if' => 'Please provide an Apple App Secret.',
            'facebook_link.url' => 'The Facebook link must be a valid URL.',
            'twitter_link.url' => 'The Twitter link must be a valid URL.',
            'delete_auctions_older_than.integer' => 'The value must be an integer.',
            'delete_auctions_older_than.between' => 'The value must be between -1 and 365.',
            'delete_auctions_older_than.not_in' => 'The value cannot be 0.',
            'delete_unpaid_auctions_older_than.integer' => 'The value must be an integer.',
            'delete_unpaid_auctions_older_than.between' => 'The value must be between -1 and 365.',
            'delete_unpaid_auctions_older_than.not_in' => 'The value cannot be 0.'
            // Add any other validation messages you want to use here
        ];
    }
}
