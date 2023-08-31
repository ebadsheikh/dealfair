<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Str;

class Article extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'title', 'description', 'tags', 'status', 'slug'];

    public function scopePublishedUnpublished(Builder $query)
    {
        $query->whereIn('status', ['published', 'unpublished']);
    }

    /**
     * Function to save to media to collection
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('article_image')
            ->singleFile();
    }

    public function articleCategory()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id', 'id');
    }

    public function likeDislikeTracker()
    {
        return $this->hasMany(ArticleLikeDislikeTracker::class);
    }

    /**
     * Set the title attribute and generate the slug.
     *
     * @param string $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
