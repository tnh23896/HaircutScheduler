@extends('client.templates.layout_dashboard')
@section('title', ' Trang hóa đơn')
@section('content')
    <div id="my-orders">
        <div class="tabs-wrp brd-rd5">
            <h4 itemprop="headline">Danh Sách Hóa Đơn</h4>
            <div id="data-wrapper">
                @include('client.bill_history.list_bill')
            </div>
        </div>
    </div>
    <div>
        {{$list_bill->links('custom.pagination')}}
    </div>
    @foreach ($list_bill as $bill)
        @include('client.bill_history.modal')
    @endforeach
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
