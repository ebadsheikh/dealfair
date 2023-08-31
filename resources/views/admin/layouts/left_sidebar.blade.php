<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="{{ route('admin.dashboard') }}" class="mx-auto justify-content-center">
            @if (GlobalHelper::getSettingValue('admin_logo'))
                <img alt="Logo" src="{{ GlobalHelper::getSettingValue('admin_logo') }}"
                     class="h-40px app-sidebar-logo-default "/>
                <img alt="Logo" src="{{ GlobalHelper::getSettingValue('admin_logo') }}"
                     class="h-30px app-sidebar-logo-minimize"/>
            @else
                <img alt="Logo" src="{{ asset('assets/media/logos/logo.png') }}"
                     class="h-40px app-sidebar-logo-default "/>
                <img alt="Logo" src="{{ asset('assets/media/logos/small-logo.png') }}"
                     class="h-30px app-sidebar-logo-minimize"/>
            @endif
        </a>
        <div id="kt_app_sidebar_toggle"
             class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="app-sidebar-minimize">
            <span class="svg-icon svg-icon-2 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                          d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                          fill="currentColor"/>
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor"/>
                </svg>
            </span>
        </div>
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
             data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
             data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
             data-kt-scroll-save-state="true">
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                 data-kt-menu="true" data-kt-menu-expand="false">

                <div class="menu-item">
                    <a class="menu-link  {{ Request::route()->getName() == 'admin.dashboard' ? 'active' : '' }}"
                       href="{{ route('admin.dashboard') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                                    <path fill-rule="evenodd"
                                          d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ in_array(Request::route()->getName(), ['admin.listings', 'admin.reported.products', 'admin.reported.reasons']) ? 'show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
                                    <path
                                        d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Listings</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div
                        class="menu-sub menu-sub-accordion {{ in_array(Request::route()->getName(), ['admin.listings', 'admin.reported.products', 'admin.reported.reasons']) ? 'show' : '' }}">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.listings' ? 'active' : '' }}"
                               href="{{ route('admin.listings') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">All Listings</span>
                            </a>
                        </div>
{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link {{ Request::route()->getName() == 'admin.reported.products' ? 'active' : '' }}"--}}
{{--                               href="#">--}}
{{--                                <span class="menu-bullet">--}}
{{--                                    <span class="bullet bullet-dot"></span>--}}
{{--                                </span>--}}
{{--                                <span class="menu-title">Reported Listings</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link {{ Request::route()->getName() == 'admin.reported.reasons' ? 'active' : '' }}"--}}
{{--                               href="#">--}}
{{--                                <span class="menu-bullet">--}}
{{--                                    <span class="bullet bullet-dot"></span>--}}
{{--                                </span>--}}
{{--                                <span class="menu-title">Reported Reasons</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                    </div>
                </div>

                @canany(['View Customer List', 'Create Customer', 'View Staff List', 'Create Staff'])
                    <div data-kt-menu-trigger="click"
                         class="menu-item  menu-accordion {{ in_array(Request::route()->getName(), [
                            'admin.users',
                            'admin.customers.create',
                            'admin.index',
                            'admin.user.reported',
                            'admin.customers.index',
                            'admin.staff.index',
                            'admin.staff.create',
                            'admin.create',
                            'admin.franchise-affiliates',
                        ])
                            ? 'show'
                            : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                        <path
                                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">Users</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            @canany(['View Customer list', 'Create Customer'])
                                <div class="menu-item">
                                    <div class="menu-content">
                                        <span
                                            class="menu-section text-muted text-uppercase fs-8 ls-1">Customer Info</span>
                                    </div>
                                </div>

                                @can('View Customer list')
                                    <div class="menu-item">
                                        <a class="menu-link {{ Request::route()->getName() == 'admin.customers.index' ? 'active' : '' }}"
                                           href="{{ route('admin.customers.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Customer List</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('Create Customer')
                                    <div class="menu-item">
                                        <a class="menu-link {{ Request::route()->getName() == 'admin.customers.create' ? 'active' : '' }}"
                                           href="{{ route('admin.customers.create') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Add Customer</span>
                                        </a>
                                    </div>
                                @endcan
                            @endcanany

                            @canany(['View Staff list', 'Create Staff'])
                                <div class="menu-item">
                                    <div class="menu-content">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Staff Info</span>
                                    </div>
                                </div>
                                @can('View Staff list')
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link {{ Request::route()->getName() == 'admin.staff.index' ? 'active' : '' }}"
                                           href="{{ route('admin.staff.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Staff List</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('Create Staff')
                                    <div class="menu-item">
                                        <a class="menu-link {{ Request::route()->getName() == 'admin.staff.create' ? 'active' : '' }}"
                                           href="{{ route('admin.staff.create') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Add Staff</span>
                                        </a>
                                    </div>
                                @endcan
                            @endcanany

                            @can('View Reported Users')
                                <div class="menu-item">
                                    <div class="menu-content">
                                        <span
                                            class="menu-section text-muted text-uppercase fs-8 ls-1">Reported Info</span>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::route()->getName() == 'admin.user.reported' ? 'active' : '' }}"
                                       href="{{ route('admin.user.reported') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Reported Users</span>
                                    </a>
                                </div>
                            @endcan


                        </div>
                    </div>

                @endcanany



                @canany([
                    'View Categories',
                    'Create Category',
                    ])
                    <div data-kt-menu-trigger="click"
                         class="menu-item menu-accordion {{ in_array(Request::route()->getName(), ['admin.category.index','admin.category.add','admin.category.brand.index']) ? 'show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-diagram-3-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zm-6 8A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm6 0A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm6 0a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1z"/>
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">Categories</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            @can('View Categories')
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::route()->getName() == 'admin.category.index' ? 'active' : '' }}"
                                       href="{{ route('admin.category.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                        <span class="menu-title">All Categories</span>
                                    </a>
                                </div>
                            @endcan

                            @can('Create Category')
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::route()->getName() == 'admin.category.add' ? 'active' : '' }}"
                                       href="{{ route('admin.category.add') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                        <span class="menu-title">Add Category</span>
                                    </a>
                                </div>
                            @endcan

                            <div class="menu-item">
                                <a class="menu-link {{ Request::route()->getName() == 'admin.category.brand.index' ? 'active' : '' }}"
                                   href="{{route('admin.category.brand.index')}}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                    <span class="menu-title">Category Brand</span>
                                </a>
                            </div>

                        </div>
                    </div>
                @endcanany


                @canany(['View Communities', 'View Affiliated Users'])
                    <div data-kt-menu-trigger="click"
                         class="menu-item menu-accordion {{ in_array(Request::route()->getName(), ['admin.communities.index', 'admin.franchise-affiliates']) ? 'show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-globe-central-south-asia" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM4.882 1.731a.482.482 0 0 0 .14.291.487.487 0 0 1-.126.78l-.291.146a.721.721 0 0 0-.188.135l-.48.48a1 1 0 0 1-1.023.242l-.02-.007a.996.996 0 0 0-.462-.04 7.03 7.03 0 0 1 2.45-2.027Zm-3 9.674.86-.216a1 1 0 0 0 .758-.97v-.184a1 1 0 0 1 .445-.832l.04-.026a1 1 0 0 0 .152-1.54L3.121 6.621a.414.414 0 0 1 .542-.624l1.09.818a.5.5 0 0 0 .523.047.5.5 0 0 1 .724.447v.455a.78.78 0 0 0 .131.433l.795 1.192a1 1 0 0 1 .116.238l.73 2.19a1 1 0 0 0 .949.683h.058a1 1 0 0 0 .949-.684l.73-2.189a1 1 0 0 1 .116-.238l.791-1.187A.454.454 0 0 1 11.743 8c.16 0 .306.084.392.218.557.875 1.63 2.282 2.365 2.282a.61.61 0 0 0 .04-.001 7.003 7.003 0 0 1-12.658.905Z"/>
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">Franchises</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            @can('View Communities')
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::route()->getName() == 'admin.communities.index' ? 'active' : '' }}"
                                       href="{{ route('admin.communities.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Communities</span>
                                    </a>
                                </div>
                            @endcan

                            @can('View Affiliated Users')
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::route()->getName() == 'admin.franchise-affiliates' ? 'active' : '' }}"
                                       href="{{ route('admin.franchise-affiliates') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Affiliated User</span>
                                    </a>
                                </div>
                            @endcan


                        </div>
                    </div>
                @endcanany


                <div class="menu-item">
                    <a class="menu-link {{ Request::route()->getName() == 'admin.dynamic-pages.index' ? 'active' : '' }}"
                       href="{{ route('admin.dynamic-pages.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Dynamic Pages</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ in_array(Request::route()->getName(), ['admin.keywords.index', 'admin.keywords.create', 'admin.brands.index', 'admin.brands.create']) ? 'show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path
                                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                    <path
                                        d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Auto-completion</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">
                            <a class="menu-link {{ Str::startsWith(Request::route()->getName(), 'admin.keywords') ? 'active' : '' }}"
                               href="{{ route('admin.keywords.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">All Keywords</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Str::startsWith(Request::route()->getName(), 'admin.brands') ? 'active' : '' }}"
                               href="{{ route('admin.brands.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Brands</span>
                            </a>
                        </div>

                    </div>
                </div>

                @canany(['View Ticket Categories', 'View Tickets'])
                    <div data-kt-menu-trigger="click"
                         class="menu-item menu-accordion {{ in_array(Request::route()->getName(), ['admin.ticket.category.index', 'admin.tickets.index']) ? 'show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4-1v1h1v-1H4Zm1 3v-1H4v1h1Zm7 0v-1h-1v1h1Zm-1-2h1v-1h-1v1Zm-6 3H4v1h1v-1Zm7 1v-1h-1v1h1Zm-7 1H4v1h1v-1Zm7 1v-1h-1v1h1Zm-8 1v1h1v-1H4Zm7 1h1v-1h-1v1Z"/>
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">Support</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">

                            @can('View Ticket Categories')
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::route()->getName() == 'admin.ticket.category.index' ? 'active' : '' }}"
                                       href="{{ route('admin.ticket.category.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Tickets Category</span>
                                    </a>
                                </div>
                            @endcan

                            @can('View Tickets')
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::route()->getName() == 'admin.tickets.index' ? 'active' : '' }}"
                                       href="{{ route('admin.tickets.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Tickets</span>
                                    </a>
                                </div>
                            @endcan


                        </div>
                    </div>
                @endcanany


                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ in_array(Request::route()->getName(), ['admin.stores', 'admin.reported.stores']) ? 'show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
                                    <path
                                        d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Store</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.stores' ? 'active' : '' }}"
                               href="{{ route('admin.stores') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">All Stores</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.reported.stores' ? 'active' : '' }}"
                               href="{{ route('admin.reported.stores') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Reported Stores</span>
                            </a>
                        </div>

                    </div>
                </div>

                @canany(['View Article Categories', 'View Articles'])
                    <div data-kt-menu-trigger="click"
                         class="menu-item menu-accordion {{ in_array(Request::route()->getName(), ['admin.article.category.index', 'admin.article.index']) ? 'show' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                                        <path
                                            d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">Knowledge Base</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            @can('View Article Categories')
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::route()->getName() == 'admin.article.category.index' ? 'active' : '' }}"
                                       href="{{ route('admin.article.category.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Article Category</span>
                                    </a>
                                </div>
                            @endcan
                            @can('View Articles')
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::route()->getName() == 'admin.article.index' ? 'active' : '' }}"
                                       href="{{ route('admin.article.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Articles</span>
                                    </a>
                                </div>
                            @endcan

                        </div>
                    </div>
                @endcanany


                <div class="menu-item">
                    <a class="menu-link {{ Request::route()->getName() == 'admin.announcement.view' ? 'active' : '' }}"
                       href="{{ route('admin.announcement.view') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-megaphone" viewBox="0 0 16 16">
                                    <path
                                        d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975 1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Announcements</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Str::startsWith(Request::route()->getName(), 'admin.advertisement-plans') ? 'active' : '' }}"
                       href="{{ route('admin.advertisement-plans.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-badge-ad" viewBox="0 0 16 16">
                                    <path
                                        d="m3.7 11 .47-1.542h2.004L6.644 11h1.261L5.901 5.001H4.513L2.5 11h1.2zm1.503-4.852.734 2.426H4.416l.734-2.426h.053zm4.759.128c-1.059 0-1.753.765-1.753 2.043v.695c0 1.279.685 2.043 1.74 2.043.677 0 1.222-.33 1.367-.804h.057V11h1.138V4.685h-1.16v2.36h-.053c-.18-.475-.68-.77-1.336-.77zm.387.923c.58 0 1.002.44 1.002 1.138v.602c0 .76-.396 1.2-.984 1.2-.598 0-.972-.449-.972-1.248v-.453c0-.795.37-1.24.954-1.24z"/>
                                    <path
                                        d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Advertisement Plans</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Request::route()->getName() == 'admin.email-templates.index' ? 'active' : '' }}"
                       href="{{ route('admin.email-templates.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-envelope-paper" viewBox="0 0 16 16">
                                    <path
                                        d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2H4Zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6v-2.55Zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v5.417Zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267v2.55Zm13 .566v5.734l-4.778-2.867L15 7.383Zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083l6.965 4.18ZM1 13.116V7.383l4.778 2.867L1 13.117Z"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Email Templates</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Request::route()->getName() == 'admin.refund-requests' ? 'active' : '' }}"
                       href="{{ route('admin.refund-requests') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                    <path
                                        d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Refund Requests</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ Request::route()->getName() == 'admin.roles.index' ? 'active' : '' }}"
                       href="{{ route('admin.roles.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                                    <path
                                        d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Roles & Permission</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion
                        {{ Str::startsWith(Request::route()->getName(), 'admin.onboarding.') ? 'show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                    <path
                                        d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Onboarding</span>
                        <span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.onboarding.step.one' ? 'active' : '' }}"
                               href="{{ route('admin.onboarding.step.one') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Step One</span>
                            </a>
                        </div>
                    </div>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.onboarding.step.two' ? 'active' : '' }}"
                               href="{{ route('admin.onboarding.step.two') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Step Two</span>
                            </a>
                        </div>
                    </div>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.onboarding.step.three' ? 'active' : '' }}"
                               href="{{ route('admin.onboarding.step.three') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Step Three</span>
                            </a>
                        </div>
                    </div>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.onboarding.step.four' ? 'active' : '' }}"
                               href="{{ route('admin.onboarding.step.four') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Step Four</span>
                            </a>
                        </div>
                    </div>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.onboarding.step.five' ? 'active' : '' }}"
                               href="{{ route('admin.onboarding.step.five') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Step Five</span>
                            </a>
                        </div>
                    </div>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.onboarding.step.six' ? 'active' : '' }}"
                               href="{{ route('admin.onboarding.step.six') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Step Six</span>
                            </a>
                        </div>
                    </div>


                </div>

                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion
                            {{ Str::startsWith(Request::route()->getName(), 'admin.settings.') ? 'show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                                    <path
                                        d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Settings</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.settings.general' ? 'active' : '' }}"
                               href="{{ route('admin.settings.general') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">General Settings</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.settings.logos' ? 'active' : '' }}"
                               href="{{ route('admin.settings.logos') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Logo Settings</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.settings.auction' ? 'active' : '' }}"
                               href="{{ route('admin.settings.auction') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Product Settings</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.settings.media' ? 'active' : '' }}"
                               href="{{ route('admin.settings.media') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Media Settings</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.settings.listing.page' ? 'active' : '' }}"
                               href="{{ route('admin.settings.listing.page') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Listing Page Settings</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.settings.social.links' ? 'active' : '' }}"
                               href="{{ route('admin.settings.social.links') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Social Links Settings</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.settings.mail' ? 'active' : '' }}"
                               href="{{ route('admin.settings.mail') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Mail Settings</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.settings.aws' ? 'active' : '' }}"
                               href="{{ route('admin.settings.aws') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">AWS Settings</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.settings.pusher' ? 'active' : '' }}"
                               href="{{ route('admin.settings.pusher') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pusher Settings</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.settings.map' ? 'active' : '' }}"
                               href="{{ route('admin.settings.map') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Google Map Settings</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.settings.maintenance.mode' ? 'active' : '' }}"
                               href="{{ route('admin.settings.maintenance.mode') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Maintenance Mode</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.settings.fees' ? 'active' : '' }}"
                               href="{{ route('admin.settings.fees') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Fees Settings</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ Request::route()->getName() == 'admin.settings.wallet' ? 'active' : '' }}"
                               href="{{ route('admin.settings.wallet') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Wallet Settings</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
