@extends('client.templates.app')
@section('title', 'Chi tiết bài viết')
@section('content')
    @include('client.templates.navbar2')
    @php
        // Chuỗi ngày tháng đầu vào
        $dateString = $blog->created_at;
        // Tách ngày, tháng và năm từ chuỗi ngày tháng
        [$year, $month, $days] = explode('-', $dateString);
        [$day, $hour] = explode(' ', $days);
    @endphp
    <section class="position-relative footer-area">
        <div class="container bg-text-area">
            <h2>Chi tiết tin tức</h2>
            <span>Free Shave Towel with orders $30 or more</span>
        </div>
    </section>
    <section class="gap lg-no-bottom md-no-bottom no-bottom sm-no-bottom">
        <div class="container">
            <figure class="text-center">
                <img class="img-fluid" src="{{ asset($blog->image) }}" alt="blog-image">
            </figure>
            <div class="row align-items-center">
                <div class="col-md-10 w-100 m-auto">
                    <div class="post-meta-2">
                        <ul>
                            <li class="align-items-center justify-content-center">
                                <span><svg class="" style="margin-bottom: 7px; " height="18" fill="#d9842f"
                                        viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="m512 169c0-33.41 0-56.783 0-59 0-24.813-20.187-45-45-45h-6v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-36c-24.813 0-45 20.187-45 45v59z" />
                                            <path
                                                d="m0 199v243c0 24.813 20.187 45 45 45h422c24.813 0 45-20.187 45-45 0-6.425 0-146.812 0-243-9.335 0-506.836 0-512 0zm144 208h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15z" />
                                        </g>
                                    </svg>
                                </span>
                                <h3 class="mb-0 text-color">Tháng {{ $month }} {{ $day }},
                                    {{ $year }}</h3>
                            </li>
                        </ul>
                        <h2>{{ $blog->title }}</h2>
                    </div>

                    <div class="post-detail">
                        <p>{{ $blog->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gap">
        <div class="heading-style text-center">
            <h2>
                Bài viết liên quan
            </h2>
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
            @foreach ($listBlogs as $key => $blog)
                @php
                    // Chuỗi ngày tháng đầu vào
                    $dateString = $blog->created_at;
                    // Tách ngày, tháng và năm từ chuỗi ngày tháng
                    [$year, $month, $days] = explode('-', $dateString);
                    [$day, $hour] = explode(' ', $days);
                @endphp
                @if ($key % 2 == 0)
                    <div class="row no-gutters">
                        <div class="col-lg-5 col-md-12 bg-light-color">
                            <div class="barber-hipster appointent-btn">
                                <div class="d-flex">
                                    <span><svg height="15" fill="#d9842f" viewBox="0 0 512 512"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="m512 169c0-33.41 0-56.783 0-59 0-24.813-20.187-45-45-45h-6v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-36c-24.813 0-45 20.187-45 45v59z" />
                                                <path
                                                    d="m0 199v243c0 24.813 20.187 45 45 45h422c24.813 0 45-20.187 45-45 0-6.425 0-146.812 0-243-9.335 0-506.836 0-512 0zm144 208h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15z" />
                                            </g>
                                        </svg>
                                    </span>
                                    <h3 class="mb-0 text-color">Tháng {{ $month }} {{ $day }},
                                        {{ $year }}</h3>
                                </div>
                                <h1><a href="" class="theme-black-color">{{ $blog->title }}</a>
                                </h1>
                                <a href="{{ route('detail.blog', $blog->id) }}" class="theme-btn-2">Xem chi tiết</a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="bg-image blg-img" style="background-image: url({{ asset($blog->image) }});"></div>
                        </div>
                    </div>
                @else
                    <div class="barber-content pb-4">
                        <div class="row no-gutters">
                            <div class="col-lg-7 col-md-12">
                                <div class="bg-image blg-img" style="background-image: url({{ asset($blog->image) }});">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 bg-light-color">
                                <div class="barber-hipster appointent-btn">
                                    <div class="d-flex">
                                        <span><svg height="15" fill="#d9842f" viewBox="0 0 512 512"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="m512 169c0-33.41 0-56.783 0-59 0-24.813-20.187-45-45-45h-6v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-36c-24.813 0-45 20.187-45 45v59z" />
                                                    <path
                                                        d="m0 199v243c0 24.813 20.187 45 45 45h422c24.813 0 45-20.187 45-45 0-6.425 0-146.812 0-243-9.335 0-506.836 0-512 0zm144 208h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15z" />
                                                </g>
                                            </svg>
                                        </span>
                                        <h3 class="mb-0 text-color">Tháng {{ $month }} {{ $day }},
                                            {{ $year }}</h3>
                                    </div>
                                    <h1><a href="" class="theme-black-color">{{ $blog->title }}</a>
                                    </h1>
                                    <a href="{{ route('detail.blog', $blog->id) }}" class="theme-btn-2">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection
