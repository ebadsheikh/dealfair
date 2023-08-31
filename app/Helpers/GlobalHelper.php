<?php

namespace App\Helpers;

use App\Enums\MediaDirectoryNamesEnum;
use App\Models\Category;
use App\Models\Setting;
use App\Models\User;
use App\Services\Category\CategoryService;
use Brotzka\DotenvEditor\DotenvEditor;
use Brotzka\DotenvEditor\Exceptions\DotEnvException;
use Diglactic\Breadcrumbs\Exceptions\InvalidBreadcrumbException;
use Diglactic\Breadcrumbs\Generator;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class GlobalHelper
{
    /**
     * Get the application settings from cache or database
     *
     * @return array
     */
    public static function getSettings(): array
    {
        return Cache::rememberForever('settings', function () {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    public static function getSettingValue(string $key): string
    {
        $settings = self::getSettings();
        return $settings[$key] ?? '';
    }

    /**
     *
     * @param array $data
     * @return void
     * @throws DotEnvException
     */
    public static function setValuesInEnv(array $data): void
    {
        $env = new DotenvEditor();
        $env->addData($data);
    }

    public static function getPreviousRouteName(): string
    {
        return app('router')
            ->getRoutes()
            ->match(Request::create(URL::previous()))->getName();
    }

    public static function wasPreviousRoute(string $routeName): bool
    {
        $previousRouteName = self::getPreviousRouteName();
        return $previousRouteName === $routeName;
    }

    public static function isActiveRoute(string $routeName): string
    {
        $currentRouteName = Route::currentRouteName();
        return $currentRouteName === $routeName ? 'active' : '';
    }

    public static function getToEmail(string $email): string
    {
        if (config('app.env') === 'production') {
            return $email;
        } else {
            return config('mail.test_email_receiver');
        }
    }

    public static function getPathFromUrl(string $url): string
    {
        $removeFromUrl = 'https://s3.us-east-2.amazonaws.com/dealfair.app/';
        return Str::after($url, $removeFromUrl);
    }

    public static function getUser(): ?User
    {
        $userId = Auth::id();

        $cacheKey = 'user_' . $userId;

        return Cache::rememberForever($cacheKey, function () use ($userId) {
            return User::whereId($userId)->with(['media', 'roles', 'userProfile'])->first();
        });
    }

    public static function getProfilePic(): string
    {
        $defaultImagePath = '/assets/media/avatars/blank.png';

        $user = static::getUser();

        if (!$user) {
            return asset($defaultImagePath);
        }

        $mediaUrl = $user->getFirstMediaUrl(MediaDirectoryNamesEnum::PROFILE_IMAGES->value);

        if (!$mediaUrl) {
            return asset($defaultImagePath);
        }

        return $mediaUrl;
    }

    public static function getCustomer(): ?User
    {
        $user = static::getUser();

        if ($user && $user->hasRole('customer')) {
            return $user;
        }

        return null;
    }

    public static function forgetUserCache(int $userId): void
    {
        Cache::forget('user_' . $userId);
    }

    public static function optimizeClear(): void
    {
        Artisan::call('optimize:clear');
    }

    public static function configCache(): void
    {
        Artisan::call('config:cache');
    }

    public static function generateCategoryTree(Category $category, $prefix = ' > ', &$categoryOptions = []): array
    {
        $categoryOptions = [];

        $currentCategoryOption = [
            'id' => $category->id,
            'name' => $prefix . $category->name,
        ];
        $categoryOptions[] = $currentCategoryOption;

        if ($category->parentCategoriesRecursive) {
            self::generateCategoryTree($category->parentCategoriesRecursive, $prefix . $category->name . ' > ', $categoryOptions);
        }

        return [
            'id' => $category->id,
            'name' => rtrim(implode(' > ', array_reverse(explode(' > ', $categoryOptions[0]['name']))), ' >')
        ];
    }

    /**
     * @throws InvalidBreadcrumbException
     */
    public static function generateCategoryBreadcrumbs(Generator $generateTrail, Category $category)
    {
        if ($category->parentCategoriesRecursive) {
            self::generateCategoryBreadcrumbs($generateTrail, $category->parentCategoriesRecursive);
        }

        $generateTrail->push($category->name, route('category.details', $category->slug));
    }

    public static function generateCategoryBreadcrumbsInAdmin(Generator $generateTrail, Category $category)
    {
        if ($category->parentCategoriesRecursive) {
            self::generateCategoryBreadcrumbsInAdmin($generateTrail, $category->parentCategoriesRecursive);
        }

        $generateTrail->push($category->name, route('admin.category.index', $category->id));
    }


    public static function pluckChildCategoryIds(Category $category)
    {
        $descendantIds = [$category->id];

        $category->load('childrenCategories');

        $descendantCategories = $category->childrenCategories;

        foreach ($descendantCategories as $childCategory) {
            $descendantIds = array_merge($descendantIds, self::pluckChildCategoryIds($childCategory));
        }

        return $descendantIds;
    }

    public static function formatEnumValue(string $value): string
    {
        $words = explode('_', $value);
        $capitalizedWords = array_map('ucfirst', $words);
        return implode(' ', $capitalizedWords);
    }

    public static function formatPrice(string $value): string
    {
        return '$' . number_format($value, 2);
    }

    public static function formatCount(string $value): string
    {
        return $value;
    }

    public static function getIpInfo(): array
    {
        if (app()->environment('production') || app()->environment('livedebug') || app()->environment('staging')) {
            $ip = request()->ip();
        } else {
            $ip = '170.143.70.135';
        }

        $accessKey = 'bb4ae1575852ad54f524ed33daf6d388';

        // Initialize CURL:
        $ch = curl_init('http://api.ipstack.com/' . $ip . '?access_key=' . $accessKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $apiResult = json_decode($json);

        return [
            'latitude' => 0,
            'longitude' => 0,
        ];
    }

    public static function preFetchLeafCategories()
    {
        return Cache::rememberForever('categories', function () {
            $categories = (new CategoryService())->getLeafCategoriesWithOther();
            $preFetchedCategories = [];
            foreach ($categories as $category) {
                $generateCategoryTree = GlobalHelper::generateCategoryTree($category);
                $preFetchedCategories[] = [
                    'id' => $generateCategoryTree['id'],
                    'name' => $generateCategoryTree['name'],
                ];
            }

            return $preFetchedCategories;
        });
    }
}
