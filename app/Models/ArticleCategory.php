<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ArticleCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','icon','slug'];

    /**
     * Set the title attribute and generate the slug.
     *
     * @param string $value
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => ucwords($value),
            set: fn (mixed $value) => ['slug' => Str::slug($value), 'name' => strtolower($value)]
        );
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id')->limit(10);
    }
}
