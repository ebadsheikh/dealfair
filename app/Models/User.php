<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\MediaDirectoryNamesEnum;
use App\Enums\RolesEnum;
use App\Enums\UserAddressTypesEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use InteractsWithMedia;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'email_verified_at',
        'signup_type'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaDirectoryNamesEnum::PROFILE_IMAGES->value)
            ->useDisk('s3')
            ->singleFile();
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => bcrypt($value)
        );
    }

    public function socialAuth(): HasOne
    {
        return $this->hasOne(SocialAuth::class);
    }

    public function userProfile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    public function userAddresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    public function homeCommunity()
    {
        return $this->hasOneThrough(Community::class, UserAddress::class, 'user_id', 'zip', 'id', 'zip')
            ->where('user_addresses.address_type', UserAddressTypesEnum::PRIMARY);
    }

    public function communities(): BelongsToMany
    {
        return $this->belongsToMany(Community::class, 'community_members', 'user_id', 'community_id');
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }

    public function getLastNameInitial(): string
    {
        return substr($this->last_name, 0, 1);
    }

    protected function displayName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $this->shouldDisplayUsernameOrName() ? $this->userProfile->username : $this->short_name
        );
    }

    protected function shortName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $this->first_name . " " . $this->getLastNameInitial() . "."
        );
    }

    public function shouldDisplayUsernameOrName(): bool
    {
        return ($this->userProfile && $this->userProfile->show_name == 0);
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $this->first_name . ' ' . $this->last_name
        );
    }

    public function scopeFilterCustomerCreatedToday(Builder $query): Builder
    {
        return $query->whereDate('created_at', Carbon::today());
    }

    public function scopeFilterCustomerCreatedYesterday(Builder $query): Builder
    {
        return $query->whereDate('created_at', Carbon::yesterday());
    }

    public function scopeFilterCustomerCreatedThisMonth(Builder $query): Builder
    {
        return $query->whereMonth('created_at', Carbon::now());
    }

    public function scopeFilterCustomerCreatedThisYear(Builder $query): Builder
    {
        return $query->whereYear('created_at', Carbon::now());
    }

    public function scopeCustomer(Builder $query): Builder
    {
        return $query->role(RolesEnum::CUSTOMER->value);
    }
}
