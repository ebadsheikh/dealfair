<?php

namespace App\Actions\Announcement;

use App\Models\Announcement;

class UpdateAnnouncementAction
{
    public function execute(array $data, Announcement $announcement)
    {
        $announcement->update($data);
        return $announcement;
    }
}
