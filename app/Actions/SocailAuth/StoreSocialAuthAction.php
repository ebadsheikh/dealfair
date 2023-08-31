<?php

namespace App\Actions\SocailAuth;

use App\Models\SocialAuth;

class StoreSocialAuthAction
{
    /**
     * @param array $data
     * @return SocialAuth
     */
    public function handle(array $data): SocialAuth
    {
        return SocialAuth::create($data);
    }
}
