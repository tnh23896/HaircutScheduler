

$(document).ready(function(){

  $('.client-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 3000,
    fade: true,
      infinite: true,
  });

  $('.hamburger-menu').on('click', function (e) {
      if ($("body").hasClass('hamburger-navigation-active')) {

        $("body .hamburger-navigation").css("transition", "");
        $("body .hamburger-navigation").css("transition-delay", "0.6s");
        $("body .hamburger-navigation .nav-menu").css("transition-delay", "0s");
        $("body .hamburger-navigation .info-box").css("transition-delay", "0.2s");
        $("body .navbar .logo").css("transition-delay", "1.2s");
        $("body .navbar .navbar-text").css("transition-delay", "1.2s");
        $("body .navbar .site-menu").css("transition-delay", "1.2s");

        window.setTimeout(function () {
          $("body .hamburger-navigation").css("top", "0");
          $("body .hamburger-navigation").css("transition", "none");
        }, 2000);

        $("body.hamburger-navigation-active .hamburger-navigation").css("top", "100vh");

      } else {
        $("body .hamburger-navigation").css("transition", "");
        $("body .hamburger-navigation").css("transition-delay", "0s");
        $("body .hamburger-navigation .nav-menu").css("transition-delay", "1.5s");
        $("body .hamburger-navigation .info-box").css("transition-delay", "1.7s");
        $("body .navbar .logo").css("transition-delay", "0s");
        $("body .navbar .navbar-text").css("transition-delay", "0s");
        $("body .navbar .site-menu").css("transition-delay", "0s");

      }
      $(".hamburger-menu svg").toggleClass('opened');
      $("body").toggleClass('hamburger-navigation-active');
  });


  // barber slider

  $('.barber-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        autoplay: true,
        autoplayspeed:2000,
        responsive: [
         {
            breakpoint: 1366,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 2,
              infinite: true,
              dots: false
            }
         },
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
              dots: false
            }
          },

          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
     });


    // hone page 3 barber featured slider script

    $('.featured-main').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      arrows: true,

      centerPadding: '70px',
      autoplay: false,
      autoplayspeed:2000,
      responsive: [
        {
        breakpoint: 1367,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 2,
            infinite: true,
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    //pattern slider


    $('.pattern-slider').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      arrows: true,

      centerPadding: '70px',
      autoplay: false,
      autoplayspeed:2000,
      responsive: [
        {
        breakpoint: 1367,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 2,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });


              // PRELOADER
            var width = 100,
              perfData = window.performance.timing, // The PerformanceTiming interface represents timing-related performance information for the given page.
              EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
              time = parseInt((EstimatedTime / 1000) % 60) * 60;

            $(".loadbar").animate({
              width: width + "%"
            }, time);

            function animateValue(id, start, end, duration) {

              var range = end - start,
                current = start,
                increment = end > start ? 1 : -1,
                stepTime = Math.abs(Math.floor(duration / range)),
                obj = $(id);

              var timer = setInterval(function () {
                current += increment;
                $(obj).text(current + "%");
                if (current == end) {
                  clearInterval(timer);
                }
              }, stepTime);
            }

            setTimeout(function () {
              $("body").addClass("page-loaded");
            }, time);


        $('.counter1').counterUp({
          delay: 10,
        });

        $('.counter').counterUp({
          delay: 10,
        });

    // responsive menu

    $(".navbar-toggler").click(function(){
      $(".nav-top .nav-menu").css({"width" : "300px" });
    });
    $(".cross-wrap").click(function(){
      $(".nav-top .nav-menu").css({"width" : "0px"});
    });

    //popups

       $("#popups").click(function(){
      $(".popup-items").css({"transform" : "translateX(0%)" });
    });
    $(".cross-bar").click(function(){
      $(".popup-items").css({"transform" : "translateX(100%)"});
    });
});
 // // Sticky Header
        // // Just add #nav_nav to header
        window.onscroll = function(){
        var num = window.pageYOffset;
        if (num >= 160){
        document.querySelector('#nav_nav').classList.add('stick');
        document.querySelector('#scrollTop').classList.add('active');
        }
        else {
        document.querySelector('#nav_nav').classList.remove('stick');
        document.querySelector('#scrollTop').classList.remove('active');
        }
        }

        // // Scroll Top
        // // Just add #scrollTop to the footer
        document.querySelector('#scrollTop').addEventListener('click', function(){
        window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth'
        });
        })
