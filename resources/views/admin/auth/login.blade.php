<!DOCTYPE html>
<html lang="en">
<head>
    <base href="../../../"/>
    <title>DealFair | Login</title>
    <meta charset="utf-8"/>
    <meta name="description"
          content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free."/>
    <meta name="keywords"
          content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title"
          content="Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel Admin Dashboard Theme"/>
    <meta property="og:url" content="https://keenthemes.com/metronic"/>
    <meta property="og:site_name" content="Keenthemes | Metronic"/>
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
    @if((GlobalHelper::getSettingValue('admin_logo')))
        <link rel="shortcut icon" href="{{ GlobalHelper::getSettingValue('admin_logo') }}"/>
    @else
        <link rel="shortcut icon" href="{{ asset('assets/media/logos/small-logo.png') }}"/>
    @endif
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
</head>
<body id="kt_body" class="app-blank app-blank">
<script>
    var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-theme-mode");
        } else {
            if (localStorage.getItem("data-theme") !== null) {
                themeMode = localStorage.getItem("data-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-theme", themeMode);
    }
</script>
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <div class="w-lg-500px p-10">
                    <form class="form w-100" method="POST" action="{{ Route('login') }}">
                        @csrf
                        <div class="text-center mb-11">
                            <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                            <div class="text-gray-500 fw-semibold fs-6">Enter your email to password to login.</div>
                        </div>
                        <div class="form-group">
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session('error') }}
                                </div>
                            @endif
                            @if (Session::has('message'))
                                <div class="alert alert-success">
                                    {{ Session('message') }}
                                </div>
                            @endif
                        </div>
                        <div class="fv-row mb-8">
                            <input type="text" placeholder="Email" name="email" autocomplete="off"
                                   class="form-control bg-transparent"/>
                            @error('email')
                            <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fv-row mb-3">
                            <input type="password" placeholder="Password" name="password" autocomplete="off"
                                   class="form-control bg-transparent"/>
                            @error('password')
                            <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>
                            <a href="{{ Route('forgotpassword.view') }}"
                               class="link-primary">Forgot Password ?</a>
                        </div>
                        <div class="d-grid mb-10">
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Sign In</span>
                                <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex flex-center flex-wrap px-5">
                <div class="d-flex fw-semibold text-primary fs-base">
                    <a href="../../demo1/dist/pages/team.html" class="px-5" target="_blank">Terms</a>
                    <a href="../../demo1/dist/pages/pricing/column.html" class="px-5" target="_blank">Plans</a>
                    <a href="../../demo1/dist/pages/contact.html" class="px-5" target="_blank">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-lg-row-fluid w-lg-50 bg-primary order-1 order-lg-2">
            <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                <a href="../../demo1/dist/index.html" class="mb-0 mb-lg-12">
                    <img alt="Logo" src="{{ asset('assets/media/authDF-logo.png') }}"
                         class="h-60px h-lg-75px"/>
                </a>
                <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Based on our true story...</h1>
                <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Life Different.</h1>
                <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-400px mb-10 mb-lg-20"
                     src="{{ asset('assets/media/misc/auth-screens.png') }}" alt=""/>
            </div>
        </div>
    </div>
</div>
<script>
    var hostUrl = "assets/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
<script src="{{asset('assets/frontend/js/noInputFocus.js')}}"></script>
<!--end::Custom Javascript-->
</body>
</html>
