<?php

namespace App\Models;

use App\Enums\ListingPriceFiltersEnum;
use App\Enums\MediaDirectoryNamesEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Listing extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'id',
        'ul_id',
        'user_id',
        'store_id',
        'title',
        'slug',
        'category_id',
        'product_condition',
        'listing_type',
        'brand',
        'starting_bid',
        'auction_end',
        'selling_fees',
        'payment_charges_fixed',
        'payment_charges_percentage',
        'price',
        'discounted_price',
        'description',
        'quantity',
        'shipping_cost_payer',
        'visible_range',
        'pickup_latitude',
        'pickup_longitude',
        'pickup_address',
        'pickup_city',
        'pickup_state',
        'pickup_zip',
        'pickup_country',
        'status'
    ];

    protected $with = [
        'media',
        'user.media',
        'store',
        'user.homeCommunity',
        'user.userProfile'
    ];

    /**
     * The boot method is called when the model is being booted up.
     * It sets a unique ID for the order being created.
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($order) {
            $order->ul_id = 'DFLI-' . Str::random(3) . '-' . random_int(100000, 1000000);
        });
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => ucwords($value),
            set: fn (mixed $value) => ['slug' => Str::slug($value . '-' . random_int(1000, 10000)), 'title' => strtolower($value)]
        );
    }

    protected function startingBid(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $value / 100,
            set: fn (mixed $value) => $value * 100
        );
    }

    protected function sellingFees(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $value / 100,
            set: fn (mixed $value) => $value * 100
        );
    }

    protected function paymentChargesFixed(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $value / 100,
            set: fn (mixed $value) => $value * 100
        );
    }

    protected function paymentChargesPercentage(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $value / 100,
            set: fn (mixed $value) => $value * 100
        );
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $value / 100,
            set: fn (mixed $value) => $value * 100
        );
    }

    protected function discountedPrice(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $value / 100,
            set: fn (mixed $value) => $value * 100
        );
    }

    /**
     * Function to save to media to collection
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaDirectoryNamesEnum::PRODUCT_IMAGES->value)
            ->useDisk('s3');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function listingColors(): HasMany
    {
        return $this->hasMany(ListingColor::class);
    }

    public function listingTags(): HasMany
    {
        return $this->hasMany(ListingTag::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function bids()
    {
        return $this->hasMany(ListingBid::class)->orderBy('updated_at', 'DESC');
    }

    public function scopeByStatus(Builder $query, string $status)
    {
        return $query->whereStatus($status);
    }

    public function communities()
    {
        return $this->belongsToMany(Community::class, 'listing_communities');
    }

    public function listingWishlists()
    {
        return $this->hasMany(ListingWishlist::class);
    }

    public function scopeWithFilters(Builder $query, string $searchByListingTitle, string $searchByListingType, string $searchByListingPriceRange, string $searchByListingCondition, string $searchByShippingCostPayer)
    {

        return $query->when($searchByListingTitle != "", function ($query) use ($searchByListingTitle) {
            $query->where('title', 'like', '%' . $searchByListingTitle . '%');
        })->when($searchByListingType != "", function ($query) use ($searchByListingType) {
            $query->whereListingType($searchByListingType);
        })->when($searchByListingCondition != "", function ($query) use ($searchByListingCondition) {
            $query->whereProductCondition($searchByListingCondition);
        })->when($searchByShippingCostPayer != "", function ($query) use ($searchByShippingCostPayer) {
            $query->whereShippingCostPayer($searchByShippingCostPayer);
        })->when($searchByListingPriceRange != "", function ($query) use ($searchByListingPriceRange) {
            $query->when($searchByListingPriceRange === ListingPriceFiltersEnum::LESS_THAN_100->name, function ($query) {
                $query->whereRaw("
                CASE
                    WHEN listings.listing_type = 'auction' THEN starting_bid
                    WHEN listings.listing_type = 'sell' AND discounted_price != 0 THEN discounted_price
                    WHEN listings.listing_type IN ('sell', 'both') THEN price
                END / 100 < 100
            ");
            })->when($searchByListingPriceRange === ListingPriceFiltersEnum::FROM_100_TO_500->name, function ($query) {
                $query->whereRaw("
                CASE
                    WHEN listings.listing_type = 'auction' THEN starting_bid
                    WHEN listings.listing_type = 'sell' AND discounted_price != 0 THEN discounted_price
                    WHEN listings.listing_type IN ('sell', 'both') THEN price
                END / 100 BETWEEN 100 AND 500
            ");
            })->when($searchByListingPriceRange === ListingPriceFiltersEnum::FROM_500_TO_1000->name, function ($query) {
                $query->whereRaw("
                CASE
                    WHEN listings.listing_type = 'auction' THEN starting_bid
                    WHEN listings.listing_type = 'sell' AND discounted_price != 0 THEN discounted_price
                    WHEN listings.listing_type IN ('sell', 'both') THEN price
                END / 100 BETWEEN 500 AND 1000
            ");
            })->when($searchByListingPriceRange === ListingPriceFiltersEnum::FROM_1000_TO_2500->name, function ($query) {
                $query->whereRaw("
                CASE
                    WHEN listings.listing_type = 'auction' THEN starting_bid
                    WHEN listings.listing_type = 'sell' AND discounted_price != 0 THEN discounted_price
                    WHEN listings.listing_type IN ('sell', 'both') THEN price
                END / 100 BETWEEN 1000 AND 2500
            ");
            })->when($searchByListingPriceRange === ListingPriceFiltersEnum::FROM_2500_TO_5000->name, function ($query) {
                $query->whereRaw("
                CASE
                    WHEN listings.listing_type = 'auction' THEN starting_bid
                    WHEN listings.listing_type = 'sell' AND discounted_price != 0 THEN discounted_price
                    WHEN listings.listing_type IN ('sell', 'both') THEN price
                END / 100 BETWEEN 2500 AND 5000
            ");
            })->when($searchByListingPriceRange === ListingPriceFiltersEnum::MORE_THAN_5000->name, function ($query) {
                $query->whereRaw("
                CASE
                    WHEN listings.listing_type = 'auction' THEN starting_bid
                    WHEN listings.listing_type = 'sell' AND discounted_price != 0 THEN discounted_price
                    WHEN listings.listing_type IN ('sell', 'both') THEN price
                END / 100 > 5000
            ");
            });
        });
    }

    public function scopeWithCommunityOrNoCommunity($query, int $communityId = null)
    {
        return $query->where(function ($query) use ($communityId) {
            $query->whereHas('communities', function ($subquery) use ($communityId) {
                if($communityId != null) {
                    $subquery->where('community_id', $communityId);
                }
            })->orWhereDoesntHave('communities');
        });
    }
}
