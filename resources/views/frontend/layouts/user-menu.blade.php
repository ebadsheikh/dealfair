<!--begin::User menu-->
<div class="app-navbar-item" id="kt_header_user_menu_toggle">
    <!--begin::Menu wrapper-->
    <div class=" cursor-pointer symbol symbol-35px symbol-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
        data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
        <img src="{{ GlobalHelper::getProfilePic() }}" alt="user">
    </div>

    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-auto mt-2"
        data-kt-menu="true">
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <div class="symbol symbol-50px me-5">
                    <img alt="Logo" src="{{ GlobalHelper::getProfilePic() }}">
                </div>
                <div class="d-flex flex-column">
                    <div class="fw-bold d-flex align-items-center fs-5">
                        {{ GlobalHelper::getUser()->display_name }}
                        {{-- <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span> --}}
                    </div>
                    <span
                        class="fw-semibold text-muted text-hover-primary fs-7">{{ GlobalHelper::getUser()->email }}</span>
                </div>
            </div>
        </div>

        <div class="separator my-2"></div>

        <div class="menu-item px-5">
            <a href="{{ route('seller.dashboard') }}" class="menu-link px-5">Dashboard</a>
        </div>

        <div class="menu-item px-5">
            <a href="{{ route('profile.index') }}" class="menu-link px-5">Account Settings</a>
        </div>

        <div class="menu-item px-5">
            <a href="{{ route('auth.logout') }}" class="menu-link px-5">Sign Out</a>
        </div>
    </div>
</div>
