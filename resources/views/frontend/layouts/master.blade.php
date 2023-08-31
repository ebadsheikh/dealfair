<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>@yield('title')</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    @if (GlobalHelper::getSettingValue('website_favicon'))
        <link rel="shortcut icon" href="{{ GlobalHelper::getSettingValue('website_favicon') }}"/>
    @else
        <link rel="shortcut icon" href="{{ asset('assets/media/logos/small-logo.png') }}"/>
    @endif

    <link href="{{ asset('assets/frontend/panel/plugins/global/plugins.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <link rel="stylesheet" href="{{asset('assets/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/owl-carousel/owl.theme.css')}}">
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.3/dist/cdn.min.js"></script>
    <style>
        .listing-title-ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .listing-title-ul .listing-title-li {
            padding: 10px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            cursor: pointer;
        }

        .listing-title-ul .listing-title-li:hover {
            background-color: #e9e9e9;
        }

        #TitleSearchResult {
            position: absolute;
            z-index: 999;
            width: 95%;
            max-height: 150px;
            /* set a fixed height */
            overflow-y: scroll;
            /* enable vertical scrolling */
            background-color: #fff;
            border: 1px solid #ced4da;
            border-top: none;
        }
    </style>
    @stack('styles')
    @livewireStyles

</head>

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="position-relative app-blank" style="background-color: #F4F4F4">
@include('frontend.layouts.header')
<div class="d-flex flex-column flex-root " data-bs-target=".landing-header" id="kt_app_root">
    @yield('content')
    @include('frontend.layouts.footer')
    @include('frontend.layouts.scroll-to-top')
</div>

<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/support-center/tickets/create.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.36/moment-timezone-with-data.js"></script>
@include('custom-scripts.toast')
<script>
    if (window.location.hash === '#_=_') {
        window.location.hash = '';
    }
</script>
<script src="{{asset('assets/frontend/js/toggleCart.js')}}"></script>
<script src="{{asset('assets/frontend/js/toggleNotification.js')}}"></script>
<script src="{{asset('assets/frontend/js/noInputFocus.js')}}"></script>
@stack('scripts')
@livewireScripts
</body>
</html>
