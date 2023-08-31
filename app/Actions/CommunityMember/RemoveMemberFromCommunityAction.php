<?php

namespace App\Actions\CommunityMember;

use App\Models\CommunityMember;

class RemoveMemberFromCommunityAction
{
    public function handle(int $communityId, $userId): bool
    {
        return CommunityMember::whereCommunityId($communityId)
            ->whereUserId($userId)
            ->delete();
    }
}
