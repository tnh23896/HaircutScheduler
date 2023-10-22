<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    @include('client.templates.link_header')
    @yield('css_header_custom')
</head>

<body>
    @include('client.templates.navbar')
		@yield('content')
		@include('client.templates.footer')

  @include('client.templates.link_footer')
  @yield('js_footer_custom')
</body>

</html>
