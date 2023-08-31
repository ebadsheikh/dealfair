<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'views',
        'price',
        'status'
    ];
}
