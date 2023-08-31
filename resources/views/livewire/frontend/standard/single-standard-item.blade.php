@php
    use App\Enums\ProductShippingCostPayerEnum;
    use App\Enums\MediaDirectoryNamesEnum;
    use App\Helpers\GlobalHelper;
@endphp
<div class="card" style="border: 1px solid #e9e9e9;">
    <div class="product-imgContainer" style="background-color: #0b0e1814; border-radius: 0.625rem 0.625rem 0 0;">
        <a href="{{route('listing.details',$listing->slug)}}">
            <img class="product-img" srcset="{{ $listing->getFirstMediaUrl(MediaDirectoryNamesEnum::PRODUCT_IMAGES->value) ? $listing->getFirstMediaUrl(MediaDirectoryNamesEnum::PRODUCT_IMAGES->value) : asset('assets/media/svg/files/blank-image.svg') }}"
                 alt="{{$listing->title}}">
        </a>
    </div>
        <div class="item-buy">
            <div class="btn-wrapper text-white text-center">
                <div class="buy-btn">
                    <div class="text-uppercase text-white fw-semibold">Buy NOW</div>
                </div>
            </div>
        </div>

    <div class="pt-1 pb-3 px-3 lh-lg mt-3">
        <div class="d-flex gap-1 align-items-start">
            <div class="col-11 ">
                <div class="product-title">
                    <a href="{{route('listing.details',$listing->slug)}}" >{{$listing->title}}</a>
                </div>
                <div class="d-flex flex-column flex-md-row my-1">
                    <div class="df-fs-12 text-white fw-medium px-2 rounded-2"
                         style="background-color: #7239ea; width: fit-content">{{GlobalHelper::formatEnumValue($listing->product_condition)}}</div>
                    @if($listing->shipping_cost_payer === ProductShippingCostPayerEnum::PICKUP_ONLY->value)
                        <div class="ms-0 ms-md-2 text-muted fw-semibold">Free shipping</div>
                    @endif
                </div>
                <div class="d-flex text-dark align-items-center mb-2 product-price">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                         fill="#0e1a60" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div class="text-gray-600 fw-bold ms-2">{{GlobalHelper::formatPrice($listing->price)}}</div>
                </div>
            </div>
            <div wire:click="toggleWishlist('{{$listing->slug}}')" class="col-1 like mt-1 d-flex justify-content-end">
                <i class="{{$listing->isInWishlist ? 'fas' : 'far'}} fa-heart"></i>
            </div>
        </div>

        <div class="d-none d-xl-block">
            @if($listing->user)
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-20px symbol-xl-35px symbol-circle me-2 position-relative">
                            <img
                                src="{{ $listing->user->getFirstMediaUrl(MediaDirectoryNamesEnum::PROFILE_IMAGES->value) ? $listing->user->getFirstMediaUrl(MediaDirectoryNamesEnum::PROFILE_IMAGES->value) : asset('assets/media/avatars/blank.png') }}"
                                alt=""/>
                            @if($listing->user->userProfile->is_verification_badge_allowed)
                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                         fill="#5D6EB3" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="lh-1">
                            <a href="#">
                                <div class="fw-bolder df-fs-14 text-dark">{{$listing->user->displayName}}</div>
                            </a>
                            <div class="fw-semibold df-fs-12">{{$listing->user->homeCommunity->name}}</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#F1AA22" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <div class="df-fs-14">2.5</div>
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-20px symbol-xl-35px symbol-circle me-2 position-relative">
                            <img
                                src="{{ $listing->store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_LOGO->value) ? $listing->store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_LOGO->value) : asset('assets/media/svg/files/blank-image.svg') }}"
                                alt=""/>
                        </div>
                        <div class="lh-1">
                            <a href="#">
                                <div class="fw-bolder df-fs-14 text-dark">{{$listing->store->store_name}}</div>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#F1AA22" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <div class="df-fs-14">2.5</div>
                    </div>
                </div>
            @endif
        </div>
        <div class="d-block d-xl-none">
            @if($listing->user)
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-start ">
                        <div class="symbol symbol-25px symbol-circle me-2 position-relative me-2">
                            <img
                                src="{{ $listing->user->getFirstMediaUrl(MediaDirectoryNamesEnum::PROFILE_IMAGES->value) ? $listing->user->getFirstMediaUrl(MediaDirectoryNamesEnum::PROFILE_IMAGES->value) : asset('assets/media/avatars/blank.png') }}"
                                alt=""/>
                            @if($listing->user->userProfile->is_verification_badge_allowed)
                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                         fill="#5D6EB3" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="lh-1">
                            <a href="#">
                                <div class="fw-bolder df-fs-13 text-dark">{{$listing->user->displayName}}</div>
                            </a>
                            <div class="fw-semibold lh-1 mt-1" style="font-size: 11px;">{{$listing->user->homeCommunity->name}}</div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="#F1AA22" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                    <div class="df-fs-12">2.5</div>
                </div>
            @else
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-start ">
                        <div class="symbol symbol-25px symbol-circle me-2 position-relative me-2">
                            <img
                                src="{{ $listing->store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_LOGO->value) ? $listing->store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_LOGO->value) : asset('assets/media/svg/files/blank-image.svg') }}"
                                alt=""/>
                        </div>
                        <div class="lh-1">
                            <a href="#">
                                <div class="fw-bolder df-fs-13 text-dark">{{$listing->store->store_name}}</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="#F1AA22" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                    <div class="df-fs-12">2.5</div>
                </div>
            @endif
        </div>
    </div>
</div>
