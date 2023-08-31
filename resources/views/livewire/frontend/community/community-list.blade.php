<div class="col-lg-9">
    <div class="bg-white rounded-3 p-3 p-md-5">
        <div wire:loading.delay wire:loading.class="d-flex justify-content-center" wire:loading.target="selected">
            <div class="px-3 p-loader">
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
        <div class="row g-2 g-md-4 g-xl-3" wire:loading.remove>
            @forelse($communities as $index => $community)
                <div class="col-6 col-md-4 col-xxl-3">
                    @livewire('frontend.community.single-community-item',['community' => $community,'listingWithoutCommunityCount' => $listingWithoutCommunityCount],key(time().'_'.$index.'_'.$community->id))
                </div>
            @empty
                <div class="d-flex justify-content-center">
                    <div class="px-3 py-10 py-md-15">
                        <img class="d-flex justify-content-center mx-auto df-data-nf-svg"
                             src="https://s3.us-east-2.amazonaws.com/dealfair.app/dataNotFoundImages/CommunityNotFound.svg"
                             alt="">
                        <div class="d-flex justify-content-center">
                            <div class="text-center">
                                <div style="font-size:2.5rem;font-weight:700;">
                                    SORRY!
                                </div>
                                <div class="text-muted" style="font-size:16px; font-weight: 600">
                                    The community you're looking for can't be found!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        @if($communities->hasMorePages())
            <div x-data="{
                    isLoading: false,
                    observe(){
                        const observer = new IntersectionObserver((communities) => {
                            communities.forEach(community => {
                                if(community.isIntersecting){
                                    this.isLoading = true;
                                    @this.loadMore()
                                }
                            })
                        })
                        observer.observe(this.$el)
                    }
                }" x-init="observe">
                <div class="px-3" @if($communities->currentPage() > 1) x-show="isLoading" @endif>
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
