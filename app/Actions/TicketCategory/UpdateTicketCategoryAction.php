<?php

namespace App\Actions\TicketCategory;

use App\Models\TicketCategory;
use Illuminate\Support\Str;

class UpdateTicketCategoryAction
{
    public function handle($data, TicketCategory $category)
    {
        return $category->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name'])
        ]);
    }
}
