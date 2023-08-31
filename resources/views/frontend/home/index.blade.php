@php
    use App\Enums\MediaDirectoryNamesEnum;
    use App\Enums\ProductListingTypesEnum;
    use App\Helpers\GlobalHelper;
    use App\Enums\RolesEnum;

    $logedInCustomer = GlobalHelper::getUser();
    $logedInCustomerProfilePic = GlobalHelper::getProfilePic();
@endphp
@extends('frontend.layouts.master')
@section('title','Electronics, Cars, Fashion, Collectibles & More | Dealfair')
@section('content')
    <div id="home">
        <div class="bgi-size-cover bgi-position-center"
             style="background-image: url('{{asset('assets/media/DealfairBanner-09.jpg')}}')">
            <div class="min-h-150px min-h-md-200px min-h-lg-300px py-5 px-2 d-flex align-items-center justify-content-center">
                <div class="min-w-md-500px">
                    <div class="text-center"
                         style="font-weight: 800; color: white; font-size: 1.75rem; letter-spacing: 1px;">Find Best
                        Products Now On <br> Your Finger Tips
                    </div>
                </div>
            </div>
        </div>
        <div class="container dealfair-category-home">
            <div class="row flex-nowrap flex-lg-wrap gap-2 justify-content-lg-center mx-2 mx-lg-0"
                 style="overflow: auto">
                @foreach($categories as $category)
                    <div class="col-4 col-md-2">
                        <a href="{{route('category.details',$category->slug)}}">
                            <div class="h-100 align-items-center row bg-white px-2 py-2 border border-2 rounded-3">
                                <div class=" d-flex justify-content-center">
                                    <img
                                        src="{{ $category->image_url}}"
                                        onerror="this.onerror=null;this.src='{{asset('assets/media/svg/files/blank-image.svg') }}';"
                                        class="w-50px w-lg-70px h-auto object-contain" alt="{{$category->name}}">
                                </div>
                                <div
                                    class="text-center text-black fw-semibold df-fs-12 text-wrap mt-2">{{$category->name}}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-4 col-md-2">
                    <a href="{{route('categories')}}">
                        <div class="h-100 align-items-center row bg-white px-2 py-2 border border-2 rounded-3">
                            <div class=" d-flex justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#5D6EB3"
                                     class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                    <path fill-rule="evenodd"
                                          d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg>
                            </div>
                            <div class="text-center text-black fw-semibold df-fs-12 text-wrap mt-2">All Categories</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--begin::Live Auction Section-->
    @livewire('frontend.home-page.live-auction-section')
    <!--end::Live Auction Section-->

    <!--begin::Store Section-->
    @if(count($stores) > 0)
    <div class="mt-7 mt-md-10">
        <div class="container">
            <div class="d-flex align-items-baseline gap-5 mb-7 mb-md-10">
                <div class="fw-normal text-dark section-heading"><span class="text-primary fw-bolder">Stores</span>
                </div>
                <span class="text-gray-300"> | </span>
                <div class="fw-normal view-all-btn"><a class="text-black" href="{{route('stores')}}">View All</a></div>
            </div>
            <div class="row g-3 g-md-4">
                @foreach($stores as $store)
                    <div class="col-6 col-md-2">
                        <a href="{{route('store.details',$store->slug)}}">
                            <div class="card" style="border: 2px solid #f6f6f6">
                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px bg-gray-200 rounded-2">
                                    <img class="store-cover-image" src="{{$store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_THUMBNAIL->value) ? $store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_THUMBNAIL->value) : asset('assets/media/svg/files/blank-image.svg')}}" alt="">
                                </div>
                                <div class="pt-1 pb-3 px-3 lh-lg">
                                    <div class="d-flex justify-content-center" style="margin-top: -21px;">
                                        <div class="brand-logo position-relative bg-white">
                                            <img src="{{ $store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_LOGO->value) ? $store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_LOGO->value) : asset('assets/media/svg/files/blank-image.svg') }}" alt=""/>
                                        </div>
                                    </div>
                                    <div class="product-title text-center my-2">
                                        <a href="{{route('store.details',$store->slug)}}" class="text-dark fw-bolder" style="font-size: 15px;">{{$store->store_name}}</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!--end::Store Section-->

    <!--begin::Nearby Products Section-->
    @livewire('frontend.home-page.near-by-you-section')
    <!--end::Nearby Products Section-->

    <!--begin::Community name Products Section-->
    @livewire('frontend.home-page.home-community-section')
    <!--end::Community name Products Section-->

    <!--begin::Recently added Products Section-->
    @livewire('frontend.home-page.recently-added-section')
    <!--end::Recently added Products Section-->

    <!--begin::Recently viewed Products Section-->
    @livewire('frontend.home-page.recently-viewed-section')
    <!--end::Recently viewed Products Section-->

    <!-- Community cards new design -->
    <div class="my-7 my-md-10">
        <div class="container">
            <div class="d-flex align-items-baseline gap-5 mb-7 mb-md-10">
                <div class="fw-normal text-dark section-heading"><span class="text-primary fw-bolder">Communities</span>
                    We Serve
                </div>
                <span class="text-gray-300"> | </span>
                <div class="fw-normal view-all-btn"><a class="text-black" href="{{route('communities')}}">View All</a>
                </div>
            </div>
            <div class="d-none d-lg-block">
                <div class="row g-3 g-lg-5">
                    @foreach($communities as $index => $community)
                        <div class="col-md-3">
                            @livewire('frontend.community.single-community-item',['community' => $community, 'listingWithoutCommunityCount' => $listingWithoutCommunityCount], key(time().'_'.$index.'_'.$community->id))
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-block d-lg-none">
                <div class="owl-carousel-wrapper">
                    <div class="owl-carousel carousel-community owl-theme">
                        @foreach($communities as $index => $community)
                            <div class="item">
                                @livewire('frontend.community.single-community-item',['community' => $community, 'listingWithoutCommunityCount' => $listingWithoutCommunityCount],key(time().'_'.$index.'_'.$community->id))
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="getApp">
        <div class="mt-17 " style="background-color: #efefef">
            <div class="container">
                <div class="row ">
                    <div class="col-12 col-md-5 col-lg-6">
                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('assets/media/slider-screens/Accounts.jpg') }}"
                                         class="d-block w-100 rounded-4" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/media/slider-screens/Available balance.jpg') }}"
                                         class="d-block w-100 rounded-4" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/media/slider-screens/Buyer Dashboard.jpg') }}"
                                         class="d-block w-100 rounded-4" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/media/slider-screens/communities.jpg') }}"
                                         class="d-block w-100 rounded-4" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/media/slider-screens/Chats.jpg') }}"
                                         class="d-block w-100 rounded-4" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-6 d-block d-md-flex">
                        <div class="d-flex px-4 px-lg-14 my-auto justify-content-center justify-content-md-start">
                            <div>
                                <h4 class="fs-3hx fw-bold text-black mb-3" id="dealfair-get-app"><span
                                        class="text-primary fw-bolder">Get</span>
                                    The App.</h4>
                                <h1 class="text-black fs-2hx fw-normal" id="dealfair-sell-buy">The People's Marketplace
                                </h1>
                                <div class="d-flex pt-4 pt-md-8 justify-content-center justify-content-md-start">
                                    <a class="bg-black d-flex align-items-center justify-content-center p-3 app-store-btn"
                                       href="#">
                                        <i class="bi bi-apple"></i>
                                        <div class="txt">Available on the <br/> <span>App Store</span></div>
                                    </a>
                                    <a class="bg-black d-flex align-items-center justify-content-center p-3 app-store-btn"
                                       href="#">
                                        <img src="{{ asset('assets/media/playstore.svg') }}" alt="">
                                        <div class="txt">Available on the <br/> <span>Google Play</span></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('assets/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/js/home-page-carousel.js')}}"></script>
@endpush
