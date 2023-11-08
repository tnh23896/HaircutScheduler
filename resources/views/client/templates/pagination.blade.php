<script type="text/javascript">
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getData(page);
            }
        }
    });
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
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
            $('html, body').animate({
                scrollTop: $("body").offset().top
            },700);
            getData(page);
        });
    });

    function getData(page) {
        $.ajax({
                url: '?page=' + page,
                type: "get",
                datatype: "html",
            })
            .done(function(data) {
                $("#data-wrapper").empty().html("<div class =''>" + data + "</div>");
                // location.hash = page;
                // Cuộn lên đầu trang sau khi tải dữ liệu mới
                // $("#data-wrapper").animate({
                //     scrollTop: 0
                // }, "slow");
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
            });
    }
</script>
