<div class="preloader">
    <div class="loadbar"></div>
    <div class="psoload">
        <div class="straight"></div>
        <div class="curve"></div>
        <div class="center"></div>
        <div class="inner"></div>
    </div>
</div>
<header class="w-100 nav-header page-2-nav" id="nav_nav">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="javascript:void(0)">
            <img src="{{ asset('client/assets/images/blacklogo.png') }}" style="width: 115px" alt="nav-image">
        </a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item position-relative">
                    <a class="nav-link " href="{{ url('/') }}">Trang chủ
                    </a>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link" href="{{ route('client.service') }}">Dịch vụ</a>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link" href="{{ route('blog') }}">Tin tức</a>
                </li>
                <li class="nav-item position-relative"><a class="nav-link " href="contact.html">Liên hệ</a></li>
                <li class="nav-item position-relative"><a class="nav-link " href="{{ route('client.aboutus') }}">Giới
                        thiệu</a></li>
            </ul>
            <div class="main-logo">
                <div class="hamburger-menu" style="transform: matrix(1, 0, 0, 1, 0, 0);  ">
                    <button class="menu" >
                        <svg width="45" height="45" viewBox="0 0 100 100">
                            <path class="line line1"
                                d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058">
                            </path>
                            <path class="line line2" d="M 20,50 H 80"></path>
                            <path class="line line3"
                                d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="align-items-center position-relative">
            <nav class="hamburger-navigation" style="transition-delay: 0s;">
                <div class="layer"></div>
                <!-- end layer -->
                <div class="container">
                    <ul class="nav-menu" style="transition-delay: 1.5s;">
                        <li><a href="{{ url('/') }}">Trang chủ</a>
                        </li>
                        <li><a href="{{ route('client.service') }}">Dịch vụ</a>
                        </li>
                        <li class="home-drop"><a href="{{ route('blog') }}">Tin tức
                            </a>
                        </li>
                        <li><a href="contact.html">Liên hệ</a></li>
                        <li><a href="{{ route('client.aboutus') }}">Giới thiệu</a></li>
                    </ul>
                    <!-- end info-box -->
                </div>
                <!-- end container -->
            </nav>
            @if (Auth::check())
                <a href="{{ route('logout') }}">
                    <button class="theme-btn-2 nav-btn " style="height: 50px;">
                        <h6 style="color: white; transform: translateY(-13px)">Đăng xuất</h6>
                    </button>
                </a>
            @else
                <a class="theme-btn-2 nav-btn " style="height: 50px;" href="javascript:void(0)" data-toggle="modal"
                    data-target="#modalAuth">
                    <h6 style="color: white; transform: translateY(-13px)">Đăng nhập</h6>
                </a>
            @endif
        </div>
    </nav>
</header>
