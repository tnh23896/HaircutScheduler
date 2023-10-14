<!DOCTYPE html>

<html lang="en" class="dark">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>@yield('title')</title>
    @include('admin.templates.link_header')
    @yield('css_header_custom')
    @include('admin.templates.link_header')
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
    <script src="{{ asset('js/helper-ajax.js') }}"></script>
</head>

<body class="py-5">
    <div class="flex mt-[4.7rem] md:mt-0">
        <!-- BEGIN: Side Menu -->
        @include('admin.templates.navbar')
        <div class="intro-y  items-center mt-8">
            <div class="grid ">
                @include('admin.templates.error')
                @yield('content')
            </div>
        </div>
    </div>


    <script src="{{ asset('dist/js/app.js') }}"></script>

    <!-- END: JS Assets-->
    @include('admin.templates.footer')

    @yield('js_footer_custom')
    @yield('ajax')
    @include('admin.templates.link_footer')
</body>

<!-- Mirrored from rubick-html.vercel.app/side-menu-dark-accordion.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Jun 2023 10:58:45 GMT -->

</html>
