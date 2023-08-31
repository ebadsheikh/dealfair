<?php

namespace App\Models;

use App\Enums\MediaDirectoryNamesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Store extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'slug',
        'store_name',
        'category_id',
        'email',
        'telephone',
        'address',
        'city',
        'state',
        'state_code',
        'zip',
        'latitude',
        'longitude',
        'country_id',
        'status',
    ];


    /**
     * Registers the media collections for the user model.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaDirectoryNamesEnum::STORE_LOGO->value)
            ->useDisk('s3')
            ->singleFile();

        $this->addMediaCollection(MediaDirectoryNamesEnum::STORE_THUMBNAIL->value)
            ->useDisk('s3')
            ->singleFile();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }
}
