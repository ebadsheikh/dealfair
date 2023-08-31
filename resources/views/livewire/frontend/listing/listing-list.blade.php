@php
    use App\Enums\ProductListingTypesEnum;
@endphp
<div class="col-lg-9">
    <div class="bg-white rounded-3 p-3 p-md-5">
        <div class="row g-2 g-md-4 g-xl-3">
            @forelse($listings as $index => $listing)
                <div class="col-6 col-md-4 col-xxl-3">
                    <div class="item">
                        @if($listing->listing_type === ProductListingTypesEnum::SELL->value)
                            @livewire('frontend.standard.single-standard-item', ['listing' => $listing],key(time().'_'.$index.'_'.$listing->id))
                        @else
                            @livewire('frontend.auction.single-auction-item', ['listing' => $listing],key(time().'_'.$index.'_'.$listing->id))
                        @endif
                    </div>
                </div>
            @empty
                <div class="d-flex justify-content-center">
                    <div class="px-3 py-10 py-md-15">
                        <img class="d-flex justify-content-center mx-auto df-data-nf-svg"
                             src="https://s3.us-east-2.amazonaws.com/dealfair.app/dataNotFoundImages/ProductNotFound.svg"
                             alt="Dealfair Product Not Found">
                        <div class="d-flex justify-content-center">
                            <div class="text-center">
                                <div style="font-size:2.5rem;font-weight:700;">
                                    SORRY!
                                </div>
                                <div class="text-muted" style="font-size:12px; font-weight: 600">
                                    The listing you're looking for can't be found!
                                </div>
                                <a class="btn btn-sm btn-primary text-center text-uppercase mt-3"
                                   href="{{route('seller.create.listing')}}">List an item</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        @if($listings->hasMorePages())
            <div x-data="{
                    isLoading: false,
                    observe(){
                        const observer = new IntersectionObserver((listings) => {
                            listings.forEach(listing => {
                                if(listing.isIntersecting){
                                    this.isLoading = true;
                                    @this.loadMore()
                                }
                            })
                        })
                        observer.observe(this.$el)
                    }
                }" x-init="observe">
                <div class="px-3" x-show="isLoading">
                    <div class="d-flex justify-content-center gap-2">
                        <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
