<script type="text/javascript" src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/jquery.fancybox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/slick.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/aos.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/tilt.jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/script.js') }}"></script>



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
    (function() {
        var js =
            "window['__CF$cv$params']={r:'81758d23ea2196f5',t:'MTY5NzUxNDM1My4zNzcwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../cdn-cgi/challenge-platform/h/b/scripts/jsd/7ff8d35b/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";
        var _0xh = document.createElement('iframe');
        _0xh.height = 1;
        _0xh.width = 1;
        _0xh.style.position = 'absolute';
        _0xh.style.top = 0;
        _0xh.style.left = 0;
        _0xh.style.border = 'none';
        _0xh.style.visibility = 'hidden';
        document.body.appendChild(_0xh);

        function handler() {
            var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
            if (_0xi) {
                var _0xj = _0xi.createElement('script');
                _0xj.innerHTML = js;
                _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
            }
        }
        if (document.readyState !== 'loading') {
            handler();
        } else if (window.addEventListener) {
            document.addEventListener('DOMContentLoaded', handler);
        } else {
            var prev = document.onreadystatechange || function() {};
            document.onreadystatechange = function(e) {
                prev(e);
                if (document.readyState !== 'loading') {
                    document.onreadystatechange = prev;
                    handler();
                }
            };
        }
    })();
</script>
