<?php

namespace App\Actions\EmailTemplate;

use App\Models\EmailTemplate;

class StoreEmailTemplateAction
{
    /**
     * Store a new email template
     *
     * @param array $data The data to create the email template with
     *
     * @return EmailTemplate The newly created email template
     */
    public function handle(array $data): EmailTemplate
    {
        return EmailTemplate::create($data);
    }
}
