<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/frontend/panel/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    @if (GlobalHelper::getSettingValue('website_favicon'))
        <link rel="shortcut icon" href="{{ GlobalHelper::getSettingValue('website_favicon') }}" />
    @else
        <link rel="shortcut icon" href="{{ asset('assets/media/logos/small-logo.png') }}" />
    @endif
    <link href="{{ asset('assets/frontend/panel/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/owl-carousel/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    @yield('styles')
    @livewireStyles
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <div id="kt_header" class="header" style="background-color:  #1a1e51">
                    <div class="container-fluid d-flex flex-stack">
                        <div class="d-flex align-items-center me-5">
                            <div class="d-lg-none btn btn-icon btn-active-color-white w-30px h-30px ms-n2 me-3"
                                id="kt_aside_toggle">
                                <i class="ki-duotone ki-abstract-14 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <a href="{{ route('home') }}">
                                @if (GlobalHelper::getSettingValue('website_dashboard_logo'))
                                    <img alt="Logo"
                                        src="{{ GlobalHelper::getSettingValue('website_dashboard_logo') }}"
                                        class="h-25px h-lg-30px" />
                                @else
                                    <img alt="Logo" src="{{ asset('assets/media/authDF-logo.png') }}"
                                        class="h-30px h-lg-40px" />
                                @endif
                            </a>
                        </div>
                        <div class="d-flex align-items-center flex-shrink-0">
                            <!--begin::Theme mode-->
                            <div class="d-flex align-items-center ms-1">
                                <!--begin::Menu toggle-->
                                <a href="#"
                                    class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-30px h-30px h-40px w-40px"
                                    data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-night-day theme-light-show fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                        <span class="path10"></span>
                                    </i>
                                    <i class="ki-duotone ki-moon theme-dark-show fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <!--begin::Menu toggle-->
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                    data-kt-menu="true" data-kt-element="theme-mode-menu">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="light">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-night-day fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                    <span class="path7"></span>
                                                    <span class="path8"></span>
                                                    <span class="path9"></span>
                                                    <span class="path10"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Light</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="dark">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-moon fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Dark</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="system">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-screen fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">System</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Theme mode-->
                            @include('frontend.layouts.user-menu')
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column-fluid">
                    @include('frontend.panel.layouts.sidebar')
                    <div class="d-flex flex-column flex-column-fluid container-fluid">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('frontend.layouts.scroll-to-top')

    <script src="{{ asset('assets/frontend/panel/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/frontend/panel/js/scripts.bundle.js') }}"></script>

    <script>
        if (document.querySelector('.alert')) {
            setTimeout(() => {
                document.querySelector('.alert').remove();
            }, 5000);
        }
    </script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    @yield('scripts')
    @livewireScripts
    @yield('scripts')
    @stack('scripts')
</body>

</html>
