<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'category_id',
        'image_url',
        'status'
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => ucwords($value),
            set: fn (mixed $value) => ['slug' => Str::slug($value) . '-' . random_int(1000, 10000), 'name' => strtolower($value)]
        );
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function parentCategoriesRecursive()
    {
        return $this->belongsTo(Category::class, 'category_id')->with('parentCategoriesRecursive');
    }

    public function childrenCategories(): HasMany
    {
        return $this->hasMany(Category::class)->with('categories');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'category_brands', 'category_id', 'brand_id')->whereNull('category_brands.deleted_at');
    }
}
