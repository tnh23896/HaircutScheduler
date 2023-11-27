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
    @include('client.templates.navbar2')
    <section class="position-relative footer-area">
        <div class="container bg-text-area">
            <h2>@yield('title_page')</h2>
        </div>
    </section>
    <section>
        <div class="block less-spacing gap  gray-bg top-padding30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="dashboard-tabs-wrapper">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-3">
                                        <div class="profile-sidebar brd-rd5 wow fadeIn" data-wow-delay="0.2s">
                                            @include('client.templates.sidebar')
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-9">
                                        <div class="tab-content">
                                            @yield('content')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Section Box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('client.templates.footer')
    @include('client.templates.link_footer')
    @yield('js_footer_custom')
</body>

</html>
