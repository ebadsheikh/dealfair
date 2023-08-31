<!DOCTYPE html>
<html lang="en">
<head>
    <base href="../../"/>
    <title>Dealfair | Maintenance Mode</title>
    <meta charset="utf-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>

    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        body {
            background-image: url('assets/media/auth/bg9.jpg');
        }

        [data-theme="dark"] body {
            background-image: url('assets/media/auth/bg9-dark.jpg');
        }
    </style>
</head>
<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-center flex-column-fluid">
        <div class="d-flex flex-column flex-center text-center p-10">
            <div class="card card-flush w-lg-650px py-5">
                <div class="card-body py-15 py-lg-20">
                    <div class="mb-13">
                        <img alt="Logo" src="{{asset('assets/media/logos/custom-2.svg')}}" class="h-40px"/>
                    </div>
                    <h1 class="fw-bolder text-gray-900 mb-7">We're in maintenance mode</h1>

                    <div class="fw-semibold fs-6 text-gray-500 mb-7">
                        Our website is currently undergoing maintenance.
                        We apologize for the inconvenience and appreciate your patience.
                        We are working hard to get everything up and running as soon as possible.
                        Please check back later.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const defaultThemeMode = "light";
    let themeMode;
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
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
</body>
</html>
