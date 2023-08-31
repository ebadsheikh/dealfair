@php
    use App\Helpers\GlobalHelper;
    use App\Enums\MediaDirectoryNamesEnum;
@endphp
<div class="card position-relative pt-30 bgi-size-cover bgi-position-center"
         style="background-image: url('{{$community->getFirstMediaUrl(MediaDirectoryNamesEnum::COMMUNITY_IMAGES->value) ? $listing->getFirstMediaUrl(MediaDirectoryNamesEnum::COMMUNITY_IMAGES->value) : asset('assets/media/svg/files/blank-image.svg')}}')">
    <div class="card-img-overlay"></div>
    <div class="z-index-2 p-community">
        <div class="text-center">
            <div class="text-white cc-location fw-bold">{{$community->short_name}}</div>
            <div class="text-white cc-zip fs-5 fw-bold">{{$community->zip}}</div>
        </div>
        <div class="px-2 px-md-10 px-lg-2 py-5 d-flex  justify-content-between">
            <div class="cc-item-list">
                <div class="text-white">Members</div>
                <div class="text-center text-white">{{GlobalHelper::formatCount($community->members_count)}}</div>
            </div>
            <div class="cc-item-list">
                <div class="text-white">Listings</div>
                <div class="text-center text-white">{{GlobalHelper::formatCount(($community->listings_count + $listingWithoutCommunityCount))}}</div>
            </div>
            <div class="cc-item-list">
                <div class="text-white">Earnings</div>
                <div class="text-center text-white">$0</div>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-4 px-5 cc-buttons">
            <a href="{{route('community.details', $community->slug)}}" class="bg-primary rounded-2 border-0 text-white px-5 px-md-8 py-1 ls-1" type="button">
                View
            </a>
            @if ($community->isJoined)
                <button wire:click.prevent="leaveCommunity({{ $community->id }})"
                        class="bg-danger rounded-2 border-0 text-white px-5 px-md-8 py-1 ls-1"
                        type="button">
                    Leave
                </button>
            @else
                <button wire:click.prevent="joinCommunity({{ $community->id }})"
                        class="bg-primary rounded-2 border-0 text-white px-5 px-md-8 py-1 ls-1"
                        type="button">
                    Join
                </button>
            @endif
        </div>
    </div>
</div>
