@php
    use App\Enums\ProductListingTypesEnum;
@endphp
<div>
    @if(count($nearByYouListings) > 0)
        <div class="mt-7 mt-md-10">
            <div class="container">
                <div class="d-flex align-items-baseline gap-5 mb-7 mb-md-10">
                    <div class="fw-normal text-dark section-heading"><span class="text-primary fw-bolder">Near</span> By
                        You
                    </div>
                    <span class="text-gray-300"> | </span>
                    <div class="fw-normal view-all-btn"><a class="text-black" href="{{route('listings')}}">View All</a>
                    </div>
                </div>
                <div class="owl-carousel-wrapper">
                    <div class="owl-carousel carousel-nearby owl-theme">
                        @foreach($nearByYouListings as $nearByYouListing)
                            <div class="item h-100">
                                @if($nearByYouListing->listing_type === ProductListingTypesEnum::SELL->value)
                                    @livewire('frontend.standard.single-standard-item', ['listing' => $nearByYouListing])
                                @else
                                    @livewire('frontend.auction.single-auction-item', ['listing' => $nearByYouListing])
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
