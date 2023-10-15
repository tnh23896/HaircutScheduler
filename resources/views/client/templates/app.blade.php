<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from madebydesignesia.com/themes/blaxcut/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Aug 2023 08:10:12 GMT -->

<head>
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('client/images/icon.png') }}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="@yield('title')" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <!-- CSS Files
    ================================================== -->
    @include('client.templates.link_header')
</head>

<body class="dark-scheme">
    <div id="wrapper">
        @include('client.templates.navbar')
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            @yield('content')
        </div>
    </div>
    @include('client.templates.footer')
    <div id="de-loader"></div>

    <!-- page preloader begin -->
    @include('client.templates.link_footer')
    @yield('js_footer_custom')
</body>

<!-- Mirrored from rubick-html.vercel.app/side-menu-dark-accordion.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Jun 2023 10:58:45 GMT -->

</html>
