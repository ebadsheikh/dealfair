@php
    use App\Enums\MediaDirectoryNamesEnum;
@endphp
<div>
    <div class="container mb-5 my-md-6">
        <div class="bg-white rounded-4 p-5 p-md-8 ">
            <div class="d-flex justify-content-end d-md-none mb-4">
                @if ($community->isJoined)
                    <button wire:click.prevent="leaveCommunity({{ $community->id }})"
                            class="btn btn-sm btn-danger me-2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg>
                        <span class="ms-2">Leave</span>
                    </button>
                @else
                    <button wire:click.prevent="joinCommunity({{ $community->id }})"
                            class="btn btn-sm btn-primary me-2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg>
                        <span class="ms-2">Join</span>
                    </button>
                @endif
            </div>
            <div class="row gx-3 gx-md-4 gx-lg-6">
                <div class="col-4 col-md-2 ">
                    <img class="rounded-3 shadow df-cps-img"
                         src="{{$community->getFirstMediaUrl(MediaDirectoryNamesEnum::COMMUNITY_IMAGES->value) ? $listing->getFirstMediaUrl(MediaDirectoryNamesEnum::COMMUNITY_IMAGES->value) : asset('assets/media/svg/files/blank-image.svg')}}"
                         alt="image"/>
                </div>
                <div class="col-8 col-md-10">
                    <div class="d-md-flex justify-content-md-between align-items-start">
                        <div>
                            <div class="text-gray-900 fs-2 fw-bold">{{$community->short_name}}</div>
                            <div class="mb-4">
                                <div class="text-gray-900 df-fs-14"><span class="fw-bold">Zipcode</span>
                                    : {{$community->zip}}</div>
                            </div>
                        </div>
                        <div class="d-none d-md-flex my-4">
                            @if ($community->isJoined)
                                <button wire:click.prevent="leaveCommunity({{ $community->id }})"
                                        class="btn btn-sm btn-danger me-2" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                         class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                    </svg>
                                    <span class="ms-2">Leave</span>
                                </button>
                            @else
                                <button wire:click.prevent="joinCommunity({{ $community->id }})"
                                        class="btn btn-sm btn-primary me-2" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                         class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                    </svg>
                                    <span class="ms-2">Join</span>
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex" style="overflow-x: scroll">
                        <div class="border border-gray-300 border-dashed rounded w-auto min-w-md-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <span class="svg-icon svg-icon-3 svg-icon-success me-2  text-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                              transform="rotate(90 13 6)" fill="currentColor"/>
                                        <path
                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                            fill="currentColor"/>
                                    </svg>
                                </span>
                                <div class="fs-2 fw-bold" data-kt-countup="true"
                                     data-kt-countup-value="{{$community->members_count}}">
                                    {{GlobalHelper::formatCount($community->members_count)}}
                                </div>
                            </div>
                            <div class="fw-semibold fs-6 text-gray-400 text-nowrap">Members</div>
                        </div>
                        <div
                            class="border border-gray-300 border-dashed rounded w-auto min-w-md-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                              transform="rotate(90 13 6)"
                                              fill="currentColor"/>
                                        <path
                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                            fill="currentColor"/>
                                    </svg>
                                </span>
                                <div class="fs-2 fw-bold" data-kt-countup="true"
                                     data-kt-countup-value="{{($community->listings_count + $listingWithoutCommunityCount)}}">
                                    {{GlobalHelper::formatCount(($community->listings_count + $listingWithoutCommunityCount))}}
                                </div>
                            </div>
                            <div class="fw-semibold fs-6 text-gray-400 text-nowrap">Listings</div>
                        </div>
                        <div
                            class="border border-gray-300 border-dashed rounded w-auto min-w-md-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                              transform="rotate(90 13 6)"
                                              fill="currentColor"/>
                                        <path
                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                            fill="currentColor"/>
                                    </svg>
                                </span>
                                <div class="fs-2 fw-bold" data-kt-countup="true"
                                     data-kt-countup-value="0"
                                     data-kt-countup-prefix="$">$0
                                </div>
                            </div>
                            <div class="fw-semibold fs-6 text-gray-400 text-nowrap">Earnings</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-10">
        <div class="row">

            @livewire('frontend.listing.listing-filter-siderbar')
            @livewire('frontend.listing.listing-list', ['communitySlug' => $community->slug])

        </div>
    </div>
</div>
