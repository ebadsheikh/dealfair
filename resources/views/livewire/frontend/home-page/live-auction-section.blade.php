@if(count($listings) > 0)
    <div class="mt-7 mt-md-10">
        <div class="container">
            <div class="d-flex align-items-baseline gap-5 mb-7 mb-md-10">
                <div class="fw-normal text-dark section-heading"><span class="text-primary fw-bolder">Live </span>
                    Auction
                </div>
                <span class="text-gray-300"> | </span>
                <div class="fw-normal view-all-btn"><a class="text-black" href="{{route('listings')}}">View All</a></div>
            </div>
            <div class="owl-carousel-wrapper">
                <div class="owl-carousel carousel-auction owl-theme">
                    @foreach($listings as $index => $listing)
                        <div class="item h-100">
                            @livewire('frontend.auction.single-auction-item',['listing' => $listing],key(time().'_'.$index.'_'.$listing->id))
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
