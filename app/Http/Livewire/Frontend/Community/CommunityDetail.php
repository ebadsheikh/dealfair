<?php

namespace App\Http\Livewire\Frontend\Community;

use App\Actions\CommunityMember\RemoveMemberFromCommunityAction;
use App\Actions\CommunityMember\StoreCommunityMemberAction;
use App\Helpers\GlobalHelper;
use App\Models\Community;
use App\Models\Listing;
use Livewire\Component;

class CommunityDetail extends Component
{
    public Community $community;
    public string $communitySlug;

    public $listingWithoutCommunityCount;

    public function mount(string $communitySlug)
    {
        $this->communitySlug = $communitySlug;
        $this->listingWithoutCommunityCount = Listing::doesntHave('communities')->count();
        $this->attachQuery($this->communitySlug);
    }

    public function attachQuery(string $communitySlug)
    {
        $user = GlobalHelper::getUser();
        $community = Community::whereSlug($communitySlug)->first();
        $fetchResult = Community::whereSlug($this->communitySlug)->with('media')->with([
            'members' => function ($query) use ($user) {
                $query->select('community_id')
                    ->where('user_id', $user?->id);
            }
        ])->withCount(['members', 'listings'])->first();

        $fetchResult->isJoined = $fetchResult->members->isNotEmpty();
        unset($fetchResult->members);
        $this->community = $fetchResult;
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

    public function render()
    {
        return view('livewire.frontend.community.community-detail');
    }
}
