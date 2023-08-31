<?php

namespace App\Services;

use App\Models\Community;

class CommunityService
{
    public function getDatewiseCommunityCount(): array
    {
        return [
            'todayCount' => Community::filterCommunityCreatedToday()->count(),
            'yesterdayCount' => Community::filterCommunityCreatedYesterday()->count(),
            'thisMonthCount' => Community::filterCommunityCreatedThisMonth()->count(),
            'thisYearCount' => Community::filterCommunityCreatedThisYear()->count(),
        ];
    }
}
