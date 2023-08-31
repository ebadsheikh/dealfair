@php
    use App\Enums\RolesEnum;
    use App\Helpers\GlobalHelper;

    $logedInCustomer = GlobalHelper::getUser();
    $logedInCustomerProfilePic = GlobalHelper::getProfilePic();
@endphp
<div id="kt_app_header" class="app-header ">
    <div class="app-container container-fluid d-flex align-items-center justify-content-between "
         id="kt_app_header_container">
        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
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
            </div>
        </div>
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{route('home')}}" class="d-lg-none">
                <img alt="Logo" src="{{ asset('assets/media/Asset 4-8.png') }}" class="h-20px h-xl-30px"/>
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-end header-nav" id="kt_app_header_wrapper">
            <div class="menu-item ">
                <a class="px-2 px-xxl-4" href="https://dealfair.app/seller/create/listing">List an item</a>
            </div>
            <div class="menu-item ">
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
            <div class="menu-item ">
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

