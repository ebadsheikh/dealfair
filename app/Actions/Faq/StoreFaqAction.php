<?php

namespace App\Actions\Faq;

use App\Models\Faq;

class StoreFaqAction
{
    public function handle($data): Faq
    {
        return  Faq::create($data);
    }
}
