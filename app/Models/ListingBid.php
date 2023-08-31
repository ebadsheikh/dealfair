<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListingBid extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'listing_id',
        'user_id',
        'bid_price'
    ];

    public function bidder()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
