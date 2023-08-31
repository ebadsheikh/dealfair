<?php

namespace App\Actions\CommunityMember;

use App\Enums\RolesEnum;
use App\Models\CommunityMember;
use App\Models\User;

class StoreCommunityMemberAction
{
    public function handle(array $data): void
    {
        $this->addSuperAdminInCommunity($data['community_id']);
        $this->addMemberInCommunity($data['community_id'], $data['user_id']);
    }

    public function addSuperAdminInCommunity(int $communityId): void
    {
        $superAdmin = User::role(RolesEnum::SUPERADMIN->value)->first();

        CommunityMember::firstOrCreate(
            [
                'user_id' => $superAdmin->id,
                'community_id' => $communityId,
            ],
            [
                'user_id' => $superAdmin->id,
                'community_id' => $communityId,
                'is_admin' => 1,
            ]
        );
    }

    public function addMemberInCommunity(int $communityId, int $userId): void
    {
        CommunityMember::firstOrCreate(
            [
                'user_id' => $userId,
                'community_id' => $communityId,
            ],
            [
                'user_id' => $userId,
                'community_id' => $communityId,
            ]
        );
    }
}
