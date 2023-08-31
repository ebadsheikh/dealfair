@php
    use App\Enums\ProductListingTypesEnum;
    use App\Helpers\GlobalHelper;

    $logedInCustomer = GlobalHelper::getCustomer();
@endphp
<div>
    @if($logedInCustomer)
        @if(count($recentlyViewedListings) > 0)
            <div class="mt-7 mt-md-10">
                <div class="container">
                    <div class="d-flex align-items-baseline gap-5 mb-7 mb-md-10">
                        <div class="fw-normal text-dark section-heading">
                            <span class="text-primary fw-bolder">Recently</span>
                            Viewed
                        </div>
                        <span class="text-gray-300"> | </span>
                        <div class="fw-normal view-all-btn">
                            <a class="text-black" href="{{route('listings')}}">
                                View All
                            </a>
                        </div>
                    </div>
                    <div class="owl-carousel-wrapper">
                        <div class="owl-carousel carousel-recently-viewed owl-theme">
                            @foreach($recentlyViewedListings as $recentlyViewedListing)
                                <div class="item">
                                    @if($recentlyViewedListing->listing->listing_type === ProductListingTypesEnum::SELL->value)
                                        @livewire('frontend.standard.single-standard-item', ['listing' => $recentlyViewedListing->listing])
                                    @else
                                        @livewire('frontend.auction.single-auction-item', ['listing' => $recentlyViewedListing->listing])
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
