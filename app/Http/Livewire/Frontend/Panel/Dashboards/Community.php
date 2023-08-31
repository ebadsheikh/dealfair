<?php

namespace App\Http\Livewire\Frontend\Panel\Dashboards;

use App\Actions\CommunityMember\RemoveMemberFromCommunityAction;
use App\Helpers\GlobalHelper;
use Illuminate\Support\Collection;
use Livewire\Component;

class Community extends Component
{
    /**
     * Declare a public property $searchZip
     * @var string
     */
    public string $searchZip;

    /**
     * Declare a public property $searchType
     * @var string
     */
    public string $searchType;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchZip = '';
        $this->searchType = '';
    }


    /**
     * Retrieve a collection of communities filtered by search criteria.
     *
     * @return ?Collection
     */
    public function getCommunities(): ?Collection
    {
        $user  = GlobalHelper::getUser();

        $communitiesQuery = $user->communities()->when($this->searchZip != '', function ($query) {
            $query->where('zip', 'like', '%' . $this->searchZip . '%');
        })->when($this->searchType != '' && $this->searchType === "recentJoins", function ($query) {
            $query->where('community_members.created_at', '>=', now()->subDay());
        })->when($this->searchZip != '' && $this->searchType === "mostActive", function ($query) {
            $query->withCount('products')->orderByDesc('products_count');
        });

        $communities = $communitiesQuery->get();

        return $communities;
    }

    /**
     * Leave the community with the given ID.
     *
     * @param int $communityId
     * @return void
     */
    public function leaveCommunity(int $communityId): void
    {
        $user = GlobalHelper::getUser();
        (new RemoveMemberFromCommunityAction())->handle($communityId, $user->id);
    }


    public function render()
    {
        return view('livewire.frontend.panel.dashboards.community')->with('communities', $this->getCommunities());
    }
}
