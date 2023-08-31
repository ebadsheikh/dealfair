<?php

namespace App\Actions\DynamicPage;

class UpdateDynamicPageAction
{
    /**
     * This function updates a DynamicPage object using the data passed as an argument.
     * @param array $data An array of data to be used to create the page.
     * @return DynamicPage The updated DynamicPage object.
    */
    public function handle(array $data, $page)
    {
        $dynamic_page = $page->update($data);

        return $dynamic_page;
    }
}
