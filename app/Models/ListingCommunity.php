<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingCommunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'community_id'
    ];
}
