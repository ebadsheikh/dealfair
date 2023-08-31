<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TicketCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug', 'status'];


    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => ucwords($value),
            set: fn (mixed $value) => ['slug' => Str::slug($value), 'name' => strtolower($value)]
        );
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
