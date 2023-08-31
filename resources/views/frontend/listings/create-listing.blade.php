<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Listing | Dealfair</title>
    <meta charset="utf-8"/>
    <meta name="description"
          content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free."/>
    <meta name="keywords"
          content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <link href="{{ asset('assets/frontend/panel/plugins/global/plugins.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/frontend/panel/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>

    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet"/>
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
          rel="stylesheet"/>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>

        .listing-title-ul {
            list-style: none;
            margin: 0;
            padding: 0;
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

        #listingTitleSearchResult {
            position: absolute;
            z-index: 999;
            width: 40%;
            max-height: 150px;
            /* set a fixed height */
            overflow-y: scroll;
            /* enable vertical scrolling */
            background-color: #fff;
            border: 1px solid #ced4da;
            border-top: none;
        }

        .filepond.custom-width .filepond--item {
            width: calc(25% - 0.5em);
        }

        .filepond--credits {
            display: none;
        }

        ul.custom-breadcrumb li {
            display: inline;
            font-size: 13px;
            font-weight: 400;
        }

        ul.custom-breadcrumb li + li:before {
            padding: 6px;
            color: black;
            content: ">";
        }

        ul.custom-breadcrumb li a {
            color: black;
            text-decoration: none;
        }

        ul.custom-breadcrumb li a:hover {
            color: #1A1A1A;
            text-decoration: underline;
        }

        .tagify .tagify__input:before{
            white-space: normal !important;
        }
    </style>
    @livewireStyles

</head>

<body id="kt_body" class="app-blank app-blank">

<div>
    @if(isset($store))
        @livewire('frontend.listing.listing-wizard', ['storeSlug' => $store->slug])
    @else
        @livewire('frontend.listing.listing-wizard')
    @endif

</div>

<script src="{{asset('assets/frontend/panel/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/frontend/panel/js/scripts.bundle.js')}}"></script>

@livewireScripts
@stack('scripts')
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="{{asset('assets/frontend/js/noInputFocus.js')}}"></script>
<script>
    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImagePreview,
    );
</script>
</body>
</html>
