<!DOCTYPE html>
<html>

<!-- Mirrored from html.webinane.com/hair-cutter/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Oct 2023 03:45:55 GMT -->

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    @include('client.templates.link_header')
</head>

<body>
    @include('client.templates.navbar')
    @include('client.templates.banner')
		@yield('content')
		@include('client.templates.footer')

  @include('client.templates.link_footer')
</body>

<!-- Mirrored from html.webinane.com/hair-cutter/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Oct 2023 03:46:51 GMT -->

</html>
