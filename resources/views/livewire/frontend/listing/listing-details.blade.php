@php
    use App\Enums\MediaDirectoryNamesEnum;
    use App\Enums\ProductConditionsEnum;
    use App\Enums\ProductListingTypesEnum;
    use App\Enums\ProductShippingCostPayerEnum;
@endphp
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/X-Zoom/assets/css/xzoom.min.css')}}">
    <style>
        .xzoom_part {
            padding-top: 50px;
        }

        .xzoom_container {
            margin: 0px 10px;
        }

        .xzoom-thumbs {
            margin: 10px 0;
        }

        .xzoom {
            height: auto;
            width: 100%;
            box-shadow: 1px 4px 8px #aaa;
        }

        .xzoom-gallery {
            border: 1px solid #aaa;
            height: 55px;
            width: 55px;
        }

        .xzoom-gallery:hover {
            border: 1px solid #378bbf;
        }

        .xzoom-lens {
            cursor: zoom-in;
        }
    </style>
@endpush
<div>
    <div class="container p-lg-0 mb-6">
        <div class="row g-4 mb-2">
            <div class="col-md-9">
                <div class="bg-white rounded-4 py-5 px-3 h-100 custom-box-shadow">
                    <div class="row">
                        <div class="col-md-6 position-relative position-lg-static">
                            <div class="d-block d-lg-none">
                                <a href="#liveBid"
                                   class="btn btn-sm btn-primary live-bid scroll-link position-absolute top-0 z-index-3"
                                   style="right: 20px">Live Bid</a>
                            </div>
                            <div wire:ignore>
                                <div class="xzoom_container">
                                    <img
                                        src="{{$listing->getFirstMediaUrl(MediaDirectoryNamesEnum::PRODUCT_IMAGES->value) ? $listing->getFirstMediaUrl(MediaDirectoryNamesEnum::PRODUCT_IMAGES->value) : asset('assets/media/svg/files/blank-image.svg') }}"
                                        alt="" class="xzoom" id="xzoom-default">
                                    <div class="xzoom-thumbs">
                                        @foreach ($listing->getMedia(MediaDirectoryNamesEnum::PRODUCT_IMAGES->value) as $image)
                                            <a href="{{ asset($image->getUrl()) }}">
                                                <img src="{{ asset($image->getUrl()) }}" alt="" class="xzoom-gallery"
                                                     width="80" xpreview="{{ asset($image->getUrl()) }}">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between gap-2 align-items-start mt-4 mt-lg-2">
                                <div class="df-sp-title">{{ $listing->title }}</div>
                                <div wire:click.prevent="toggleWishlist('{{$listing->slug}}')" class="col-1 like mt-1 d-flex justify-content-end">
                                    <i class="{{$listing->isInWishlist ? 'fas' : 'far'}} fa-heart"></i>
                                </div>
                            </div>

                            @include('livewire.frontend.listing.listing-price',['listing' => $listing])

                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-3">
                                        <p class="text-gray-600 fw-semibold fs-5">Color:</p>
                                    </div>
                                    <div class="col-9">
                                        <ul class="list-unstyled">
                                            <li class="rounded-circle product-color"
                                                style="background-color: {{ $listing->color }}"></li>
                                        </ul>
                                    </div>
                                </div>
                                @if($listing->shipping_cost_payer === ProductShippingCostPayerEnum::ME->value)
                                    <div class="row align-items-center mb-2">
                                        <div class="col-3">
                                            <div class="text-gray-600 fw-semibold fs-5">Shipping:</div>
                                        </div>
                                        <div class="col-9">
                                            <div class="d-flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                     fill="#5D6EB3"
                                                     class="bi bi-truck" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                                </svg>
                                                <div class="text-black fw-normal ms-3">Free Shipping</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row align-items-center mb-2">
                                    <div class="col-3">
                                        <div class="text-gray-600 fw-semibold fs-5">Brand:</div>
                                    </div>
                                    <div class="col-9">
                                        <div class="text-black">{{ $listing->brand }}</div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-3">
                                        <div class="text-gray-600 fw-semibold fs-5">Category:</div>
                                    </div>
                                    <div class="col-9">
                                        <div class="text-black">{{$listing->category->name}}</div>
                                    </div>
                                </div>
                                @include('livewire.frontend.listing.listing-conditions', ['listing' => $listing])
                                <div class="row align-items-center mb-2">
                                    <div class="col-3">
                                        <div class="text-gray-600 fw-semibold fs-5">Posted:</div>
                                    </div>
                                    <div class="col-9">
                                        <div class="text-black">{{ $listing->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                                <div class="text-dark fw-semibold df-fs-14 mb-1">
                                    <a href="#product_details" class="scroll-link">
        <span class="me-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
             fill="currentColor" class="bi bi-chevron-double-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            <path fill-rule="evenodd"
                  d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
        </svg>
    </span>
                                        See more details about listing
                                    </a>
                                </div>
                                <div class="text-dark fw-semibold df-fs-14 mb-1">
                                    <a href="#seller" class="scroll-link">
    <span class="me-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person"
             viewBox="0 0 16 16">
            <path
                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
        </svg>
    </span>
                                        About seller
                                    </a>
                                </div>
                                <div class="text-primary fw-semibold df-fs-14 mb-1">
                                    <a href="{{ route('report.listing') }}" class="cursor-pointer">
                                        <span class="me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                                            <path
                                                d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z"/>
                                            </svg>
                                        </span>
                                        Report about this Listing
                                    </a>
                                </div>
                                <div class="d-block mt-3">
                                    @if ($listing->listing_type != ProductListingTypesEnum::AUCTION->value)
                                        <a href="#"
                                           class="btn btn-sm btn-primary text-center text-uppercase d-flex justify-content-center align-items-center">
                                            Buy Now
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="liveBid" class="col-md-3">
                <div class="position-relative bg-white rounded-4 py-5 px-2 h-100 custom-box-shadow">
                    @if($listing->listing_type != ProductListingTypesEnum::SELL->value)
                        <div class="ms-0 fs-5 fw-bold text-primary pb-1 ">Live Bid</div>
                    @endif
                    {{--                    <div class="bg-warning position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">--}}
                    {{--                         <h1>Winner!!</h1>--}}
                    {{--                    </div>--}}
                    @if($listing->listing_type != ProductListingTypesEnum::SELL->value)
                        <div class="position-relative pb-10 " style="height: 28.25rem; overflow-y: auto;">
                            <div class="position-sticky top-0 right-0"
                                 style="width: 100%;left: 0; z-index: 95;">
                                <div class="d-flex justify-content-between align-items-center bg-gray-100 p-2">
                                    <div
                                        class="fw-bold fs-df-13">{{$lastBid ? ($listing->auction_end < \Carbon\Carbon::now() ? 'Winner '.$lastBid->bidder->display_name.'on price '. GlobalHelper::formatPrice($lastBid->bid_price) : 'Last Bid '. GlobalHelper::formatPrice($lastBid->bid_price)) : 'Bid Start From '. GlobalHelper::formatPrice($listing->starting_bid)}}
                                    </div>

                                    <div wire:key="{{rand()}}">
                                        @if($listing->auction_end != null && $listing->auction_end > \Carbon\Carbon::now())
                                            <div class="d-flex gap-1"
                                                 x-data="countdown('{{ $listing->auction_end }}')"
                                                 x-init="init()">
                                                <h6 class="p-2 bg-white shadow-sm rounded-3"
                                                    x-text="minutes()"></h6>
                                                <h6 class="p-2 bg-white shadow-sm rounded-3"
                                                    x-text="seconds()"></h6>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @forelse($listing->bids as $listingBid)
                                <div class="d-flex align-items-start mt-3 pe-2">
                                    <div class="symbol symbol-35px symbol-circle me-3">
                                        <img
                                            src="{{ $listingBid->bidder->getFirstMediaUrl(MediaDirectoryNamesEnum::PROFILE_IMAGES->value) ? $listingBid->bidder->getFirstMediaUrl(MediaDirectoryNamesEnum::PROFILE_IMAGES->value) : asset('assets/media/avatars/blank.png') }}"
                                            alt=""/>
                                    </div>
                                    <div>
                                        <a href="#"
                                           class="fw-bolder text-dark">{{$listingBid->bidder->display_name}}</a>
                                        <span
                                            class="ms-2">{{GlobalHelper::formatPrice($listingBid->bid_price)}}</span>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        @if($listing->auction_end == null || $listing->auction_end > \Carbon\Carbon::now())
                            <div class="input-group position-absolute bottom-0 right-0" style="left: 0;">
                                <input wire:model="bidPrice" type="text" class="form-control"
                                       style="border-radius: 0 0 0 1rem;"
                                       placeholder="Enter bid here..">
                                <button type="button" wire:click="bidNow({{$listing}})"
                                        style="border-radius: 0 0 1rem 0;"
                                        class="input-group-text bg-primary text-white"
                                        id="basic-addon2">Bid Now
                                </button>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <section class="container p-lg-0" id="product_details">
        <div class="col-md-12 bg-white rounded-4 p-5 custom-box-shadow mb-6">
            <div class="fs-2 fs-lg-2x text-black fw-bold">Listing Details</div>
            <div class="px-2 py-8">
                <p class="df-fs-14" style="word-wrap: break-word">{!! nl2br($listing->description) !!}.</p>
                <h4>Tags</h4>
                <div class="my-3">
                    @foreach ($listing->listingTags as $item)
                        <span class="badge bg-dark ">
<a class="text-white fw-light" href="#">
{{ $item->tag }}
</a>
</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="container p-lg-0" id="seller">
        <div class="col-md-12 bg-white rounded-4 p-5 p-xl-8 custom-box-shadow mb-6">
            <div class="fs-2 fs-lg-2x text-black fw-bold">Seller Details</div>
            <div class="row gx-3 gx-md-4 gx-lg-6 py-5">
                <div class="col-4 col-md-2 ">
                    <img class="rounded-3 shadow df-cps-img"
                         src="{{asset('assets/media/products/10.png')}}"
                         alt="image"/>
                </div>
                <div class="col-8 col-md-10">
                    <div class="d-md-flex justify-content-md-between align-items-start">
                        <div>
                            <div class="text-gray-900 fs-2 fw-bold">Seller OR Store name</div>
                            <div class="d-flex mt-3" style="overflow-x: scroll">
                                <div
                                    class="border border-gray-300 border-dashed rounded w-auto min-w-md-125px py-3 px-4 me-6 mb-3">
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
                                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="13">13
                                        </div>
                                    </div>
                                    <div class="fw-semibold fs-6 text-gray-400 text-nowrap">Followers</div>
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
                                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="30">30
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
                        <div class="d-none d-md-flex flex-md-column gap-2">
                            <button class="btn btn-sm btn-primary me-2" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                </svg>
                                <span class="ms-2">Follow</span>
                            </button>
                            <button class="btn btn-sm btn-primary me-2" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-chat-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
                                </svg>
                                <span class="ms-2">Chat Now</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-3 gx-md-4 gx-lg-6">
                <div class="col-md-3 px-2 py-5">
                    <div class="d-flex justify-content-between mb-2">
                        <div class="text-gray-600 fw-semibold df-fs-13">Positive seller ratings
                        </div>
                        <div class="fw-bold fs-4">95%</div>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <div class="text-gray-600 fw-semibold df-fs-13">Ship On Time</div>
                        <div class="fw-bold fs-4">100%</div>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <div class="text-gray-600 fw-semibold df-fs-13">Chat Response Rate</div>
                        <div class="fw-bold fs-4">80%</div>
                    </div>
                </div>
                <div class="col-md-9 p-4 px-lg-8">
                    <div class="text-gray-900 fs-2 fw-bold">Seller OR Store name</div>
                    <div class="d-flex align-items-start mt-5">
                        <div class="symbol symbol-35px symbol-circle me-3">
                            <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                        </div>
                        <div>
                            <a href="../../demo1/dist/pages/profile/overview.html">
                                <p class="fw-bolder fs-5 text-dark mb-0">Chris Morgan</p>
                            </a>
                            <p class="my-1 df-fs-14">Purchased to use for laundry and it works great for that.</p>
                            <div class="mt-3">
                                <a href="#" class="text-decoration-underline text-gray-800">Kids Tablet Pc 7 Inch
                                    Android 11 3gb Ram 32gb Storage Free Case Wifi Dual Camera</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mt-5">
                        <div class="symbol symbol-35px symbol-circle me-3">
                            <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                        </div>
                        <div>
                            <a href="../../demo1/dist/pages/profile/overview.html">
                                <p class="fw-bolder fs-5 text-dark mb-0">Chris Morgan</p>
                            </a>
                            <p class="my-1 df-fs-14">Purchased to use for laundry and it works great for that.</p>
                            <div class="mt-3">
                                <a href="#" class="text-decoration-underline text-gray-800">Kids Tablet Pc 7 Inch
                                    Android 11 3gb Ram 32gb Storage Free Case Wifi Dual Camera</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mt-5">
                        <div class="symbol symbol-35px symbol-circle me-3">
                            <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                        </div>
                        <div>
                            <a href="../../demo1/dist/pages/profile/overview.html">
                                <p class="fw-bolder fs-5 text-dark mb-0">Chris Morgan</p>
                            </a>
                            <p class="my-1 df-fs-14">Purchased to use for laundry and it works great for that.</p>
                            <div class="mt-3">
                                <a href="#" class="text-decoration-underline text-gray-800">Kids Tablet Pc 7 Inch
                                    Android 11 3gb Ram 32gb Storage Free Case Wifi Dual Camera</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('scripts')
    <script src="{{asset('assets/X-Zoom/assets/js/xzoom.min.js')}}"></script>
    {{--    <script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>--}}
    {{--<script>--}}
    {{--        $('#lightSlider').lightSlider({--}}
    {{--            gallery: true,--}}
    {{--            item: 1,--}}
    {{--            loop: true,--}}
    {{--            slideMargin: 0,--}}
    {{--            thumbItem: 9,--}}
    {{--        });--}}
    {{--</script>--}}
    <script>
        function countdown(auctionEndUTC) {
            return {
                targetTime: moment.tz(auctionEndUTC, 'UTC').tz(moment.tz.guess()),
                timeRemaining: 0,
                eventEmitted: false,
                init() {
                    this.updateTimeRemaining();
                    this.startCountdown();
                },

                updateTimeRemaining() {
                    const now = moment();
                    this.timeRemaining = Math.max(0, this.targetTime.diff(now, 'seconds'));
                    if (this.timeRemaining <= 0 && !this.eventEmitted) {
                        window.livewire.emit('updateAuctionInfo');
                        this.eventEmitted = true;
                    }
                },

                startCountdown() {
                    setInterval(() => {
                        this.updateTimeRemaining();
                    }, 1000);
                },
                minutes() {
                    return this.padNumber(Math.floor(this.timeRemaining / 60)) + "m";
                },

                seconds() {
                    return this.padNumber(this.timeRemaining % 60) + "s";
                },

                padNumber(number) {
                    return number.toString().padStart(2, '0');
                }
            };
        }
    </script>
    <script>
        // JavaScript to handle smooth scrolling on anchor link click
        const scrollLinks = document.querySelectorAll('a.scroll-link');

        scrollLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default link behavior

                const targetId = this.getAttribute('href'); // Get the target ID from the href attribute
                const targetSection = document.querySelector(targetId); // Find the target section element

                if (targetSection) {
                    const headerHeight = 100; // Adjust this value if you have a fixed header
                    const targetOffset = targetSection.offsetTop - headerHeight;

                    window.scrollTo({
                        top: targetOffset,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
@endpush
