@extends('frontend.user-panel.layouts.master')

@section('title', 'Dealfair | Your Orders')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Orders
                    </h1>
                    <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                        <li class="breadcrumb-item text-gray-600">
                            <a href="{{ route('seller.dashboard') }}" class="text-gray-600 text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-gray-600">Your Orders</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold px-3">
                    <li class="nav-item">
                        <a class="nav-link text-active-primary ms-0 me-5 me-md-10 pt-5 pb-2 active" data-bs-toggle="tab"
                           href="#kt_tab_pane_1">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary ms-0 me-5 me-md-10 pt-5 pb-2" data-bs-toggle="tab"
                           href="#kt_tab_pane_2">Order Returns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary ms-0 me-5 me-md-10 pt-5 pb-2 " data-bs-toggle="tab"
                           href="#kt_tab_pane_3">Order Cancellations</a>
                    </li>
                </ul>
                <div class="my-5">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                            <div class="bg-white rounded-4 p-4 p-md-8">
                                <div class="d-flex justify-content-center">
                                    <div class="px-3 py-10">
                                        <div class="d-flex justify-content-center">
                                            <div class="text-center">
                                                <div class="text-muted" style="font-size:12px; font-weight: 600">
                                                    You have not placed any orders yet!
                                                </div>
                                                <a class="btn btn-sm btn-primary text-center text-white text-uppercase mt-3" href="{{Route('home')}}">
                                                    Continue Shopping
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-3 fw-bold mb-4">Recommended Products</div>
                                <div class="owl-carousel-wrapper">
                                    <div class="owl-carousel carousel-recently-viewed owl-theme">
                                        <div class="item">
                                            <div class="card" style="border: 2px solid #f6f6f6;">
                                                <div class="ribbon ribbon-top ribbon-clip">
                                                    <div class="ribbon-label">
                                                        New
                                                        <span class="ribbon-inner bg-info"></span>
                                                    </div>
                                                </div>
                                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                                         src="{{asset('assets/media/Category images/Smart watch.jpg')}}">
                                                </div>
                                                <div class="item-bid">
                                                    <div class="btn-wrapper text-white  bg-primary text-center">
                                                        <div class="bid-btn px-4 d-md-flex justify-content-md-between align-items-center">
                                                            <div class="text-center text-md-start">
                                                                <div>BID $7</div>
                                                                <div>Free shipping</div>
                                                            </div>
                                                            <div class="d-none d-md-flex gap-1">
                                                                <h6 class="p-2 bg-white shadow-sm rounded-3">4<small>m</small></h6>
                                                                <h6 class="p-2 bg-white shadow-sm rounded-3">4<small>s</small></h6>
                                                            </div>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" style="width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-2">
                                                        <div class="text-center text-uppercase text-success bid-status">Accepting Bid</div>
                                                    </div>
                                                </div>
                                                <div class="px-3 py-2 lh-lg">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <div class="product-title">
                                                                <a href="#" class=" text-dark fw-bolder">One 24'
                                                                    Monitor</a>
                                                            </div>
                                                            <div class="d-flex text-dark align-items-center mb-2 product-price">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                                     fill="#5D6EB3" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                                </svg>
                                                                <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                            </div>
                                                        </div>
                                                        <div class="like mt-3">
                                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-none d-lg-block">
                                                        <div class=" d-flex align-items-center pe-2">
                                                            <div class="symbol symbol-35px symbol-circle me-3">
                                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                            </div>
                                                            <div class="dealfair-lh-3">
                                                                <a href="../../demo1/dist/pages/profile/overview.html">
                                                                    <h5 class="fw-bolder text-dark">display_name</h5>
                                                                </a>
                                                                <p class="fs-6 text-dark fw-semibold mb-2">Fairview</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card" style="border: 2px solid #f6f6f6">
                                                <div class="ribbon ribbon-top ribbon-clip">
                                                    <div class="ribbon-label">
                                                        Good
                                                        <span class="ribbon-inner bg-info"></span>
                                                    </div>
                                                </div>
                                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                                         src="{{asset('assets/media/Category images/Mobile 2.jpg')}}">
                                                </div>
                                                <div class="item-bid">
                                                    <div class="btn-wrapper text-white bg-primary text-center">
                                                        <div class="bid-btn">
                                                            <h5 class="mt-3 text-white fw-semibold">Free shipping</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pt-1 pb-3 px-3 lh-lg">
                                                    <div class="d-flex justify-content-between mt-10">
                                                        <div>
                                                            <a href="#" class="fs-4 text-dark fw-bolder">One 24'
                                                                Monitor</a>
                                                            <div class="d-flex text-dark align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                     fill="#5D6EB3"
                                                                     class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                                </svg>
                                                                <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                            </div>
                                                        </div>
                                                        <div class="like mt-3">
                                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center pe-2">
                                                            <div class="symbol symbol-35px symbol-circle me-3 position-relative">
                                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                                         fill="#5D6EB3" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#F8E71C"
                                                                 class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <h6>2.5</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card" style="border: 2px solid #f6f6f6">
                                                <div class="ribbon ribbon-top ribbon-clip">
                                                    <div class="ribbon-label">
                                                        Good
                                                        <span class="ribbon-inner bg-info"></span>
                                                    </div>
                                                </div>
                                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                                         src="{{asset('assets/media/Category images/Mobile 3.jpg')}}">
                                                </div>
                                                <div class="item-bid">
                                                    <div class="btn-wrapper text-white bg-primary text-center">
                                                        <div class="bid-btn">
                                                            <h5 class="mt-3 text-white fw-semibold">Free shipping</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pt-1 pb-3 px-3 lh-lg">
                                                    <div class="d-flex justify-content-between mt-10">
                                                        <div>
                                                            <a href="#" class="fs-4 text-dark fw-bolder">One 24'
                                                                Monitor</a>
                                                            <div class="d-flex text-dark align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                     fill="#5D6EB3"
                                                                     class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                                </svg>
                                                                <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                            </div>
                                                        </div>
                                                        <div class="like mt-3">
                                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center pe-2">
                                                            <div class="symbol symbol-35px symbol-circle me-3 position-relative">
                                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                                         fill="#5D6EB3" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#F8E71C"
                                                                 class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <h6>2.5</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card" style="border: 2px solid #f6f6f6;">
                                                <div class="ribbon ribbon-top ribbon-clip">
                                                    <div class="ribbon-label">
                                                        New
                                                        <span class="ribbon-inner bg-info"></span>
                                                    </div>
                                                </div>
                                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                                         src="{{asset('assets/media/Category images/Headphone 3.jpg')}}">
                                                </div>
                                                <div class="item-bid">
                                                    <div class="btn-wrapper text-white  bg-primary text-center">
                                                        <div class="bid-btn px-4 d-md-flex justify-content-md-between align-items-center">
                                                            <div class="text-center text-md-start">
                                                                <div>BID $7</div>
                                                                <div>Free shipping</div>
                                                            </div>
                                                            <div class="d-none d-md-flex gap-1">
                                                                <h6 class="p-2 bg-white shadow-sm rounded-3">4<small>m</small></h6>
                                                                <h6 class="p-2 bg-white shadow-sm rounded-3">4<small>s</small></h6>
                                                            </div>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" style="width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-2">
                                                        <div class="text-center text-uppercase text-success bid-status">Accepting Bid</div>
                                                    </div>
                                                </div>
                                                <div class="px-3 py-2 lh-lg">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <div class="product-title">
                                                                <a href="#" class=" text-dark fw-bolder">One 24'
                                                                    Monitor</a>
                                                            </div>
                                                            <div class="d-flex text-dark align-items-center mb-2 product-price">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                                     fill="#5D6EB3" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                                </svg>
                                                                <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                            </div>
                                                        </div>
                                                        <div class="like mt-3">
                                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-none d-lg-block">
                                                        <div class=" d-flex align-items-center pe-2">
                                                            <div class="symbol symbol-35px symbol-circle me-3">
                                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                            </div>
                                                            <div class="dealfair-lh-3">
                                                                <a href="../../demo1/dist/pages/profile/overview.html">
                                                                    <h5 class="fw-bolder text-dark">display_name</h5>
                                                                </a>
                                                                <p class="fs-6 text-dark fw-semibold mb-2">Fairview</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card" style="border: 2px solid #f6f6f6">
                                                <div class="ribbon ribbon-top ribbon-clip">
                                                    <div class="ribbon-label">
                                                        Good
                                                        <span class="ribbon-inner bg-info"></span>
                                                    </div>
                                                </div>
                                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                                         src="{{asset('assets/media/Category images/Washing machine-category.png')}}">
                                                </div>
                                                <div class="item-bid">
                                                    <div class="btn-wrapper text-white bg-primary text-center">
                                                        <div class="bid-btn">
                                                            <h5 class="mt-3 text-white fw-semibold">Free shipping</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pt-1 pb-3 px-3 lh-lg">
                                                    <div class="d-flex justify-content-between mt-10">
                                                        <div>
                                                            <a href="#" class="fs-4 text-dark fw-bolder">One 24'
                                                                Monitor</a>
                                                            <div class="d-flex text-dark align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                     fill="#5D6EB3"
                                                                     class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                                </svg>
                                                                <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                            </div>
                                                        </div>
                                                        <div class="like mt-3">
                                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center pe-2">
                                                            <div class="symbol symbol-35px symbol-circle me-3 position-relative">
                                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                                         fill="#5D6EB3" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#F8E71C"
                                                                 class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <h6>2.5</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card" style="border: 2px solid #f6f6f6">
                                                <div class="ribbon ribbon-top ribbon-clip">
                                                    <div class="ribbon-label">
                                                        Good
                                                        <span class="ribbon-inner bg-info"></span>
                                                    </div>
                                                </div>
                                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                                         src="{{asset('assets/media/Category images/Mobile.jpg')}}">
                                                </div>
                                                <div class="item-bid">
                                                    <div class="btn-wrapper text-white bg-primary text-center">
                                                        <div class="bid-btn">
                                                            <h5 class="mt-3 text-white fw-semibold">Free shipping</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pt-1 pb-3 px-3 lh-lg">
                                                    <div class="d-flex justify-content-between mt-10">
                                                        <div>
                                                            <a href="#" class="fs-4 text-dark fw-bolder">One 24'
                                                                Monitor</a>
                                                            <div class="d-flex text-dark align-items-center mb-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                     fill="#5D6EB3"
                                                                     class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                                </svg>
                                                                <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                            </div>
                                                        </div>
                                                        <div class="like mt-3">
                                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center pe-2">
                                                            <div class="symbol symbol-35px symbol-circle me-3 position-relative">
                                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                                <div class="position-absolute" style="bottom: -4px; right: 0;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                                         fill="#5D6EB3" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#F8E71C"
                                                                 class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                            <h6>2.5</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card" style="border: 2px solid #f6f6f6;">
                                                <div class="ribbon ribbon-top ribbon-clip">
                                                    <div class="ribbon-label">
                                                        New
                                                        <span class="ribbon-inner bg-info"></span>
                                                    </div>
                                                </div>
                                                <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px">
                                                    <img style="object-fit: contain; width: 100%; height: 100%;"
                                                         src="{{asset('assets/media/Category images/Smart TV 3.jpg')}}">
                                                </div>
                                                <div class="item-bid">
                                                    <div class="btn-wrapper text-white  bg-primary text-center">
                                                        <div class="bid-btn px-4 d-md-flex justify-content-md-between align-items-center">
                                                            <div class="text-center text-md-start">
                                                                <div>BID $7</div>
                                                                <div>Free shipping</div>
                                                            </div>
                                                            <div class="d-none d-md-flex gap-1">
                                                                <h6 class="p-2 bg-white shadow-sm rounded-3">4<small>m</small></h6>
                                                                <h6 class="p-2 bg-white shadow-sm rounded-3">4<small>s</small></h6>
                                                            </div>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" style="width:100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-2">
                                                        <div class="text-center text-uppercase text-success bid-status">Accepting Bid</div>
                                                    </div>
                                                </div>
                                                <div class="px-3 py-2 lh-lg">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <div class="product-title">
                                                                <a href="#" class=" text-dark fw-bolder">One 24'
                                                                    Monitor</a>
                                                            </div>
                                                            <div class="d-flex text-dark align-items-center mb-2 product-price">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                                     fill="#5D6EB3" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                                </svg>
                                                                <div class="text-gray-600 fw-bold ms-2">$400.00</div>
                                                            </div>
                                                        </div>
                                                        <div class="like mt-3">
                                                            <i onclick="myFunction(this)" class="far fa-heart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-none d-lg-block">
                                                        <div class=" d-flex align-items-center pe-2">
                                                            <div class="symbol symbol-35px symbol-circle me-3">
                                                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                                            </div>
                                                            <div class="dealfair-lh-3">
                                                                <a href="../../demo1/dist/pages/profile/overview.html">
                                                                    <h5 class="fw-bolder text-dark">display_name</h5>
                                                                </a>
                                                                <p class="fs-6 text-dark fw-semibold mb-2">Fairview</p>
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
                        <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                            <div class="bg-white rounded-4 p-4 p-md-8">
                                <div class="d-flex justify-content-center">
                                    <div class="px-3 py-10">
                                        <div class="d-flex justify-content-center">
                                            <div class="text-center">
                                                <div class="text-muted" style="font-size:12px; font-weight: 600">
                                                    You have not placed any orders yet!
                                                </div>
                                                <a class="btn btn-sm btn-primary text-center text-white text-uppercase mt-3" href="{{Route('home')}}">
                                                    Continue Shopping
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="kt_tab_pane_3" role="tabpanel">
                            <div class="bg-white rounded-4 p-4 p-md-8">
                                <div class="d-flex justify-content-center">
                                    <div class="px-3 py-10">
                                        <div class="d-flex justify-content-center">
                                            <div class="text-center">
                                                <div class="text-muted" style="font-size:12px; font-weight: 600">
                                                    You have not placed any orders yet!
                                                </div>
                                                <a class="btn btn-sm btn-primary text-center text-white text-uppercase mt-3" href="{{Route('home')}}">
                                                    Continue Shopping
                                                </a>
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
@endsection
@push('custom-scripts')
    <script src="{{ asset('assets/owl-carousel/owl.carousel.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".carousel-recently-viewed").owlCarousel({
                autoPlay: false,
                goToFirst: true,
                items: 3,
                itemsDesktop: [1000, 3],
                itemsDesktopSmall: [900, 3],
                itemsTablet: [600, 2],
                itemsMobile: false,
                navigation: true,
                navigationText: [
                    '<i class="fas fa-arrow-left"></i>',
                    '<i class="fas fa-arrow-right"></i>',
                ],
                pagination: false
            });
        });
    </script>
@endpush
