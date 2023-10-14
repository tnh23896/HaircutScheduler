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
    <link href="{{ asset('client/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('client/css/mdb.min.csss') }}" rel="stylesheet" type="text/css" id="mdb">
    <link href="{{ asset('client/css/plugins.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('client/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('client/css/coloring.css') }}" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="{{ asset('client/css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="dark-scheme">
    <div id="wrapper">
        @include('client.templates.navbar')
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            @yield('content')
        </div>
    </div>
    <!-- page preloader begin -->
    @yield('ajax')
    <div id="de-loader"></div>
    @include('client.templates.link_footer')
</body>

<!-- Mirrored from rubick-html.vercel.app/side-menu-dark-accordion.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Jun 2023 10:58:45 GMT -->

</html>
