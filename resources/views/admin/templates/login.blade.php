<!DOCTYPE html>
<html lang="en" class="theme-4">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist/images/logonew2.png') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
</head>
<!-- END: Head -->

<body class="login ">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="{{ route('admin.login') }}" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/LOGO.png') }}">
                    <span class="text-white text-lg ml-3"> DT BARBER </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                        src="{{ asset('dist/images/illustration.svg') }}">
                </div>
            </div>
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                
                {{-- Form --}}
                @yield('content')
            </div>
            <!-- END: Login Form -->
        </div>
    </div>

    <script src="{{ asset('dist/js/app.js') }}"></script>
</body>

</html>
