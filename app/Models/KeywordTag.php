<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KeywordTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'keyword_id',
        'tag'
    ];


    public function keyword(): BelongsTo
    {
        return $this->belongsTo(Keyword::class);
    }
}
