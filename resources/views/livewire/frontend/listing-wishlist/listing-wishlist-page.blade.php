@php
    use App\Enums\ProductListingTypesEnum;
@endphp
<div>
    <div class="py-10">
        <div class="container py-10 px-3">
            <div class="row g-4">
                @forelse($listingWishlists as $index => $listingWishlist)
                    <div class="col-6 col-md-4 col-xl-3">
                        <div class="item">
                            @if($listingWishlist->listing->listing_type === ProductListingTypesEnum::SELL->value)
                                @livewire('frontend.standard.single-standard-item', ['listing' => $listingWishlist->listing],key(time().'_'.$index.'_'.$listingWishlist->listing->id))
                            @else
                                @livewire('frontend.auction.single-auction-item', ['listing' => $listingWishlist->listing],key(time().'_'.$index.'_'.$listingWishlist->listing->id))
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-3 p-3 p-md-5">
                        <div class="d-flex justify-content-center">
                            <div class="px-3 py-10 py-md-15">
                                <img class="d-flex justify-content-center mx-auto df-data-nf-svg"
                                     src="https://s3.us-east-2.amazonaws.com/dealfair.app/dataNotFoundImages/EmptyWishlist.svg" alt="">
                                <div class="d-flex justify-content-center">
                                    <div class="text-center">
                                        <div style="font-size:2.5rem;font-weight:700;">
                                            OH NO!
                                        </div>

                                        <div class="text-muted" style="font-size:12px; font-weight: 600">
                                            Your wishlist is empty! <br> Fill it with goodies and bring joy to your shopping journey.
                                        </div>
                                        <a class="btn btn-sm btn-primary text-center text-uppercase mt-3" href="{{route('home')}}">Go to Homepage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        @if($listingWishlists->hasMorePages())
            <div x-data="{
                    isLoading: false,
                    observe(){
                        const observer = new IntersectionObserver((listingWishlists) => {
                            listingWishlists.forEach(listingWishlist => {
                                if(listingWishlist.isIntersecting){
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
