<script type="text/javascript" src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/jquery.fancybox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/slick.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/aos.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/tilt.jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/script.js') }}"></script>
<script src="{{ asset('client/assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('client/assets/js/counter-js.js') }}"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
    });
    $('.tilt').tilt({
        maxGlare: 1,
        maxTilt: 3,
        transition: true,
    });
    $('.nav-menu li').click(function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $('.nav-menu li').removeClass('active');
            $(this).addClass('active');
        }
    })
</script>

<script>
    function submenu(val) {

        var len = $(".home-click").length;
        console.log(len);
        for (var i = 0; i <= len; i++) {
            if (i == val) {
                console.log(val);
                $(".home-page-2").eq(i).toggleClass("togglesubmenu");
            }
        }
    }
</script>
