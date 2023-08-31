<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['topic_id', 'question', 'answer', 'type'];

    /**
     * Scope a query to only include buyers.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBuyer($query)
    {
        $query->where('type', 'buyer');
    }

    /**
     * Scope a query to only include sellers.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSeller($query)
    {
        $query->where('type', 'seller');
    }

    public function scopeTopic($query, $topic_id)
    {
        return $query->where('topic_id', $topic_id);
    }

    public function topics($topic_id)
    {
        return $this->belongsTo(Topic::class)->topic($topic_id);
    }
}
