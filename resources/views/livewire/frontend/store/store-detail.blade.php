@php
    use App\Enums\MediaDirectoryNamesEnum;
@endphp
<div>
    <div class="container mt-5 mb-5 my-md-6">
        <div class="bg-white rounded-4 p-5 p-md-8 custom-box-shadow">
            <div class="d-flex justify-content-end d-md-none mb-4">
                <a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal"
                   data-bs-target="#kt_modal_offer_a_deal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-person-fill-add" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        <path
                            d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                    </svg>
                </a>
            </div>
            <div class="row gx-3 gx-md-4 gx-lg-6">
                <div class="col-4 col-md-2 ">
                    <img class="rounded-3 shadow df-cps-img" src="{{$store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_LOGO->value) ? $store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_LOGO->value) : asset('assets/media/svg/files/blank-image.svg')}}"
                         alt="image"/>
                </div>
                <div class="col-8 col-md-10">
                    <div class="d-md-flex justify-content-md-between align-items-start">
                        <div>
                            <div class="d-flex align-items-center">
                                <a class="text-gray-900 fs-2 fw-bold me-1">{{$store->store_name}}</a>

                            </div>
                            <div class="fs-6 mb-4">
                                <p>30k Followers</p>
                            </div>
                        </div>
                        <div class="d-none d-md-flex my-4">
                            <a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal"
                               data-bs-target="#kt_modal_offer_a_deal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                    <path
                                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    <path
                                        d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                                </svg>
                                <span class="ms-2">Follow</span></a>
                        </div>
                    </div>
                    <div class="d-flex" style="overflow-x: scroll">
                        <div
                            class="border border-gray-300 border-dashed rounded w-auto min-w-md-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                            <span
                                class="svg-icon svg-icon-3 svg-icon-success me-2  text-center">
                                    <svg width="24"
                                         height="24"
                                         viewBox="0 0 24 24"
                                         fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect
                                            opacity="0.5"
                                            x="13" y="6"
                                            width="13"
                                            height="2"
                                            rx="1"
                                            transform="rotate(90 13 6)"
                                            fill="currentColor"/>
                                        <path
                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                            fill="currentColor"/>
                                    </svg>
                                </span>
                                <div class="fs-2 fw-bold" data-kt-countup="true"
                                     data-kt-countup-value="{{$store->listings_count}}">
                                    {{GlobalHelper::formatCount($store->listings_count)}}
                                </div>
                            </div>
                            <div class="fw-semibold fs-6 text-gray-400 text-nowrap">Listings</div>
                        </div>
                        <div
                            class="border border-gray-300 border-dashed rounded w-auto min-w-md-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                            <span
                                class="svg-icon svg-icon-3 svg-icon-danger me-2 text-center ">
                                    <svg width="24"
                                         height="24"
                                         viewBox="0 0 24 24"
                                         fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect
                                            opacity="0.5"
                                            x="11"
                                            y="18"
                                            width="13"
                                            height="2"
                                            rx="1"
                                            transform="rotate(-90 11 18)"
                                            fill="currentColor"/>
                                        <path
                                            d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                            fill="currentColor"/>
                                    </svg>
                                </span>
                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="0">
                                    0
                                </div>
                            </div>
                            <div class="fw-semibold fs-6 text-gray-400 text-nowrap">Sold Items</div>
                        </div>
                        <div
                            class="border border-gray-300 border-dashed rounded w-auto min-w-md-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                    <svg width="24"
                                         height="24"
                                         viewBox="0 0 24 24"
                                         fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect
                                            opacity="0.5"
                                            x="13" y="6"
                                            width="13"
                                            height="2"
                                            rx="1"
                                            transform="rotate(90 13 6)"
                                            fill="currentColor"/>
                                        <path
                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                            fill="currentColor"/>
                                    </svg>
                                </span>
                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="0"
                                     data-kt-countup-prefix="%">0
                                </div>
                            </div>
                            <div class="fw-semibold fs-6 text-gray-400 text-nowrap">Positive Seller Rating</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-block d-md-flex align-items-center justify-content-md-between ">
                <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold px-3">
                    <li class="nav-item">
                        <a class="nav-link text-active-primary ms-0 me-5 me-md-10 pt-5 pb-2 active" data-bs-toggle="tab"
                           href="#kt_tab_pane_1">Home Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary ms-0 me-5 me-md-10 pt-5 pb-2" data-bs-toggle="tab"
                           href="#kt_tab_pane_2">All Listings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary ms-0 me-5 me-md-10 pt-5 pb-2 " data-bs-toggle="tab"
                           href="#kt_tab_pane_3">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mb-10">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                <div class="bg-white rounded-4 p-4 p-md-8 custom-box-shadow">
                    <div class="text-black fs-2 fw-semibold">Just For You</div>
                    <div class="row gy-3 gy-md-5 gx-2 gx-md-5 g py-5">
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card" style="border: 2px solid #f6f6f6">
                                <div class="ribbon ribbon-top ribbon-clip">
                                    <div class="ribbon-label">
                                        Good
                                        <span class="ribbon-inner bg-info"></span>
                                    </div>
                                </div>
                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                         src="{{asset('assets/media/Category images/Headphone 3.jpg')}}">
                                </div>
                                <div class="item-bid">
                                    <div class="btn-wrapper text-white bg-primary text-center">
                                        <div class="bid-btn">
                                            <div class="mt-3 text-white fw-semibold">Free shipping</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-1 pb-3 px-3 lh-lg">
                                    <div class="d-flex justify-content-between mt-5 mt-md-10">
                                        <div>
                                            <div class="product-title">
                                                <a href="#" class="text-dark fw-bolder">One 24'
                                                    Monitor</a>
                                                <div class="d-flex text-dark align-items-center mb-2 product-price">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="#5D6EB3"
                                                         class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="like mt-3">
                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center pe-2">
                                            <div class="symbol symbol-35px symbol-circle me-3 position-relative">
                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                         fill="#5D6EB3" class="bi bi-check-circle-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="dealfair-lh-3">
                                                <a href="../../demo1/dist/pages/profile/overview.html">
                                                    <h5 class="fw-bolder text-dark">Chris Morgan</h5>
                                                </a>
                                                <p class="fs-6 text-dark fw-semibold mb-2">Fairview</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-flex-start gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                 fill="#F8E71C" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <h6>2.5</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card" style="border: 2px solid #f6f6f6">
                                <div class="ribbon ribbon-top ribbon-clip">
                                    <div class="ribbon-label">
                                        Good
                                        <span class="ribbon-inner bg-info"></span>
                                    </div>
                                </div>
                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                         src="{{asset('assets/media/Category images/Headphone 3.jpg')}}">
                                </div>
                                <div class="item-bid">
                                    <div class="btn-wrapper text-white bg-primary text-center">
                                        <div class="bid-btn">
                                            <div class="mt-3 text-white fw-semibold">Free shipping</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-1 pb-3 px-3 lh-lg">
                                    <div class="d-flex justify-content-between mt-5 mt-md-10">
                                        <div>
                                            <div class="product-title">
                                                <a href="#" class="text-dark fw-bolder">One 24'
                                                    Monitor</a>
                                                <div class="d-flex text-dark align-items-center mb-2 product-price">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="#5D6EB3"
                                                         class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="like mt-3">
                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center pe-2">
                                            <div class="symbol symbol-35px symbol-circle me-3 position-relative">
                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                         fill="#5D6EB3" class="bi bi-check-circle-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="dealfair-lh-3">
                                                <a href="../../demo1/dist/pages/profile/overview.html">
                                                    <h5 class="fw-bolder text-dark">Chris Morgan</h5>
                                                </a>
                                                <p class="fs-6 text-dark fw-semibold mb-2">Fairview</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-flex-start gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                 fill="#F8E71C" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <h6>2.5</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card" style="border: 2px solid #f6f6f6">
                                <div class="ribbon ribbon-top ribbon-clip">
                                    <div class="ribbon-label">
                                        Good
                                        <span class="ribbon-inner bg-info"></span>
                                    </div>
                                </div>
                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                         src="{{asset('assets/media/Category images/Headphone 3.jpg')}}">
                                </div>
                                <div class="item-bid">
                                    <div class="btn-wrapper text-white bg-primary text-center">
                                        <div class="bid-btn">
                                            <div class="mt-3 text-white fw-semibold">Free shipping</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-1 pb-3 px-3 lh-lg">
                                    <div class="d-flex justify-content-between mt-5 mt-md-10">
                                        <div>
                                            <div class="product-title">
                                                <a href="#" class="text-dark fw-bolder">One 24'
                                                    Monitor</a>
                                                <div class="d-flex text-dark align-items-center mb-2 product-price">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="#5D6EB3"
                                                         class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="like mt-3">
                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center pe-2">
                                            <div class="symbol symbol-35px symbol-circle me-3 position-relative">
                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                         fill="#5D6EB3" class="bi bi-check-circle-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="dealfair-lh-3">
                                                <a href="../../demo1/dist/pages/profile/overview.html">
                                                    <h5 class="fw-bolder text-dark">Chris Morgan</h5>
                                                </a>
                                                <p class="fs-6 text-dark fw-semibold mb-2">Fairview</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-flex-start gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                 fill="#F8E71C" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <h6>2.5</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card" style="border: 2px solid #f6f6f6">
                                <div class="ribbon ribbon-top ribbon-clip">
                                    <div class="ribbon-label">
                                        Good
                                        <span class="ribbon-inner bg-info"></span>
                                    </div>
                                </div>
                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                         src="{{asset('assets/media/Category images/Headphone 3.jpg')}}">
                                </div>
                                <div class="item-bid">
                                    <div class="btn-wrapper text-white bg-primary text-center">
                                        <div class="bid-btn">
                                            <div class="mt-3 text-white fw-semibold">Free shipping</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-1 pb-3 px-3 lh-lg">
                                    <div class="d-flex justify-content-between mt-5 mt-md-10">
                                        <div>
                                            <div class="product-title">
                                                <a href="#" class="text-dark fw-bolder">One 24'
                                                    Monitor</a>
                                                <div class="d-flex text-dark align-items-center mb-2 product-price">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="#5D6EB3"
                                                         class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="like mt-3">
                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center pe-2">
                                            <div class="symbol symbol-35px symbol-circle me-3 position-relative">
                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                         fill="#5D6EB3" class="bi bi-check-circle-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="dealfair-lh-3">
                                                <a href="../../demo1/dist/pages/profile/overview.html">
                                                    <h5 class="fw-bolder text-dark">Chris Morgan</h5>
                                                </a>
                                                <p class="fs-6 text-dark fw-semibold mb-2">Fairview</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-flex-start gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                 fill="#F8E71C" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <h6>2.5</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card" style="border: 2px solid #f6f6f6">
                                <div class="ribbon ribbon-top ribbon-clip">
                                    <div class="ribbon-label">
                                        Good
                                        <span class="ribbon-inner bg-info"></span>
                                    </div>
                                </div>
                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                         src="{{asset('assets/media/Category images/Headphone 3.jpg')}}">
                                </div>
                                <div class="item-bid">
                                    <div class="btn-wrapper text-white bg-primary text-center">
                                        <div class="bid-btn">
                                            <div class="mt-3 text-white fw-semibold">Free shipping</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-1 pb-3 px-3 lh-lg">
                                    <div class="d-flex justify-content-between mt-5 mt-md-10">
                                        <div>
                                            <div class="product-title">
                                                <a href="#" class="text-dark fw-bolder">One 24'
                                                    Monitor</a>
                                                <div class="d-flex text-dark align-items-center mb-2 product-price">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="#5D6EB3"
                                                         class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="like mt-3">
                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center pe-2">
                                            <div class="symbol symbol-35px symbol-circle me-3 position-relative">
                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                         fill="#5D6EB3" class="bi bi-check-circle-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="dealfair-lh-3">
                                                <a href="../../demo1/dist/pages/profile/overview.html">
                                                    <h5 class="fw-bolder text-dark">Chris Morgan</h5>
                                                </a>
                                                <p class="fs-6 text-dark fw-semibold mb-2">Fairview</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-flex-start gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                 fill="#F8E71C" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <h6>2.5</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card" style="border: 2px solid #f6f6f6">
                                <div class="ribbon ribbon-top ribbon-clip">
                                    <div class="ribbon-label">
                                        Good
                                        <span class="ribbon-inner bg-info"></span>
                                    </div>
                                </div>
                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                         src="{{asset('assets/media/Category images/Headphone 3.jpg')}}">
                                </div>
                                <div class="item-bid">
                                    <div class="btn-wrapper text-white bg-primary text-center">
                                        <div class="bid-btn">
                                            <div class="mt-3 text-white fw-semibold">Free shipping</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-1 pb-3 px-3 lh-lg">
                                    <div class="d-flex justify-content-between mt-5 mt-md-10">
                                        <div>
                                            <div class="product-title">
                                                <a href="#" class="text-dark fw-bolder">One 24'
                                                    Monitor</a>
                                                <div class="d-flex text-dark align-items-center mb-2 product-price">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="#5D6EB3"
                                                         class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="like mt-3">
                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center pe-2">
                                            <div class="symbol symbol-35px symbol-circle me-3 position-relative">
                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                         fill="#5D6EB3" class="bi bi-check-circle-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="dealfair-lh-3">
                                                <a href="../../demo1/dist/pages/profile/overview.html">
                                                    <h5 class="fw-bolder text-dark">Chris Morgan</h5>
                                                </a>
                                                <p class="fs-6 text-dark fw-semibold mb-2">Fairview</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-flex-start gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                 fill="#F8E71C" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <h6>2.5</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card" style="border: 2px solid #f6f6f6">
                                <div class="ribbon ribbon-top ribbon-clip">
                                    <div class="ribbon-label">
                                        Good
                                        <span class="ribbon-inner bg-info"></span>
                                    </div>
                                </div>
                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                         src="{{asset('assets/media/Category images/Headphone 3.jpg')}}">
                                </div>
                                <div class="item-bid">
                                    <div class="btn-wrapper text-white bg-primary text-center">
                                        <div class="bid-btn">
                                            <div class="mt-3 text-white fw-semibold">Free shipping</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-1 pb-3 px-3 lh-lg">
                                    <div class="d-flex justify-content-between mt-5 mt-md-10">
                                        <div>
                                            <div class="product-title">
                                                <a href="#" class="text-dark fw-bolder">One 24'
                                                    Monitor</a>
                                                <div class="d-flex text-dark align-items-center mb-2 product-price">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="#5D6EB3"
                                                         class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="like mt-3">
                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center pe-2">
                                            <div class="symbol symbol-35px symbol-circle me-3 position-relative">
                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                         fill="#5D6EB3" class="bi bi-check-circle-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="dealfair-lh-3">
                                                <a href="../../demo1/dist/pages/profile/overview.html">
                                                    <h5 class="fw-bolder text-dark">Chris Morgan</h5>
                                                </a>
                                                <p class="fs-6 text-dark fw-semibold mb-2">Fairview</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-flex-start gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                 fill="#F8E71C" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <h6>2.5</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card" style="border: 2px solid #f6f6f6">
                                <div class="ribbon ribbon-top ribbon-clip">
                                    <div class="ribbon-label">
                                        Good
                                        <span class="ribbon-inner bg-info"></span>
                                    </div>
                                </div>
                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                         src="{{asset('assets/media/Category images/Headphone 3.jpg')}}">
                                </div>
                                <div class="item-bid">
                                    <div class="btn-wrapper text-white bg-primary text-center">
                                        <div class="bid-btn">
                                            <div class="mt-3 text-white fw-semibold">Free shipping</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-1 pb-3 px-3 lh-lg">
                                    <div class="d-flex justify-content-between mt-5 mt-md-10">
                                        <div>
                                            <div class="product-title">
                                                <a href="#" class="text-dark fw-bolder">One 24'
                                                    Monitor</a>
                                                <div class="d-flex text-dark align-items-center mb-2 product-price">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="#5D6EB3"
                                                         class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="like mt-3">
                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center pe-2">
                                            <div class="symbol symbol-35px symbol-circle me-3 position-relative">
                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                         fill="#5D6EB3" class="bi bi-check-circle-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="dealfair-lh-3">
                                                <a href="../../demo1/dist/pages/profile/overview.html">
                                                    <h5 class="fw-bolder text-dark">Chris Morgan</h5>
                                                </a>
                                                <p class="fs-6 text-dark fw-semibold mb-2">Fairview</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-flex-start gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                 fill="#F8E71C" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <h6>2.5</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                <div class="bg-white rounded-4 p-4 p-md-8 custom-box-shadow">
                    <div class="row">
                        @livewire('frontend.listing.listing-filter-siderbar')
                        @livewire('frontend.listing.listing-list', ['storeSlug' => $storeSlug])
                    </div>
                </div>
            </div>
            <div class="tab-pane fade " id="kt_tab_pane_3" role="tabpanel">
                <div class="row g-0 rounded-4 p-4 p-md-8 bg-white custom-box-shadow">
                    <div class="col p-5">
                        <div class="mb-2 fw-semibold" style="font-size: 15px;">Main Category</div>
                        <div class="d-flex gap-2 store-category">
                            <i class="fas fa-tshirt"></i>
                            <div>{{$store->category->name}}</div>
                        </div>
                    </div>
                    <div class="profile-col-separator"></div>
                    <div class="col p-5">
                        <div class="mb-2 fw-semibold" style="font-size: 15px;">Seller Size</div>
                        <div class="d-flex align-items-center gap-2" style="font-size: 1rem;">
                            <span class="fw-bold" style="font-size: 2.75rem;">70%</span> Items sold in the last 28 days
                        </div>
                    </div>
                    <div class="profile-col-separator"></div>
                    <div class="col p-5">
                        <div class="mb-2 fw-semibold" style="font-size: 15px;">Time On Dealfair</div>
                        <div class="d-flex align-items-center gap-2" style="font-size: 1.25rem;">
                            <span class="fw-bold" style="font-size: 3rem;">4</span>+Years
                        </div>
                    </div>
                    <div class="profile-col-separator"></div>
                    <div class="col p-5">
                        <div class="mb-2 fw-semibold" style="font-size: 15px;">Shipped On Time</div>
                        <div class="d-flex gap-2">
                            <div class="fw-bold" style="font-size: 2.75rem;">96%</div>
                            <div class="ms-2" style="font-size: 1rem;">This is average for sellers with this category
                            </div>
                        </div>
                    </div>
                    <div class="profile-col-separator"></div>
                    <div class="col p-5">
                        <div class="mb-2 fw-semibold" style="font-size: 15px;">Chat</div>
                        <div>Chat Response Rate</div>
                        <div class="fw-semibold">96%</div>
                        <div>Chat Response Time</div>
                        <div class="fw-semibold">Active in : 1 day ago</div>
                    </div>
                </div>
                <div class="bg-white rounded-4 p-4 p-md-8">
                    <div class="text-center my-8" style="font-size: 20px; font-weight: 800;">Rating And Reviews</div>
                    <div class="row mt-8">
                        <div class="col-md-3 pb-8">
                            <div class="d-flex flex-column text-center">
                                <div class="mb-4">
                                    <div class="shadow rounded-3 p-2">
                                        <div class="d-flex align-items-baseline justify-content-center gap-5">
                                            <h6>5 Star</h6>
                                            <div>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-active mx-1"></span>
                                            </div>
                                            <h6>123</h6>
                                        </div>
                                        <div class="d-flex align-items-baseline justify-content-center gap-5">
                                            <h6>4 Star</h6>
                                            <div>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-inactive mx-1"></span>
                                            </div>
                                            <h6>123</h6>
                                        </div>
                                        <div class="d-flex align-items-baseline justify-content-center gap-5">
                                            <h6>3 Star</h6>
                                            <div>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-inactive mx-1"></span>
                                                <span class="fa fa-star star-inactive mx-1"></span>
                                            </div>
                                            <h6>123</h6>
                                        </div>
                                        <div class="d-flex align-items-baseline justify-content-center gap-5">
                                            <h6>2 Star</h6>
                                            <div>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-inactive mx-1"></span>
                                                <span class="fa fa-star star-inactive mx-1"></span>
                                                <span class="fa fa-star star-inactive mx-1"></span>
                                            </div>
                                            <h6>123</h6>
                                        </div>
                                        <div class="d-flex align-items-baseline justify-content-center gap-5">
                                            <h6>1 Star</h6>
                                            <div>
                                                <span class="fa fa-star star-active mx-1"></span>
                                                <span class="fa fa-star star-inactive mx-1"></span>
                                                <span class="fa fa-star star-inactive mx-1"></span>
                                                <span class="fa fa-star star-inactive mx-1"></span>
                                                <span class="fa fa-star star-inactive mx-1"></span>
                                            </div>
                                            <h6>123</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="rating-box">
                                    <h1 class="pt-4 text-white">4.0</h1>
                                    <p class="text-white">out of 5</p>
                                </div>
                                <div class="mt-2">
                                    <span class="fa fa-star star-active mx-1"></span>
                                    <span class="fa fa-star star-active mx-1"></span>
                                    <span class="fa fa-star star-active mx-1"></span>
                                    <span class="fa fa-star star-active mx-1"></span>
                                    <span class="fa fa-star star-inactive mx-1"></span>
                                </div>
                                <small class="text-center">1034 Ratings</small>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex ">
                                <div class="symbol symbol-35px symbol-circle me-3">
                                    <img
                                        src="{{ asset('assets/frontend/panel/media/svg/products-categories/t-shirt.svg') }}"/>
                                </div>
                                <div style="overflow: auto;">
                                    <a href="#">
                                        <p class="text-dark mb-0" style="font-size: 13px; font-weight: normal">T
                                            Shirt New Stylish BTS Logo Colored TAGLINE Tag Print Casual Round Neck
                                            Half Sleeves Export Quality Shirt Smart Fit Tee Shirt</p>
                                    </a>
                                    <small class="text-muted">Color Family:Pink, Size:Int:S</small>
                                    <div class="d-flex gap-1 gap-md-2 mt-1">
                                        <div class="fa fa-star star-active"></div>
                                        <div class="fa fa-star star-active"></div>
                                        <div class="fa fa-star star-active"></div>
                                        <div class="fa fa-star star-active"></div>
                                        <div class="fa fa-star star-inactive"></div>
                                    </div>
                                    <p class="my-3 " style="font-size: 12px;">I am a big fan of BTS and I am really
                                        satisfied with shirt quality is good and tag is same as shown in picture
                                        delivered on time this is my first experience on dealfair. Thank you
                                        dealfair and seller</p>
                                    <div class="d-flex flex-wrap gap-2 mt-4" style="overflow: scroll;">
                                        <img class="border border-2 border-gray-200 w-50px w-lg-100px h-lg-100px"
                                             src="{{asset('assets/media/products/1.png')}}">
                                        <img class="border border-2 border-gray-200 w-50px w-lg-100px h-lg-100px"
                                             src="{{asset('assets/media/products/20.png')}}">
                                        <img class="border border-2 border-gray-200 w-50px w-lg-100px h-lg-100px"
                                             src="{{asset('assets/media/products/13.png')}}">
                                        <img class="border border-2 border-gray-200 w-50px w-lg-100px h-lg-100px"
                                             src="{{asset('assets/media/products/1.png')}}">
                                        <img class="border border-2 border-gray-200 w-50px w-lg-100px h-lg-100px"
                                             src="{{asset('assets/media/products/20.png')}}">
                                    </div>
                                    <div class="d-flex align-items-center gap-4">
                                        <small class="text-muted">02 Jun 2022</small>
                                        <div style="font-size: 12px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                 fill="#5d6eb3" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                            </svg>
                                            <span style="color: #5d6eb3;">Verified Purchase</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
