<!DOCTYPE html>

<html lang="en" class="dark">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Login - Midone - Tailwind HTML Admin Template</title>

        <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />
 
    </head>
    <!-- END: Head -->
    <body class="login ">
        <div class="absolute top-1/2 ml-12 transform -translate-x-1/2 -translate-y-1/2 text-white text-sm bg-black bg-opacity-75 p-2 rounded-lg z-10">

            @include('admin.templates.error')
        </div>
        @yield('content')
        <script src="{{asset('dist/js/app.js')}}"></script>
        <!-- END: JS Assets-->
    </body>

<!-- Mirrored from rubick-html.vercel.app/login-dark-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Jun 2023 10:58:44 GMT -->
</html>