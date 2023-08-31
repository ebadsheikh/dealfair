<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    @if (GlobalHelper::getSettingValue('website_favicon'))
        <link rel="shortcut icon" href="{{ GlobalHelper::getSettingValue('website_favicon') }}"/>
    @else
        <link rel="shortcut icon" href="{{ asset('assets/media/logos/small-logo.png') }}"/>
    @endif
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/custom-admin-style.css')}}" rel="stylesheet" type="text/css"/>
    @stack('custom-styles')
    @livewireStyles
</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
      data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
      data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">


<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        @include('admin.layouts.header')

        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            @include('admin.layouts.left_sidebar')
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

                @yield('content')

                @include('admin.layouts.footer')

            </div>
        </div>
    </div>
</div>

@include('custom-scripts.theme-mode')
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{asset('assets/frontend/js/noInputFocus.js')}}"></script>
@include('custom-scripts.toast')
@stack('custom-scripts')
@livewireScripts
</body>
</html>
