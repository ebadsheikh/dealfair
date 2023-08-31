<?php

namespace App\Models;

use App\Enums\CommunityMemberFiltersEnum;
use App\Enums\MediaDirectoryNamesEnum;
use App\Enums\SortProductsEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Community extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;


    protected $fillable = [
        'name',
        'slug',
        'short_name',
        'zip',
        'state',
        'state_code',
        'city'
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $value,
            set: fn (mixed $value) => ['slug' => Str::slug($value), 'name' => $value]
        );
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaDirectoryNamesEnum::COMMUNITY_IMAGES->value)->useDisk('s3');
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'community_members', 'community_id', 'user_id');
    }

    public function listings()
    {
        return $this->belongsToMany(Listing::class, 'listing_communities', 'community_id', 'listing_id');
    }

    public function scopeFilterCommunityCreated(Builder $query, string $startingDate, string $endingDate): Builder
    {
        return $query->whereBetween('created_at', [$startingDate, $endingDate]);
    }

    public function scopeFilterCommunityCreatedToday(Builder $query): Builder
    {
        return $query->whereDate('created_at', Carbon::today());
    }

    public function scopeFilterCommunityCreatedYesterday(Builder $query): Builder
    {
        return $query->whereDate('created_at', Carbon::yesterday());
    }

    public function scopeFilterCommunityCreatedThisMonth(Builder $query): Builder
    {
        return $query->whereMonth('created_at', Carbon::now());
    }

    public function scopeFilterCommunityCreatedThisYear(Builder $query): Builder
    {
        return $query->whereYear('created_at', Carbon::now());
    }

    public function scopeByCommunitySizeRange($query, $minSize, $maxSize = 0)
    {
        return $query->whereHas('members', function ($query) use ($minSize, $maxSize) {
            $query->select('community_id')
                ->groupBy('community_id')
                ->when($maxSize != 0, function ($query) use ($minSize, $maxSize) {
                    $query->havingRaw('COUNT(*) BETWEEN ? AND ?', [$minSize, $maxSize]);
                })->when($maxSize === 0, function ($query) use ($minSize) {
                    $query->havingRaw('COUNT(*) >= ?', [$minSize]);
                });
        });
    }

    public function scopeCommunitiesByZipCodes(Builder $query, array $zip)
    {
        return $query->whereIn('zip', $zip);
    }

    public function scopeNearByCommunities(Builder $query, int $radius)
    {
        $nearByAddresses = UserAddress::nearByAddresses($radius);
        return $query->communitiesByZipCodes($nearByAddresses);
    }

    public function scopeWithFilters(Builder $query, string $searchByZipCode, string $searchByName, string $searchByState, string $searchByCommunitySize, string $sortByProducts, string $searchByNearest)
    {
        return $query->when($searchByZipCode != "", function ($query) use ($searchByZipCode) {
            $query->where('zip', 'like', '%' . $searchByZipCode . '%');
        })->when($searchByName != "", function ($query) use ($searchByName) {
            $query->where('name', 'like', '%' . $searchByName . '%');
        })->when($searchByState != "", function ($query) use ($searchByState) {
            $query->whereState($searchByState);
        })->when($searchByCommunitySize != "", function ($query) use ($searchByCommunitySize) {
            switch ($searchByCommunitySize) {
                case CommunityMemberFiltersEnum::LESS_THAN_50->name:
                    $query->byCommunitySizeRange(0, 50);
                    break;
                case CommunityMemberFiltersEnum::FROM_50_TO_500->name:
                    $query->byCommunitySizeRange(50, 500);
                    break;
                case CommunityMemberFiltersEnum::FROM_500_TO_5000->name:
                    $query->byCommunitySizeRange(500, 5000);
                    break;
                case CommunityMemberFiltersEnum::MORE_THAN_5000->name:
                    $query->byCommunitySizeRange(5000);
                    break;
                default:
                    break;
            }
        })->when($searchByNearest > 0 && $searchByNearest <= 100, function ($query) use ($searchByNearest) {

            $query->nearByCommunities($searchByNearest);

        })->when($sortByProducts != "", function ($query) use ($sortByProducts) {
            if ($sortByProducts === SortProductsEnum::LOW_TO_HIGH->name) {
                $query->orderBy('listings_count', 'ASC');
            } else {
                $query->orderBy('listings_count', 'DESC');
            }
        });
    }
}
