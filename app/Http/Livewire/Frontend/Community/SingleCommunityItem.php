<?php

namespace App\Http\Livewire\Frontend\Community;

use App\Actions\CommunityMember\RemoveMemberFromCommunityAction;
use App\Actions\CommunityMember\StoreCommunityMemberAction;
use App\Helpers\GlobalHelper;
use App\Models\Community;
use Livewire\Component;

class SingleCommunityItem extends Component
{
    public Community $community;

    public $listingWithoutCommunityCount;

    public function mount(Community $community, $listingWithoutCommunityCount = 0)
    {
        $this->community = $community;
        $this->listingWithoutCommunityCount = $listingWithoutCommunityCount;
    }

    public function joinCommunity(int $communityId)
    {
        $user = GlobalHelper::getUser();
        if ($user) {
            (new StoreCommunityMemberAction())->addMemberInCommunity($communityId, $user->id);
        } else {
            return redirect()->route('auth.signin');
        }

        $this->attachQuery($communityId);
        return null;
    }

    public function leaveCommunity(int $communityId)
    {
        $user = GlobalHelper::getUser();
        if ($user) {
            (new RemoveMemberFromCommunityAction())->handle($communityId, $user->id);
        } else {
            return redirect()->route('auth.signin');
        }
        $this->attachQuery($communityId);
        return null;
    }

    public function attachQuery($communityId)
    {
        $user = GlobalHelper::getUser();
        $fetchResult = Community::whereId($communityId)->with('media')->with([
            'members' => function ($query) use ($user) {
                $query->select('community_id')
                    ->where('user_id', $user?->id);
            }
        ])->withCount(['members', 'listings'])->first();

        $fetchResult->isJoined = $fetchResult->members->isNotEmpty();
        unset($fetchResult->members);
        $this->community = $fetchResult;
    }

    public function render()
    {
        return view('livewire.frontend.community.single-community-item');
    }
}
