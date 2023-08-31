@php
    use App\Enums\ProductListingTypesEnum;
    use App\Helpers\GlobalHelper;

    $logedInCustomer = GlobalHelper::getCustomer();
@endphp
<div>
    @if($logedInCustomer)
        @if(count($homeCommunityListings) > 0)
            <div class="mt-7 mt-md-10">
                <div class="container">
                    <div class="d-flex align-items-baseline gap-5 mb-7 mb-md-10">
                        <div class="fw-normal text-dark section-heading">
                        <span class="text-primary fw-bolder">
                            {{$homeCommunity->short_name}}
                        </span>
                        </div>
                        <span class="text-gray-300"> | </span>
                        <div class="fw-normal view-all-btn"><a class="text-black" href="{{route('listings')}}">View
                                All</a></div>
                    </div>
                    <div class="owl-carousel-wrapper">
                        <div class="owl-carousel carousel-community-products owl-theme">
                            @foreach($homeCommunityListings as $homeCommunityListing)
                                <div class="item">
                                    @if($homeCommunityListing->listing_type === ProductListingTypesEnum::SELL->value)
                                        @livewire('frontend.standard.single-standard-item', ['listing' => $homeCommunityListing])
                                    @else
                                        @livewire('frontend.auction.single-auction-item', ['listing' => $homeCommunityListing])
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
