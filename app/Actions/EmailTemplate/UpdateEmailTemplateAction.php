<?php

namespace App\Actions\EmailTemplate;

use App\Models\EmailTemplate;

class UpdateEmailTemplateAction
{
    /**
     * Update an email template
     *
     * @param array $data The data to update the email template with
     * @param EmailTemplate $emailTemplate The email template to update
     *
     * @return EmailTemplate The updated email template
     */
    public function handle(array $data, EmailTemplate $emailTemplate): EmailTemplate
    {
        $emailTemplate->update($data);
        return $emailTemplate;
    }
}
