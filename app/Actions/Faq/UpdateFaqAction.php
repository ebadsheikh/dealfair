<?php

namespace App\Actions\Faq;

class UpdateFaqAction
{
    public function handle($faq, $data)
    {
        $faq = $faq->update($data);
        return $faq;
    }
}
