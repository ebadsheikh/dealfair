<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleLikeDislikeTracker extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['article_id','user_id','is_like'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function article()
    {
        return $this->hasOne(Article::class, 'id', 'article_id');
    }
}
