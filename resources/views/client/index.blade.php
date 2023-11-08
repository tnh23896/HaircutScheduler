@extends('client.templates.app')
@section('title', 'Trang chủ')
@section('content')
    @include('client.templates.navbar2')
    @include('client.templates.banner')
    <section class="gap resp-padd lg-no-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="parallax-content">
                        <span>Since 2023</span>
                        <h3>Giới thiệu</h3>
                        <h4><i>DT Barber xin chào!</i></h4>
                        <p>DT Barber là nơi tạo ra sự thay đổi đột phá cho mái tóc của bạn. Với đội ngũ các chuyên gia tạo
                            kiểu tóc hàng đầu và một loạt các dịch vụ chăm sóc tóc chất lượng, chúng tôi cam kết mang đến
                            cho bạn một trải nghiệm cắt tóc độc đáo và phong cách. </p>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <figure class="parallax-img">
                        <img class="img-fluid w-100" src="{{ asset('client/assets/images/img-98.jpg') }}" alt="parallax-image">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray gap position-relative lg-no-bottom md-no-bottom sm-no-bottom">
        <div class="service-img">
            <img src="{{ asset('client/assets/images/img-32.webp') }}" style="width: 200px;height: auto;margin-top: 6rem"
                alt="service-image">
        </div>
        <div class="container">
            <div class="heading-style text-center">
                <h2>Danh mục dịch vụ</h2>
                <span class="text-uppercase d-block text-color">Tạo nên vẻ đẹp không giới hạn qua từng nét cắt tóc.</span>
                <div class="scissor-border position-relative">
                    <span><svg fill="#332b23" height="20" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="m22.864 21.722 2.492-2.492-1.036-1.136-2.379 2.379z" />
                                <path d="m20.739 18.847 2.233-2.232-1.036-1.136-2.12 2.119z" />
                                <path d="m18.614 15.972 1.973-1.973-1.036-1.136-1.86 1.86z" />
                                <path d="m16.489 13.097 1.713-1.714-1.036-1.135-1.6 1.6z" />
                                <path d="m30.056 24.385-.967-1.06-1.761 1.761c.974.066 1.926-.184 2.728-.701z" />
                                <path d="m25.214 24.372 2.526-2.527-1.036-1.136-2.632 2.632c.32.415.711.755 1.142 1.031z" />
                                <path d="m13.433 6.153-1.036-1.136-1.081 1.082.923 1.248z" />
                                <path
                                    d="m26.331 56.275c-.821-.953-1.284-2.193-1.337-3.587-.052-1.356-.451-2.684-1.154-3.84-1.122-1.845-.956-4.417.387-5.982l.919-1.072c.791-.923 1.772-1.636 2.858-2.113l-2.278-.38c-.501-.083-.976-.246-1.418-.467l-2.88 3.538c-1.207 1.483-2.992 2.443-4.896 2.634-3.809.379-6.941 3.247-7.448 6.818-.366 2.58.48 5.093 2.322 6.895s4.379 2.59 6.957 2.17c1.294-.213 2.532-.764 3.58-1.592 1.202-.949 2.917-.853 3.988.22l1.155 1.155c.212.212.493.328.793.328.618 0 1.121-.503 1.121-1.121 0-.327-.118-.645-.332-.893zm-9.331 1.725c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z" />
                                <path
                                    d="m52.982 10.283c.666-1.032 1.018-2.226 1.018-3.455 0-1.177-.347-2.301-.991-3.255l-18.499 22.728 4.766 5.227z" />
                                <path d="m15.818 8.768-1.036-1.136-1.341 1.341.923 1.249z" />
                                <path
                                    d="m60.88 60.629-4.434-1.773c-1.432-.573-2.186-2.141-1.754-3.646.305-1.063.384-2.171.237-3.293-.473-3.618-3.572-6.521-7.37-6.901-1.954-.196-3.778-1.188-5.005-2.722l-.239-.3c-.848-1.058-1.315-2.39-1.315-3.748v-1.472c0-.25-.093-.488-.261-.673l-9.327-10.229c-1.1.792-2.42 1.227-3.785 1.227-.161 0-.323-.006-.485-.018-1.887-.141-3.613-1.095-4.738-2.615l-13.72-18.565 2.363-2.363c-.319-.34-.766-.538-1.234-.538-.334 0-.657.098-.936.283l-1.205.804c-.421.28-.672.75-.672 1.256 0 .259.067.515.194.74l16.739 29.757c.448.797 1.221 1.339 2.121 1.488l5.811.969c3.004.5 5.75 2.05 7.733 4.363l.173.2c1.333 1.556 1.55 4.173.486 5.835-1.034 1.616-1.442 3.494-1.179 5.43.469 3.456 3.198 6.241 6.636 6.774.425.067.858.101 1.286.101h13.808c.106 0 .192-.086.192-.192 0-.079-.047-.15-.12-.179zm-28.88-24.629c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm15 22c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z" />
                            </g>
                        </svg></span>
                </div>
            </div>
            <div class="service-content">
                <div class="row">
                    @foreach ($categoryService as $category)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="service-prices">
                                <div class="sec-img position-relative">
                                    <div class="sec-radius">
                                        <a href="javascript:void(0)"><img class="img-fluid w-100"
                                                src="{{ asset($category->image) }}" alt="service-image"></a>
                                    </div>
                                    {{-- <span class="icon-style">$20</span> --}}
                                </div>
                                <div class="text-center">
                                    <h3><a href="">{{ $category->name }}</a></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="table-sec gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 pr-0 pl-md-0 pl-sm-0">
                    <div class="table-content" data-aos="fade-up" data-aos-offset="300">
                        <figure class="m-0">
                            <img class="img-fluid w-100" src="{{ asset('client/assets/images/img-99.webp') }}"
                                alt="table-image">
                        </figure>
                        <div class="table-img-con text-center">
                            <a class="bg-dark-color" href="{{ asset('client/assets/demo.html') }}"
                                data-fancybox="gallery"><i class="fas fa-play"></i></a>
                            <h2>Complimentry Cold Beverage & Hot Towels</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 pl-0 pr-md-0 pr-sm-0">
                    <div class="barber-item-2 position-relative" data-aos="fade-up" data-aos-offset="400">
                        <p class="text-color">CALL NOW - (0678-999-999)</p>
                        <h3 class="mb-0">Giờ làm việc</h3>
                        <div class="barber-list-2">
                            <div class="d-flex w-100 justify-content-between">
                                <h5>Thứ 2</h5>
                                <h5 class="text-color">7h a.m - 22h p.m</h5>
                            </div>
                            <hr>
                            <div class="d-flex w-100 justify-content-between">
                                <h5>Thứ 3</h5>
                                <h5 class="text-color p-0 m-0">7h a.m - 22h p.m</h5>
                            </div>
                            <hr>
                            <div class="d-flex w-100 justify-content-between">
                                <h5>Thứ 4</h5>
                                <h5 class="text-color">7h a.m - 22h p.m</h5>
                            </div>
                            <hr>
                            <div class="d-flex w-100 justify-content-between">
                                <h5>Thứ 5</h5>
                                <h5 class="text-color">7h a.m - 22h p.m</h5>
                            </div>
                            <hr>
                            <div class="d-flex w-100 justify-content-between">
                                <h5>Thứ 6</h5>
                                <h5 class="text-color">7h a.m - 22h p.m</h5>
                            </div>
                            <hr>
                            <div class="d-flex w-100 justify-content-between">
                                <h5>Thứ 7</h5>
                                <h5 class="text-color">7h a.m - 22h p.m</h5>
                            </div>
                            <hr>
                            <div class="d-flex w-100 justify-content-between">
                                <h5>Chủ nhật</h5>
                                <h5 class="text-color">7h a.m - 22h p.m</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="barber-con gap">
        <div class="heading-style text-center">
            <h2>Thợ cắt tóc</h2>
            <span class="text-uppercase d-block text-color">Chúng tôi tôn vinh vẻ đẹp của bạn.</span>
            <div class="scissor-border position-relative">
                <span class="mt-0"><svg fill="#332b23" height="20" viewBox="0 0 64 64"
                        xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path d="m22.864 21.722 2.492-2.492-1.036-1.136-2.379 2.379z" />
                            <path d="m20.739 18.847 2.233-2.232-1.036-1.136-2.12 2.119z" />
                            <path d="m18.614 15.972 1.973-1.973-1.036-1.136-1.86 1.86z" />
                            <path d="m16.489 13.097 1.713-1.714-1.036-1.135-1.6 1.6z" />
                            <path d="m30.056 24.385-.967-1.06-1.761 1.761c.974.066 1.926-.184 2.728-.701z" />
                            <path d="m25.214 24.372 2.526-2.527-1.036-1.136-2.632 2.632c.32.415.711.755 1.142 1.031z" />
                            <path d="m13.433 6.153-1.036-1.136-1.081 1.082.923 1.248z" />
                            <path
                                d="m26.331 56.275c-.821-.953-1.284-2.193-1.337-3.587-.052-1.356-.451-2.684-1.154-3.84-1.122-1.845-.956-4.417.387-5.982l.919-1.072c.791-.923 1.772-1.636 2.858-2.113l-2.278-.38c-.501-.083-.976-.246-1.418-.467l-2.88 3.538c-1.207 1.483-2.992 2.443-4.896 2.634-3.809.379-6.941 3.247-7.448 6.818-.366 2.58.48 5.093 2.322 6.895s4.379 2.59 6.957 2.17c1.294-.213 2.532-.764 3.58-1.592 1.202-.949 2.917-.853 3.988.22l1.155 1.155c.212.212.493.328.793.328.618 0 1.121-.503 1.121-1.121 0-.327-.118-.645-.332-.893zm-9.331 1.725c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z" />
                            <path
                                d="m52.982 10.283c.666-1.032 1.018-2.226 1.018-3.455 0-1.177-.347-2.301-.991-3.255l-18.499 22.728 4.766 5.227z" />
                            <path d="m15.818 8.768-1.036-1.136-1.341 1.341.923 1.249z" />
                            <path
                                d="m60.88 60.629-4.434-1.773c-1.432-.573-2.186-2.141-1.754-3.646.305-1.063.384-2.171.237-3.293-.473-3.618-3.572-6.521-7.37-6.901-1.954-.196-3.778-1.188-5.005-2.722l-.239-.3c-.848-1.058-1.315-2.39-1.315-3.748v-1.472c0-.25-.093-.488-.261-.673l-9.327-10.229c-1.1.792-2.42 1.227-3.785 1.227-.161 0-.323-.006-.485-.018-1.887-.141-3.613-1.095-4.738-2.615l-13.72-18.565 2.363-2.363c-.319-.34-.766-.538-1.234-.538-.334 0-.657.098-.936.283l-1.205.804c-.421.28-.672.75-.672 1.256 0 .259.067.515.194.74l16.739 29.757c.448.797 1.221 1.339 2.121 1.488l5.811.969c3.004.5 5.75 2.05 7.733 4.363l.173.2c1.333 1.556 1.55 4.173.486 5.835-1.034 1.616-1.442 3.494-1.179 5.43.469 3.456 3.198 6.241 6.636 6.774.425.067.858.101 1.286.101h13.808c.106 0 .192-.086.192-.192 0-.079-.047-.15-.12-.179zm-28.88-24.629c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm15 22c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z" />
                        </g>
                    </svg></span>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($personnels as $personnel)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="barber-fig" data-aos="fade-up" data-aos-delay="400">
                            <figure class="position-relative img-hover overflow-hidden mb-0 tilt">
                                <img class="image-1 w-100 img-fluid" src="{{ asset($personnel->avatar) }}"
                                    alt="barber-image">
                                <figcaption class="ryan-description">
                                    <h3><a href="">{{ $personnel->username }}</a></h3>
                                    <p>{{ $personnel->description }}</p>
                                    <ul class="ryan-icon d-flex list-unstyled">
                                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                        <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="gallery-sec">
        <div class="heading-style text-center">
            <h2>Kiểu tóc ưa thích</h2>
            <span class="d-block text-uppercase text-color">Tóc là vương miện tự nhiên của bạn.</span>
            <div class="scissor-border position-relative">
                <span class="mt-0"><svg fill="#332b23" height="20" viewBox="0 0 64 64"
                        xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path d="m22.864 21.722 2.492-2.492-1.036-1.136-2.379 2.379z" />
                            <path d="m20.739 18.847 2.233-2.232-1.036-1.136-2.12 2.119z" />
                            <path d="m18.614 15.972 1.973-1.973-1.036-1.136-1.86 1.86z" />
                            <path d="m16.489 13.097 1.713-1.714-1.036-1.135-1.6 1.6z" />
                            <path d="m30.056 24.385-.967-1.06-1.761 1.761c.974.066 1.926-.184 2.728-.701z" />
                            <path d="m25.214 24.372 2.526-2.527-1.036-1.136-2.632 2.632c.32.415.711.755 1.142 1.031z" />
                            <path d="m13.433 6.153-1.036-1.136-1.081 1.082.923 1.248z" />
                            <path
                                d="m26.331 56.275c-.821-.953-1.284-2.193-1.337-3.587-.052-1.356-.451-2.684-1.154-3.84-1.122-1.845-.956-4.417.387-5.982l.919-1.072c.791-.923 1.772-1.636 2.858-2.113l-2.278-.38c-.501-.083-.976-.246-1.418-.467l-2.88 3.538c-1.207 1.483-2.992 2.443-4.896 2.634-3.809.379-6.941 3.247-7.448 6.818-.366 2.58.48 5.093 2.322 6.895s4.379 2.59 6.957 2.17c1.294-.213 2.532-.764 3.58-1.592 1.202-.949 2.917-.853 3.988.22l1.155 1.155c.212.212.493.328.793.328.618 0 1.121-.503 1.121-1.121 0-.327-.118-.645-.332-.893zm-9.331 1.725c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z" />
                            <path
                                d="m52.982 10.283c.666-1.032 1.018-2.226 1.018-3.455 0-1.177-.347-2.301-.991-3.255l-18.499 22.728 4.766 5.227z" />
                            <path d="m15.818 8.768-1.036-1.136-1.341 1.341.923 1.249z" />
                            <path
                                d="m60.88 60.629-4.434-1.773c-1.432-.573-2.186-2.141-1.754-3.646.305-1.063.384-2.171.237-3.293-.473-3.618-3.572-6.521-7.37-6.901-1.954-.196-3.778-1.188-5.005-2.722l-.239-.3c-.848-1.058-1.315-2.39-1.315-3.748v-1.472c0-.25-.093-.488-.261-.673l-9.327-10.229c-1.1.792-2.42 1.227-3.785 1.227-.161 0-.323-.006-.485-.018-1.887-.141-3.613-1.095-4.738-2.615l-13.72-18.565 2.363-2.363c-.319-.34-.766-.538-1.234-.538-.334 0-.657.098-.936.283l-1.205.804c-.421.28-.672.75-.672 1.256 0 .259.067.515.194.74l16.739 29.757c.448.797 1.221 1.339 2.121 1.488l5.811.969c3.004.5 5.75 2.05 7.733 4.363l.173.2c1.333 1.556 1.55 4.173.486 5.835-1.034 1.616-1.442 3.494-1.179 5.43.469 3.456 3.198 6.241 6.636 6.774.425.067.858.101 1.286.101h13.808c.106 0 .192-.086.192-.192 0-.079-.047-.15-.12-.179zm-28.88-24.629c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm15 22c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z" />
                        </g>
                    </svg></span>
            </div>
        </div>
        <div class="gallery-main">
            <div class="container">
                <div class="row no-gutters justify-content-center">
                    <div class="row">
                        @foreach ($trendingStyle as $style)
                            <div class="col-lg-4 col-md-3 col-sm-12">
                                <div class="event-default position-relative">
                                    <figure class="event-default-image">
                                        <img src="{{ asset($style->image) }}" alt="">
                                    </figure>
                                    <div class="event-default-caption"><a href=""
                                            class="button button-xs button-primary theme-btn-2">BOOK NOW</a></div>
                                    <div class="gallerybtn-1">
                                        <span>{{ $style->name }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="barber-con gap no-bottom lg-no-bottom mb-5">
        <div class="container">
            <div class="heading-style text-center">
                <h2>Bảng giá dịch vụ</h2>
                <span class="d-block text-uppercase text-color">Products to Beautify </span>
                <div class="scissor-border position-relative">
                    <span><svg fill="#332b23" height="20" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="m22.864 21.722 2.492-2.492-1.036-1.136-2.379 2.379z" />
                                <path d="m20.739 18.847 2.233-2.232-1.036-1.136-2.12 2.119z" />
                                <path d="m18.614 15.972 1.973-1.973-1.036-1.136-1.86 1.86z" />
                                <path d="m16.489 13.097 1.713-1.714-1.036-1.135-1.6 1.6z" />
                                <path d="m30.056 24.385-.967-1.06-1.761 1.761c.974.066 1.926-.184 2.728-.701z" />
                                <path d="m25.214 24.372 2.526-2.527-1.036-1.136-2.632 2.632c.32.415.711.755 1.142 1.031z" />
                                <path d="m13.433 6.153-1.036-1.136-1.081 1.082.923 1.248z" />
                                <path
                                    d="m26.331 56.275c-.821-.953-1.284-2.193-1.337-3.587-.052-1.356-.451-2.684-1.154-3.84-1.122-1.845-.956-4.417.387-5.982l.919-1.072c.791-.923 1.772-1.636 2.858-2.113l-2.278-.38c-.501-.083-.976-.246-1.418-.467l-2.88 3.538c-1.207 1.483-2.992 2.443-4.896 2.634-3.809.379-6.941 3.247-7.448 6.818-.366 2.58.48 5.093 2.322 6.895s4.379 2.59 6.957 2.17c1.294-.213 2.532-.764 3.58-1.592 1.202-.949 2.917-.853 3.988.22l1.155 1.155c.212.212.493.328.793.328.618 0 1.121-.503 1.121-1.121 0-.327-.118-.645-.332-.893zm-9.331 1.725c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z" />
                                <path
                                    d="m52.982 10.283c.666-1.032 1.018-2.226 1.018-3.455 0-1.177-.347-2.301-.991-3.255l-18.499 22.728 4.766 5.227z" />
                                <path d="m15.818 8.768-1.036-1.136-1.341 1.341.923 1.249z" />
                                <path
                                    d="m60.88 60.629-4.434-1.773c-1.432-.573-2.186-2.141-1.754-3.646.305-1.063.384-2.171.237-3.293-.473-3.618-3.572-6.521-7.37-6.901-1.954-.196-3.778-1.188-5.005-2.722l-.239-.3c-.848-1.058-1.315-2.39-1.315-3.748v-1.472c0-.25-.093-.488-.261-.673l-9.327-10.229c-1.1.792-2.42 1.227-3.785 1.227-.161 0-.323-.006-.485-.018-1.887-.141-3.613-1.095-4.738-2.615l-13.72-18.565 2.363-2.363c-.319-.34-.766-.538-1.234-.538-.334 0-.657.098-.936.283l-1.205.804c-.421.28-.672.75-.672 1.256 0 .259.067.515.194.74l16.739 29.757c.448.797 1.221 1.339 2.121 1.488l5.811.969c3.004.5 5.75 2.05 7.733 4.363l.173.2c1.333 1.556 1.55 4.173.486 5.835-1.034 1.616-1.442 3.494-1.179 5.43.469 3.456 3.198 6.241 6.636 6.774.425.067.858.101 1.286.101h13.808c.106 0 .192-.086.192-.192 0-.079-.047-.15-.12-.179zm-28.88-24.629c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm15 22c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z" />
                            </g>
                        </svg></span>
                </div>
            </div>
            <div class="barber-slider">
                @foreach ($listServices as $category)
                    <div class="slider-item">
                        <div class="slider-1 position-relative border text-center">
                            <div class="hair-fade text-center">
                                <span>
                                    <svg height="100" viewBox="0 0 512 512">
                                        <path style="fill:#303C42;"
                                            d="M256,0C114.844,0,0,114.844,0,256s114.844,256,256,256s256-114.844,256-256S397.156,0,256,0z" />
                                        <path style="fill:#F1D3B5;"
                                            d="M256,490.667C126.604,490.667,21.333,385.396,21.333,256S126.604,21.333,256,21.333 S490.667,126.604,490.667,256S385.396,490.667,256,490.667z" />
                                        <path style="opacity:0.2;fill:#FFFFFF;enable-background:new    ;"
                                            d="M32,277.333C32,147.938,137.271,42.667,266.667,42.667 c87.715,0,164.224,48.452,204.49,119.923C434.969,79.568,352.197,21.333,256,21.333C126.604,21.333,21.333,126.604,21.333,256 c0,41.681,11.043,80.781,30.177,114.743C39.021,342.091,32,310.533,32,277.333z" />
                                        <path style="fill:#303C42;"
                                            d="M418.76,149.792c-4.625-1.281-9.604,0.813-12.042,4.948c-0.385,0.656-9.698,15.927-37.26,15.927 c-14.229,0-20.104-3.917-27.542-8.875c-8.323-5.552-18.688-12.458-39.375-12.458c-23.014,0-37.724,8.326-46.542,19.969 c-8.818-11.643-23.527-19.969-46.542-19.969c-20.688,0-31.052,6.906-39.375,12.458c-7.438,4.958-13.313,8.875-27.542,8.875 c-27.563,0-36.875-15.271-37.177-15.771c-2.323-4.281-7.229-6.417-11.969-5.24c-4.708,1.188-8.031,5.406-8.063,10.271 c-0.009,1.421,0.332,32.48,21.938,59.134l7.094,60.324c8.771,74.563,96.198,121.594,142.667,125.896 c44.406-4.302,131.833-51.333,140.604-125.896l7.126-60.564c21.37-26.773,21.905-58.272,21.905-58.822 C426.667,155.188,423.406,151.052,418.76,149.792z M309.333,298.667c-34.552,0-43.552-15.042-43.792-15.438 c-1.76-3.521-5.385-5.646-9.323-5.75c-3.948-0.396-7.677,2.083-9.625,5.5c-0.375,0.646-9.375,15.688-43.927,15.688 c-21.66,0-33.397-27.883-38.853-46.608c10.523,2.333,21.635,3.941,34.009,3.941c26.512,0,46.714-10.771,58.177-25.091 C267.464,245.229,287.665,256,314.177,256c12.747,0,23.891-1.372,33.913-3.585C342.609,271.159,330.919,298.667,309.333,298.667z" />
                                        <g>
                                            <path style="fill:#BF6A1E;"
                                                d="M302.542,170.667c14.229,0,20.104,3.917,27.542,8.875c8.323,5.552,18.688,12.458,39.375,12.458 c12.417,0,22.396-2.396,30.292-5.75c-8.583,21.531-30.354,48.417-85.573,48.417c-28.417,0-47.51-16.542-47.51-32 C266.667,188.073,272.896,170.667,302.542,170.667z" />
                                            <path style="fill:#BF6A1E;"
                                                d="M142.542,192c20.688,0,31.052-6.906,39.375-12.458c7.438-4.958,13.313-8.875,27.542-8.875 c29.646,0,35.875,17.406,35.875,32c0,15.458-19.094,32-47.51,32c-55.198,0-76.969-26.896-85.563-48.406 C120.156,189.615,130.135,192,142.542,192z" />
                                        </g>
                                        <g>
                                            <path style="opacity:0.2;fill:#FFFFFF;enable-background:new    ;"
                                                d="M271.74,213.333c0-14.594,6.229-32,35.875-32 c14.229,0,20.104,3.917,27.542,8.875c8.323,5.552,18.688,12.458,39.375,12.458c6.398,0,12.1-0.668,17.253-1.743 c3.393-4.924,6.073-9.924,7.966-14.673c-7.896,3.354-17.875,5.75-30.292,5.75c-20.688,0-31.052-6.906-39.375-12.458 c-7.438-4.958-13.313-8.875-27.542-8.875c-29.646,0-35.875,17.406-35.875,32c0,4.904,2.108,9.863,5.639,14.423 C272.063,215.836,271.74,214.582,271.74,213.333z" />
                                            <path style="opacity:0.2;fill:#FFFFFF;enable-background:new    ;"
                                                d="M147.615,202.667c20.688,0,31.052-6.906,39.375-12.458 c7.438-4.958,13.313-8.875,27.542-8.875c15.435,0,24.432,4.76,29.598,11.342c-2.833-11.517-11.664-22.009-34.671-22.009 c-14.229,0-20.104,3.917-27.542,8.875C173.594,185.094,163.229,192,142.542,192c-12.406,0-22.385-2.385-30.281-5.74 c1.4,3.505,3.318,7.148,5.505,10.799C125.6,200.329,135.408,202.667,147.615,202.667z" />
                                        </g>
                                        <path style="fill:#BF6A1E;"
                                            d="M257.031,384.052c-37.385-3.625-114.135-44.729-121.479-107.167l-4.362-37.098 c2.66,1.59,5.69,2.738,8.548,4.094c3.62,18.085,18.678,76.118,62.928,76.118c28.094,0,44.385-8.417,53.333-15.938 c8.948,7.521,25.24,15.938,53.333,15.938c43.939,0,59.082-57.24,62.84-75.78c3.013-1.431,5.962-2.889,8.65-4.513l-4.375,37.178 C369.104,339.323,292.354,380.427,257.031,384.052z" />
                                        <path style="opacity:0.1;enable-background:new    ;"
                                            d="M257.051,373.333c-34.499-3.262-101.517-36.936-120.116-89.129 c12.207,58.284,84.204,96.367,120.096,99.848c33.928-3.482,105.9-41.6,118.051-99.931 C356.544,336.361,289.664,370.069,257.051,373.333z" />
                                        <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="-45.5784"
                                            y1="639.555" x2="-23.8278" y2="629.4138"
                                            gradientTransform="matrix(21.3333 0 0 -21.3333 996.3334 13791.667)">
                                            <stop offset="0" style="stop-color:#FFFFFF;stop-opacity:0.2" />
                                            <stop offset="1" style="stop-color:#FFFFFF;stop-opacity:0" />
                                        </linearGradient>
                                        <path style="fill:url(#SVGID_1_);"
                                            d="M256,0C114.844,0,0,114.844,0,256s114.844,256,256,256s256-114.844,256-256S397.156,0,256,0z" />
                                    </svg>
                                </span>
                                <h2>{{ $category['category'] }}</h2>
                                @foreach ($category['services'] as $service)
                                    <div class="d-flex justify-content-between align-items-baseline px-3">
                                        <h6 class="text-uppercase">{{ $service['name'] }}</h6>
                                        <div class="">-----------</div>
                                        <h6 class="text-color text-uppercase">{{ number_format($service['price']) }} vnd
                                        </h6>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <div class="bg-image-2 position-relative gap"
            style="background-image: url({{ asset('client/assets/images/img-48.webp') }});">
            <div class="container">
                <div class="heading-style-2 text-center">
                    <h2>ClIENT'S REWIE'S</h2>
                    <span class="text-uppercase d-block text-color">Get Your Beard</span>
                    <div class="scissor-border position-relative">
                        <span class="mt-0"><svg fill="#fff" height="20" viewBox="0 0 64 64"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path d="m22.864 21.722 2.492-2.492-1.036-1.136-2.379 2.379z" />
                                    <path d="m20.739 18.847 2.233-2.232-1.036-1.136-2.12 2.119z" />
                                    <path d="m18.614 15.972 1.973-1.973-1.036-1.136-1.86 1.86z" />
                                    <path d="m16.489 13.097 1.713-1.714-1.036-1.135-1.6 1.6z" />
                                    <path d="m30.056 24.385-.967-1.06-1.761 1.761c.974.066 1.926-.184 2.728-.701z" />
                                    <path
                                        d="m25.214 24.372 2.526-2.527-1.036-1.136-2.632 2.632c.32.415.711.755 1.142 1.031z" />
                                    <path d="m13.433 6.153-1.036-1.136-1.081 1.082.923 1.248z" />
                                    <path
                                        d="m26.331 56.275c-.821-.953-1.284-2.193-1.337-3.587-.052-1.356-.451-2.684-1.154-3.84-1.122-1.845-.956-4.417.387-5.982l.919-1.072c.791-.923 1.772-1.636 2.858-2.113l-2.278-.38c-.501-.083-.976-.246-1.418-.467l-2.88 3.538c-1.207 1.483-2.992 2.443-4.896 2.634-3.809.379-6.941 3.247-7.448 6.818-.366 2.58.48 5.093 2.322 6.895s4.379 2.59 6.957 2.17c1.294-.213 2.532-.764 3.58-1.592 1.202-.949 2.917-.853 3.988.22l1.155 1.155c.212.212.493.328.793.328.618 0 1.121-.503 1.121-1.121 0-.327-.118-.645-.332-.893zm-9.331 1.725c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z" />
                                    <path
                                        d="m52.982 10.283c.666-1.032 1.018-2.226 1.018-3.455 0-1.177-.347-2.301-.991-3.255l-18.499 22.728 4.766 5.227z" />
                                    <path d="m15.818 8.768-1.036-1.136-1.341 1.341.923 1.249z" />
                                    <path
                                        d="m60.88 60.629-4.434-1.773c-1.432-.573-2.186-2.141-1.754-3.646.305-1.063.384-2.171.237-3.293-.473-3.618-3.572-6.521-7.37-6.901-1.954-.196-3.778-1.188-5.005-2.722l-.239-.3c-.848-1.058-1.315-2.39-1.315-3.748v-1.472c0-.25-.093-.488-.261-.673l-9.327-10.229c-1.1.792-2.42 1.227-3.785 1.227-.161 0-.323-.006-.485-.018-1.887-.141-3.613-1.095-4.738-2.615l-13.72-18.565 2.363-2.363c-.319-.34-.766-.538-1.234-.538-.334 0-.657.098-.936.283l-1.205.804c-.421.28-.672.75-.672 1.256 0 .259.067.515.194.74l16.739 29.757c.448.797 1.221 1.339 2.121 1.488l5.811.969c3.004.5 5.75 2.05 7.733 4.363l.173.2c1.333 1.556 1.55 4.173.486 5.835-1.034 1.616-1.442 3.494-1.179 5.43.469 3.456 3.198 6.241 6.636 6.774.425.067.858.101 1.286.101h13.808c.106 0 .192-.086.192-.192 0-.079-.047-.15-.12-.179zm-28.88-24.629c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm15 22c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z" />
                                </g>
                            </svg></span>
                    </div>
                </div>
                <div class="client-slider mx-auto">
                    <div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-7 col-md-6">
                                <figure>
                                    <img src="{{ asset('client/assets/images/img-29.webp') }}" alt="client-image">
                                </figure>
                                <div class="barber-quote">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <div class="client-description">
                                    <p class="mt-5">Perfect grooming is one of the features of a successful man. The
                                        main signature of ae of the features of a successful man.</p>
                                    <h3 class="mb-0 text-capitalize text-color">David Miller</h3>
                                    <span>Marketing Envato Pvt Ltd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-7 col-md-6">
                                <figure>
                                    <img src="{{ asset('client/assets/images/img-30.webp') }}" alt="client-image">
                                </figure>
                                <div class="barber-quote">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <div class="client-description">
                                    <p class="mt-5">Maintains safe and healthy conditions by following organization
                                        standards and legal regulations</p>
                                    <h3 class="mb-0 text-capitalize text-color">Clifford</h3>
                                    <span>Electric Hair Clipper</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-7 col-md-6">
                                <figure>
                                    <img src="{{ asset('client/assets/images/testimonial-image.webp') }}"
                                        alt="client-image">
                                </figure>
                                <div class="barber-quote">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <div class="client-description">
                                    <p class="mt-5">Perfect grooming is one of the features of a successful
                                        man.Barber
                                        offer the good services.</p>
                                    <h3 class="mb-0 text-capitalize text-color">Adelbert</h3>
                                    <span>Marketing Envato Pvt Ltd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gap">
        <div class="heading-style text-center">
            <h2>
                BLOG & TIN TỨC
            </h2>
            <span class="text-uppercase d-block text-color">
                Được cắt tóc cho bạn là niềm vinh hạnh của chúng tôi
            </span>
            <div class="scissor-border position-relative">
                <span class="mt-0"><svg fill="#332b23" height="20" viewBox="0 0 64 64"
                        xmlns="http://www.w3.org/2000/svg">
                        <!-- Mã SVG cho đường cắt tóc -->
                    </svg></span>
            </div>
        </div>
        <div class="container">
            @foreach ($latestBlogs as $key => $post)
                @if ($key == 0)
                    <!-- Hiển thị ảnh của bài viết đầu tiên ở trên cùng -->
                    <div class="row no-gutters">
                        <div class="col-lg-7 col-md-12">
                            <div class="bg-image" style="background-image: url({{ asset($post->image) }});"></div>
                        </div>
                        <div class="col-lg-5 col-md-12 bg-light-color">
                            <div class="barber-hipster">
                                <div class="d-flex">
                                    <span><svg height="15" fill="#d9842f" viewBox="0 0 512 512"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="m512 169c0-33.41 0-56.783 0-59 0-24.813-20.187-45-45-45h-6v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-36c-24.813 0-45 20.187-45 45v59z" />
                                                <path
                                                    d="m0 199v243c0 24.813 20.187 45 45 45h422c24.813 0 45-20.187 45-45 0-6.425 0-146.812 0-243-9.335 0-506.836 0-512 0zm144 208h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15z" />
                                            </g>
                                        </svg></span>
                                    <h3 class="mb-0 text-color">{{ $post->created_at->format('F d, Y') }}</h3>
                                </div>
                                <h1><a href="" class="theme-black-color">{{ $post->title }}</a>
                                </h1>
                                <a href="" class="theme-btn-2">READ MORE</a>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Hiển thị ảnh của bài viết thứ hai ở bên dưới -->
                    <div class="row no-gutters mt-3">
                        <div class="col-lg-5 col-md-12 bg-light-color">
                            <div class="barber-hipster">
                                <div class="d-flex">
                                    <span><svg height="15" fill="#d9842f" viewBox="0 0 512 512"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="m512 169c0-33.41 0-56.783 0-59 0-24.813-20.187-45-45-45h-6v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-36c-24.813 0-45 20.187-45 45v59z" />
                                                <path
                                                    d="m0 199v243c0 24.813 20.187 45 45 45h422c24.813 0 45-20.187 45-45 0-6.425 0-146.812 0-243-9.335 0-506.836 0-512 0zm144 208h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15z" />
                                            </g>
                                        </svg></span>
                                    <h3 class="mb-0 text-color">{{ $post->created_at->format('F d, Y') }}</h3>
                                </div>
                                <h1><a href="" class="theme-black-color">{{ $post->title }}</a>
                                </h1>
                                <a href="" class="theme-btn-2">READ MORE</a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="bg-image" style="background-image: url({{ asset($post->image) }});"></div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection
