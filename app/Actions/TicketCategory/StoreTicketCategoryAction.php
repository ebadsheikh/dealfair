<?php

namespace App\Actions\TicketCategory;

use App\Models\TicketCategory;
use Illuminate\Support\Str;

class StoreTicketCategoryAction
{
    public function handle($data)
    {
        return TicketCategory::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name'])
        ]);
    }
}
