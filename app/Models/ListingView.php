<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListingView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'listing_id',
        'ip',
        'request_from',
        'browser',
        'browser_version',
        'platform',
        'device_type',
        'is_robot',
        'created_at'
    ];

    /**
     * Returns the listing that the user viewed.
     *
     * @return BelongsTo
     */
    public function listings(): BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }
}
