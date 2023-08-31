<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EmailTemplate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'key', 'subject', 'content'];

    /**
     * Returns an instance of Attribute with a key that is a slug
     * of the given value separated by underscores.
     * @return Attribute
     */
    protected function key(): Attribute
    {
        return new Attribute(
            set: fn ($value) => Str::slug($value, '_')
        );
    }
}
