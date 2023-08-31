@php
    use App\Enums\RolesEnum;
    use App\Helpers\GlobalHelper;

    $logedInCustomer = GlobalHelper::getUser();
    $logedInCustomerProfilePic = GlobalHelper::getProfilePic();
@endphp
<div class="py-2 px-3" style="width:100%; background-color: #000b4a;">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="text-white df-welcome-txt fw-semibold">
                @if($logedInCustomer)
                    Welcome to Dealfair, {{$logedInCustomer->display_name}}
                @endif
            </div>
            <ul class="m-0 d-flex gap-3 text-white">
                <li class="text-white text-uppercase fw-semibold " style="font-size: 12px; list-style-type: none;">
                    <span class="me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff"
                             class="bi bi-suit-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                        </svg>
                    </span>
                    <a class="text-white df-top-link" href="{{route('wishlist')}}">
                        WishList
                    </a>
                </li>
                <li class="d-none d-md-block text-white text-uppercase fw-semibold"
                    style="font-size: 12px; list-style-type: none;">
                    <a class="text-white df-top-link" href="#getApp">Get the app</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
     data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <div class="container py-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="col-6 col-lg-4 d-flex align-items-center">
                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none hamburger"
                        id="kt_landing_menu_toggle">
                    <span class="svg-icon svg-icon-2hx">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                fill="currentColor"/>
                            <path opacity="0.3"
                                  d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                  fill="currentColor"/>
                        </svg>
                    </span>
                </button>
                <a href="{{ route('home') }}">
                    <img alt="Logo" src="{{ asset('assets/media/Asset 4-8.png') }}" class="h-20px h-xl-30px"/>
                </a>
            </div>
            <div class="col-6 col-lg-4 d-flex align-items-center justify-content-end d-lg-block">
                <div class="d-none d-lg-block">
                    <div class="input-group ">
                        <input type="text" class="form-control dealfair-border-right-0"
                               placeholder="Search for anything" id="basic-url" aria-describedby="basic-addon3">
                        <span class="input-group-text bg-primary"><span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="#ffffff"
                                     class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="d-flex d-lg-none">
                    <div class="menu-item me-3">
                        <a class="df-cart-icon" href="{{route('cart')}}">
                            <i class="fa fa-shopping-cart">
                                <div class="shadow-lg">1</div>
                            </i>
                        </a>
                    </div>
                </div>
                <div class="d-flex d-lg-none">
                    <div class="menu-item ">
                        <a class="px-2 px-xxl-4" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#5d6eb3"
                                 class="bi bi-bell" viewBox="0 0 16 16">
                                <path
                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-lg-block" id="kt_header_nav_wrapper">
                    <div class="d-lg-block p-2 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                         data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                         data-kt-drawer-width="auto" data-kt-drawer-direction="start"
                         data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                         data-kt-swapper-mode="prepend"
                         data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                        <div
                            class="d-lg-flex align-items-center justify-content-lg-end menu menu-column flex-nowrap menu-rounded menu-lg-row nav nav-flush fs-5 fw-semibold header-nav"
                            id="kt_landing_menu">
                            <div class="d-block d-lg-none p-2">
                                <div class="menu-item ">
                                    @if ($logedInCustomer)
                                        <div class=" d-flex align-items-center">
                                            <div class="symbol symbol-30px me-3">
                                                <img alt="Logo" src="{{ $logedInCustomerProfilePic }}">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-6">
                                                    {{ $logedInCustomer->display_name }}
                                                </div>
                                                <span
                                                    class="fw-semibold text-muted text-hover-primary fs-7">{{ $logedInCustomer->email }}</span>
                                            </div>
                                        </div>
                                        <div class="my-3"
                                             style="width:100%; height: 2px; background-color: #9ba4ae1c"></div>
                                    @endif
                                </div>
                                <div class="d-block d-md-none menu-item mb-2">
                                    <a href="#getApp">Get the app</a>
                                </div>
                                <div class="menu-item mb-2">
                                    <a href="{{route('seller.create.listing')}}">List an item</a>
                                </div>
                                <div class="menu-item mb-2">
                                    <a href="{{ route('seller.dashboard') }}">Dashboard</a>
                                </div>
                                <div class="menu-item mb-2">
                                    <a href="{{ route('profile.index') }}">Account Settings</a>
                                </div>
                                @if($logedInCustomer)
                                    <div class="menu-item mb-2">
                                        <a href="{{ route('auth.logout') }}">Sign Out</a>
                                    </div>
                                @else
                                    <div class="menu-item mb-2">
                                        <a href="{{ route('auth.signin') }}">Sign In</a>
                                    </div>
                                @endif
                            </div>
                            <div class="d-none menu-item mb-2">
                                <a class="px-2 px-xxl-4" href="#getApp">Get the app</a>
                            </div>
                            <div class="menu-item mb-2 d-none d-lg-block">
                                <a class="px-2 px-xxl-4" href="{{route('seller.create.listing')}}">List an item</a>
                            </div>
                            <div class="d-none d-lg-block">
                                <div class="menu-item mb-2 ">
                                    <button
                                        class="px-2 px-xxl-4 p-0 border-0 bg-transparent df-cart-icon d-flex align-items-center"
                                        id="toggleCartButton">
                                        <i class="fa fa-shopping-cart">
                                            <div class="shadow-lg">1</div>
                                        </i>
                                        <div class="ms-2" style="color: #969696; font-weight: 600; font-size: 14px;">
                                            Cart
                                        </div>
                                    </button>
                                    <div id="toggleCartDiv" style="display: none;">
                                        <div
                                            class="w-350px bg-white border border-2 border-black position-fixed shadow rounded-start-3"
                                            style="top: 7.25rem; right: 0; z-index: 1045; ">
                                            <div class="py-4 px-5 d-flex justify-content-between align-items-center ">
                                                <div class="fw-bold" style="font-size: 15px">Cart</div>
                                                <div id="closeCart" class="cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                         fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div style="width:100%; height: 2px; background-color: #4a55621c"></div>
                                            <div class="pt-4 pb-10 px-5 bg-white"
                                                 style="height: calc(100vh - 6.76rem); overflow-y: auto;">
                                                <div class=py-2">
                                                    <div class="d-flex gap-2">
                                                        <img class="border border-2 border-gray-300 rounded-3"
                                                             width="80px"
                                                             height="80px"
                                                             src="{{asset('assets/media/products/20.png')}}" alt="">
                                                        <div>
                                                            <div class="fw-semibold">Cheeky Tint Blush Stick</div>
                                                            <small class="text-muted">Watch Strap Color:Black
                                                                golden</small>
                                                            <a class="d-flex align-items-center text-gray-800 gap-2 mt-3 cursor-pointer">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                     height="16"
                                                                     fill="#a1a5b7" class="bi bi-trash3"
                                                                     viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                                </svg>
                                                                <div class="text-muted df-fs-12">Remove from cart</div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mt-2">
                                                        <div class="input-group ">
                                                            <input type="button" value="-"
                                                                   class="button-minus p-5 bg-primary text-white border-0 lh-0 icon-shape icon-sm "
                                                                   data-field="quantity">
                                                            <input type="number" step="1" max="10" value="1"
                                                                   name="quantity"
                                                                   class="quantity-field border-0 text-center w-25">
                                                            <input type="button" value="+"
                                                                   class="button-plus p-5 bg-primary text-white border-0 lh-0 icon-shape icon-sm  "
                                                                   data-field="quantity">
                                                        </div>
                                                        <div class="fw-bolder text-center text-md-end fs-5">
                                                            $7382
                                                        </div>
                                                    </div>
                                                    <div class="my-3"
                                                         style="width:100%; height: 2px; background-color: #9ba4ae1c"></div>
                                                </div>
                                                <div class=py-2">
                                                    <div class="d-flex gap-2">
                                                        <img class="border border-2 border-gray-300 rounded-3"
                                                             width="80px"
                                                             height="80px"
                                                             src="{{asset('assets/media/products/20.png')}}" alt="">
                                                        <div>
                                                            <div class="fw-semibold">Cheeky Tint Blush Stick</div>
                                                            <small class="text-muted">Watch Strap Color:Black
                                                                golden</small>
                                                            <a class="d-flex align-items-center text-gray-800 gap-2 mt-3 cursor-pointer">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                     height="16"
                                                                     fill="#a1a5b7" class="bi bi-trash3"
                                                                     viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                                </svg>
                                                                <div class="text-muted df-fs-12">Remove from cart</div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mt-2">
                                                        <div class="input-group ">
                                                            <input type="button" value="-"
                                                                   class="button-minus p-5 bg-primary text-white border-0 lh-0 icon-shape icon-sm "
                                                                   data-field="quantity">
                                                            <input type="number" step="1" max="10" value="1"
                                                                   name="quantity"
                                                                   class="quantity-field border-0 text-center w-25">
                                                            <input type="button" value="+"
                                                                   class="button-plus p-5 bg-primary text-white border-0 lh-0 icon-shape icon-sm  "
                                                                   data-field="quantity">
                                                        </div>
                                                        <div class="fw-bolder text-center text-md-end fs-5">
                                                            $7382
                                                        </div>
                                                    </div>
                                                    <div class="my-3"
                                                         style="width:100%; height: 2px; background-color: #9ba4ae1c"></div>
                                                </div>
                                            </div>
                                            <div class="position-fixed bottom-0 bg-white py-4"
                                                 style="box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1);">
                                                <div class="d-flex justify-content-center px-5">
                                                    <a href="{{Route('cart')}}"
                                                       class=" btn btn-sm btn-primary text-white text-center text-uppercase"
                                                       style="width: 315px">
                                                        View Cart
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item mb-2 d-none d-lg-block">
                                <button class="px-2 px-xxl-4 p-0 border-0 bg-transparent" id="toggleNotificationButton">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#5d6eb3"
                                         class="bi bi-bell" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                                    </svg>
                                </button>
                                <div id="toggleDiv" style="display: none;">
                                    <div
                                        class="w-350px bg-white border border-2 border-black position-fixed shadow rounded-start-3"
                                        style="top: 7.25rem; right: 0; z-index: 1045">
                                        <div class="py-4 px-5 d-flex justify-content-between align-items-center">
                                            <div class="fw-bold" style="font-size: 15px">Notifications</div>
                                            <div id="closeNotification" class="cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                     fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div style="width:100%; height: 2px; background-color: #4a55621c"></div>
                                        <div class="pt-4 pb-10 px-5 bg-white"
                                             style="height: calc(100vh - 6.76rem); overflow-y: auto;">
                                            <div class="text-uppercase fw-bold df-fs-12 mb-2">Today</div>
                                            <div class="d-flex justify-content-between align-content-center mb-2">
                                                <div class="d-flex align-content-center ">
                                                    <div class="symbol symbol-35px symbol-circle me-3">
                                                        <img src="http://dealfair.app.test/assets/media/avatars/300-1.jpg" alt="">
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold df-fs-14">User name</div>
                                                        <div class="df-fs-12">Don't miss our best features. Sign up or
                                                            log in to make offers in your price rang our own items.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-muted">3m</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-content-center mb-2">
                                                <div class="d-flex align-content-center ">
                                                    <div class="symbol symbol-35px symbol-circle me-3">
                                                        <img
                                                            src="http://dealfair.app.test/assets/media/avatars/300-1.jpg"
                                                            alt="">
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold df-fs-14">User name</div>
                                                        <div class="df-fs-12">Don't miss our best features. Sign up or
                                                            log in to make offers in your price rang our own items.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-muted">3m</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-content-center mb-2">
                                                <div class="d-flex align-content-center ">
                                                    <div class="symbol symbol-35px symbol-circle me-3">
                                                        <img
                                                            src="http://dealfair.app.test/assets/media/avatars/300-1.jpg"
                                                            alt="">
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold df-fs-14">User name</div>
                                                        <div class="df-fs-12">Don't miss our best features. Sign up or
                                                            log in to make offers in your price rang our own items.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-muted df-fs-12">3m</div>
                                            </div>
                                            <div class="d-flex justify-content-between align-content-center mb-2">
                                                <div class="d-flex align-content-center ">
                                                    <div class="symbol symbol-35px symbol-circle me-3">
                                                        <img
                                                            src="http://dealfair.app.test/assets/media/avatars/300-1.jpg"
                                                            alt="">
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold df-fs-14">User name</div>
                                                        <div class="df-fs-12">Don't miss our best features. Sign up or
                                                            log in to make offers in your price rang our own items.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-muted">3m</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-lg-block">
                                <div class="menu-item mb-2">
                                    @if (!$logedInCustomer)
                                        <a href="{{ route('auth.signin') }}" class="px-2 px-xxl-4"
                                           data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Sign In</a>
                                    @else
                                        @if ($logedInCustomer->hasRole(RolesEnum::CUSTOMER->value))
                                            @include('frontend.layouts.user-menu')
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="d-flex d-lg-none justify-content-center {{Request::route()->getName() == 'products.index' || 'communities' ? 'justify-content-between gap-2' : ''}}">
            <div class="w-100">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control dealfair-border-right-0"
                           placeholder="Search for anything.." id="basic-url" aria-describedby="basic-addon3">
                    <span class="input-group-text bg-primary"><span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                         fill="#ffffff"
                         class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                        </span>
                    </span>
                </div>
            </div>
            @if (Request::route()->getName() == 'products.index')
                <div class="d-block d-lg-none">
                    <button type="button" class="btn btn-sm btn-primary mv-filter-btn " data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff"
                             class="bi bi-funnel"
                             viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
                        </svg>
                    </button>
                </div>
            @elseif(Request::route()->getName() == 'communities')
                <div class="d-block d-lg-none">
                    <button type="button" class="btn btn-sm btn-primary mv-filter-btn " data-bs-toggle="modal"
                            data-bs-target="#staticBackdropCommunity">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff"
                             class="bi bi-funnel"
                             viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
                        </svg>
                    </button>
                </div>
            @else
                <div class="d-none">
                    <div class="btn btn-sm btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff"
                             class="bi bi-funnel"
                             viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
                        </svg>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
