<?php

namespace App\Actions\DynamicPage;

use App\Models\DynamicPage;

class StoreDynamicPageAction
{
    /**
     * This function creates a DynamicPage object using the data passed as an argument.
     * @param array $data An array of data to be used to create the page.
     * @return DynamicPage The created DynamicPage object.
    */
    public function handle(array $data): DynamicPage
    {
        return DynamicPage::create($data);
    }
}
