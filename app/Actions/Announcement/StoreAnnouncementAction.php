<?php

namespace App\Actions\Announcement;

use App\Models\Announcement;

class StoreAnnouncementAction
{
    public function handle(array $data): Announcement
    {
        return Announcement::create($data);
    }
}
