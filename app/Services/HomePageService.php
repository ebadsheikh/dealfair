<?php

namespace App\Services;

use App\Helpers\GlobalHelper;
use App\Models\Community;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Store;

class HomePageService
{
    public function getHomePageSectionsQueries(): array
    {
        $logedInCustomer = GlobalHelper::getCustomer();

        $data = [];

        $data['categories'] = Category::whereNull('category_id')
            ->take(8)
            ->get();

        $data['stores'] = Store::whereHas('listings')->take(8)->get();

        $data['communities'] = Community::with('media')
            ->withCount(['members', 'listings'])
            ->with([
                'members' => function ($query) use ($logedInCustomer) {
                    $query->select('community_id')
                        ->where('user_id', $logedInCustomer?->id);
                }
            ])
            ->orderBy('listings_count', 'DESC')
            ->take(4)->get();

        foreach ($data['communities'] as $community) {
            $community['isJoined'] = $community->members->isNotEmpty();
            unset($community->members);
        }

        $data['listingWithoutCommunityCount'] = Listing::doesntHave('communities')->count();

        return $data;
    }
}
