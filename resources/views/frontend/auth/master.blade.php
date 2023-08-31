<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @if (GlobalHelper::getSettingValue('website_favicon'))
        <link rel="shortcut icon" href="{{ GlobalHelper::getSettingValue('website_favicon') }}" />
    @else
        <link rel="shortcut icon" href="{{ asset('assets/media/authDF-logo.png') }}" />
    @endif
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @yield('custom-styles')
    <style>
        body {
            background-image: url('assets/media/auth/bg10.jpeg');
        }

        [data-theme="dark"] body {
            background-image: url('assets/media/auth/bg10-dark.jpeg');
        }
    </style>
</head>

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
<div class="container">
    <div class="row">
        <div class="col-md-6 d-none d-md-block">
            <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                     src="{{ asset('assets/media/auth/agency.png') }}" alt=""/>
                <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                     src="{{ asset('assets/media/auth/agency-dark.png') }}" alt=""/>
                <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Fast, Efficient and Productive</h1>
                <div class="text-gray-600 fs-base text-center fw-semibold">In this kind of post,
                    <a href="#" class="opacity-75-hover text-primary me-1">the blogger</a>introduces a person
                    they’ve
                    interviewed
                    <br/>and provides some background information about
                    <a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a>and their
                    <br/>work following this is a transcript of the interview.
                </div>
            </div>
        </div>
        @yield('content')
    </div>
</div>
    <script src="{{asset('assets/frontend/js/noInputFocus.js')}}"></script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    @yield('custom-scripts')

</body>

</html>
