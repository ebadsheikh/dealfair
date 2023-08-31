<?php

namespace App\Models;

use App\Enums\UserAddressTypesEnum;
use App\Helpers\GlobalHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class UserAddress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'full_name',
        'telephone',
        'address',
        'city',
        'state',
        'state_code',
        'address_type',
        'zip',
        'country_id',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'address_type' => UserAddressTypesEnum::class
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function scopeNearByAddresses(Builder $query, int $radius)
    {
        $currentLocation = GlobalHelper::getIpInfo();

        return $query->select(
            'user_addresses.*',
            DB::raw('( 3959 * acos( cos( radians(?) ) * cos( radians( latitude ) ) *
                    cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) *
                    sin( radians( latitude ) ) ) ) AS distance')
        )
            ->having('distance', '<=', $radius)
            ->orderBy('distance')
            ->setBindings([$currentLocation['latitude'], $currentLocation['longitude'], $currentLocation['latitude']])
            ->pluck('zip')->toArray();
    }
}
