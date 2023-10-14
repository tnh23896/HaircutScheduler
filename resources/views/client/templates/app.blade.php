<!DOCTYPE html>
<html lang="zxx">


<head>
	@include('client.templates.header')
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


</html>
