<?php

namespace App\Actions\Announcement;

use App\Models\Announcement;

class DeleteAnnouncementAction
{
    public function execute(Announcement $announcement)
    {
        $is_delete = $announcement->delete();
        return $is_delete;
    }
}
