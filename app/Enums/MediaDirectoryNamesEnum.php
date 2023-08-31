<?php

namespace App\Enums;

enum MediaDirectoryNamesEnum: string
{
    case PROFILE_IMAGES = 'profile_images';
    case VERIFICATION_IMAGES = 'verification_images';
    case SITE_SETTINGS = 'site_settings';
    case ARTICLE_IMAGES = 'article_images';
    case PRODUCT_IMAGES = 'product_images';

    //    case PRODUCT_IMAGE_CONVERSION_150X150 = 'product_image_conversion_150x150';
    case PRODUCT_VIDEO = 'product_video';
    case WEBSITE_LOGO = 'website_logo';
    case WEBSITE_FAVICON = 'website_favicon';
    case ADMIN_LOGO = 'admin_logo';
    case USER_LOGO = 'user_logo';
    case CATEGORY_IMAGES = 'categoryImages';
    case COMMUNITY_IMAGES = 'community_images';

    case STORE_LOGO = 'store_logo';
    case STORE_THUMBNAIL = 'store_thumbnail';
}
