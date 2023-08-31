<!--begin::Menu wrapper-->
{{--<div class="d-lg-block" id="kt_header_nav_wrapper">--}}
{{--    <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"--}}
{{--        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px"--}}
{{--        data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"--}}
{{--        data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">--}}
        <!--begin::Menu-->
        <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold"
            id="kt_landing_menu">
            <!--begin::Menu item-->
            <div class="menu-item">
                <!--begin::Menu link-->
                <a class="nav-link active py-3 px-4 px-xxl-6" style="color: #bdbdbd;" href="#getApp">Get the app</a>
                <!--end::Menu link-->
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item">
                @if (!GlobalHelper::getUser())
                    <a href="{{ route('auth.signin') }}" class="nav-link active py-3 px-4 px-xxl-6" style="color: #bdbdbd;" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Sign
                        In</a>
                @else
                    @if (GlobalHelper::getUser()->hasRole(\App\Enums\RolesEnum::CUSTOMER->value))
                        @include('frontend.layouts.user-menu')
                    @endif
                @endif
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item d-lg-block">
                <!--begin::Menu link-->
                <a class="btn btn-primary px-xxl-6 p-3" href="{{route('listing.index')}}">List an item</a>
                <!--end::Menu link-->
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu-->
{{--    </div>--}}
{{--</div>--}}
{{--<div>--}}
{{--    <a class="btn btn-primary px-xxl-6 p-3" href="{{route('listing.index')}}">List an item</a>--}}
{{--</div>--}}
<!--begin::Toolbar-->
{{-- <div class="">
    <a href="#" class="btn btn-primary p-3 me-5">List an item</a>
</div> --}}
<!--end::Toolbar-->
<!--end::Menu wrapper-->
{{-- <div class="d-flex align-items-center">
    <a class="me-5 fs-4 fw-semibold" style="color: #bdbdbd;" href="#">Get the app</a>
    @if (!GlobalHelper::getUser())
        <a href="{{ route('auth.signin') }}" class="me-5 fs-4 fw-semibold" style="color: #bdbdbd;">Sign In</a>
    @else
        @if (GlobalHelper::getUser()->hasRole(\App\Enums\RolesEnum::CUSTOMER->value))
            @include('frontend.layouts.user-menu')
        @endif
    @endif
    <a href="#" class="btn btn-primary p-3 me-5">List an item</a>
</div> --}}
