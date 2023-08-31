<?php

namespace App\Models;

use App\Enums\MediaDirectoryNamesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class UserProfile extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'date_of_birth',
        'telephone',
        'user_id',
        'onboarding_step',
        'show_name',
        'status',
        'is_verification_badge_allowed'
    ];

    /**
     * Function to save to media to collection
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaDirectoryNamesEnum::VERIFICATION_IMAGES->value)
            ->useDisk('s3');
    }
}
