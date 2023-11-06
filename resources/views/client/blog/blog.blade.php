@extends('client.templates.app')
@section('title', 'Trang tin tức')
@section('content')
    @include('client.templates.navbar2')
    <section class="position-relative footer-area">
        <div class="container bg-text-area">
            <h2>Tin Tức</h2>
        </div>
    </section>
    <section class="price-sec gap no-bottom" id="data-wrapper">
        <div class="heading-style text-center">
            <h2>Tin Tức Mới Nhất</h2>
            <div class="scissor-border position-relative">
                    <span class="mt-0"><svg fill="#332b23" height="20" viewBox="0 0 64 64"
                                            xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="m22.864 21.722 2.492-2.492-1.036-1.136-2.379 2.379z"/>
                                <path d="m20.739 18.847 2.233-2.232-1.036-1.136-2.12 2.119z"/>
                                <path d="m18.614 15.972 1.973-1.973-1.036-1.136-1.86 1.86z"/>
                                <path d="m16.489 13.097 1.713-1.714-1.036-1.135-1.6 1.6z"/>
                                <path d="m30.056 24.385-.967-1.06-1.761 1.761c.974.066 1.926-.184 2.728-.701z"/>
                                <path
                                    d="m25.214 24.372 2.526-2.527-1.036-1.136-2.632 2.632c.32.415.711.755 1.142 1.031z"/>
                                <path d="m13.433 6.153-1.036-1.136-1.081 1.082.923 1.248z"/>
                                <path
                                    d="m26.331 56.275c-.821-.953-1.284-2.193-1.337-3.587-.052-1.356-.451-2.684-1.154-3.84-1.122-1.845-.956-4.417.387-5.982l.919-1.072c.791-.923 1.772-1.636 2.858-2.113l-2.278-.38c-.501-.083-.976-.246-1.418-.467l-2.88 3.538c-1.207 1.483-2.992 2.443-4.896 2.634-3.809.379-6.941 3.247-7.448 6.818-.366 2.58.48 5.093 2.322 6.895s4.379 2.59 6.957 2.17c1.294-.213 2.532-.764 3.58-1.592 1.202-.949 2.917-.853 3.988.22l1.155 1.155c.212.212.493.328.793.328.618 0 1.121-.503 1.121-1.121 0-.327-.118-.645-.332-.893zm-9.331 1.725c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z"/>
                                <path
                                    d="m52.982 10.283c.666-1.032 1.018-2.226 1.018-3.455 0-1.177-.347-2.301-.991-3.255l-18.499 22.728 4.766 5.227z"/>
                                <path d="m15.818 8.768-1.036-1.136-1.341 1.341.923 1.249z"/>
                                <path
                                    d="m60.88 60.629-4.434-1.773c-1.432-.573-2.186-2.141-1.754-3.646.305-1.063.384-2.171.237-3.293-.473-3.618-3.572-6.521-7.37-6.901-1.954-.196-3.778-1.188-5.005-2.722l-.239-.3c-.848-1.058-1.315-2.39-1.315-3.748v-1.472c0-.25-.093-.488-.261-.673l-9.327-10.229c-1.1.792-2.42 1.227-3.785 1.227-.161 0-.323-.006-.485-.018-1.887-.141-3.613-1.095-4.738-2.615l-13.72-18.565 2.363-2.363c-.319-.34-.766-.538-1.234-.538-.334 0-.657.098-.936.283l-1.205.804c-.421.28-.672.75-.672 1.256 0 .259.067.515.194.74l16.739 29.757c.448.797 1.221 1.339 2.121 1.488l5.811.969c3.004.5 5.75 2.05 7.733 4.363l.173.2c1.333 1.556 1.55 4.173.486 5.835-1.034 1.616-1.442 3.494-1.179 5.43.469 3.456 3.198 6.241 6.636 6.774.425.067.858.101 1.286.101h13.808c.106 0 .192-.086.192-.192 0-.079-.047-.15-.12-.179zm-28.88-24.629c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm15 22c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z"/>
                            </g>
                        </svg></span>
            </div>
        </div>
        @include('client.blog.list_blog')
    </section>
    <section class="py-120 mt-5">
        {{ $listBlogs->links('custom.pagination') }}
    </section>

    <script type="text/javascript">
        $(window).on('hashchange', function () {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getData(page);
                }
            }
        });
        $(document).ready(function () {
            $(document).on('click', '.pagination a', function (event) {
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                event.preventDefault();

                var myurl = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];

                // Kiểm tra giá trị `page` trước khi cập nhật URL
                if (page === undefined || page === null) {
                    page = 1; // Giá trị mặc định khi `page` không xác định
                }

                // Sử dụng History API để thay đổi URL mà không tải lại trang
                history.replaceState(null, null, '?page=' + page);

                getData(page);
            });
        });

        function getData(page) {
            $.ajax({
                url: '?page=' + page,
                type: "get",
                datatype: "html",
            })
                .done(function (data) {
                    $("#data-wrapper").empty().html("<div class ='container'>" + data + "</div>");
                    // location.hash = page;
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                });
        }
    </script>
@endsection
