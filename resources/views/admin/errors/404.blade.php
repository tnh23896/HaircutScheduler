<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="dark">
<!-- BEGIN: Head -->

<!-- Mirrored from rubick-html.vercel.app/main-dark-error-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Jun 2023 10:58:44 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>404 Not found</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5">
    <div class="container">
        <!-- BEGIN: Error Page -->
        <div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
            <div class="-intro-x lg:mr-20">
                <img alt="Midone - HTML Admin Template" class="h-48 lg:h-auto"
                    src="{{ asset('dist/images/error-illustration.svg') }}">
            </div>
            <div class="text-white mt-10 lg:mt-0">
                <div class="intro-x text-8xl font-medium">404</div>
                <div class="intro-x text-xl lg:text-3xl font-medium mt-5">
                    Không tìm thấy trang</div>
                <div class="intro-x text-lg mt-3">Bạn vui lòng chuyển trang khác</div>
                <a href="{{ url()->previous() }}"
                    class="intro-x btn py-3 px-4 text-white border-white dark:border-darkmode-400 dark:text-slate-200 mt-10">Quay lại</a>
            </div>
        </div>
        <!-- END: Error Page -->
    </div>


    <!-- BEGIN: JS Assets-->
    <script src="{{ asset('dist/js/app.js') }}"></script>
    <!-- END: JS Assets-->
</body>

<!-- Mirrored from rubick-html.vercel.app/main-dark-error-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Jun 2023 10:58:44 GMT -->

</html>
