<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
