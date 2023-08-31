<?php

namespace App\Actions\CommunityMember;

use App\Models\Community;
use App\Models\CommunityMember;

class UpdateCommunityMemberAction
{
    /**
     * Method handle
     *
     * @param array $data
     * @param Community $community
     * @return bool
     */
    public function handle(array $data, Community $community): bool
    {
        $communityMember = CommunityMember::whereCommunityId($community->id)->whereIsAdmin(1)->update([
            'user_id' => $data['user_id'],
        ]);


        return $communityMember;
    }
}
