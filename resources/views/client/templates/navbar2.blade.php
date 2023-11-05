<div class="preloader">
    <div class="loadbar"></div>
    <div class="psoload">
        <div class="straight"></div>
        <div class="curve"></div>
        <div class="center"></div>
        <div class="inner"></div>
    </div>
</div>
<header class="about-head">
    <div class="nav-top" id="nav_nav">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="javascript:void(0)"><img src="{{ asset('client/assets/images/logo.png') }}""
                                alt="header-image"></a>
                        <div class="navbar-toggler active">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="nav-menu menu-on active">
                            <!-- navbar-close -->
                            <div class="navbar-close">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- main menu -->
                            <nav class="main-menu">
                                <ul>
                                    <li class="home-drop" onclick="submenu(0)"><a href="{{ url('/') }}"
                                            id="home-click">Trang chủ</a>
                                    </li>
                                    <li class="home-drop" onclick="submenu(1)"><a href="{{ route('client.service') }}"
                                            class="home-click">Dịch vụ</a>
                                    </li>
                                    <li class="home-drop" onclick="submenu(2)"><a href="{{ route('blog') }}"
                                            class="home-click">Tin tức<svg fill="#fff" height="15"
                                                viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;"
                                                xml:space="preserve">
                                                <path id="XMLID_225_"
                                                    d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z" />
                                            </svg></a>

                                        <ul class="home-page-2 togglesubmenu">
                                            @foreach ($category_blog as $item)
                                                <li><a
                                                        href="{{ route('list.blog.category', $item->id) }}">{{ $item->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="home-drop"><a href="">Liên hệ</a></li>
                                    <li class="home-drop"><a href="{{ route('client.aboutus') }}">Giới thiệu</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <ul class="nav justify-content-center list-style-none">
                        <li class="nav-1">
                            <a class="nav-link" href="{{ url('/') }}" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Trang chủ
                            </a>
                        </li>
                        <li class="nav-1">
                            <a class="nav-link" href="{{ route('client.service') }}">Dịch vụ</a>
                        </li>
                        <li class="nav-1">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ route('blog') }}" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Tin Tức
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark"
                                        aria-labelledby="navbarDarkDropdownMenuLink">
                                        @foreach ($category_blog as $item)
                                            <li><a class="dropdown-item"
                                                    href="{{ route('list.blog.category', $item->id) }}">{{ $item->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-1">
                            <a class="nav-link" href="contact.html">Liên hệ</a>
                        </li>
                        <li class="nav-1">
                            <a class="nav-link" href="{{ route('client.aboutus') }}">Giới thiệu</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <div class="position-relative">
                        @if (Auth::check())
                            <a href="{{ route('logout') }}">
                                <button class="theme-btn-2 nav-btn " style="height: 50px;">
                                    <h6 style="color: white; transform: translateY(-13px)">Đăng xuất</h6>
                                </button>
                            </a>
                        @else
                            <a class="theme-btn-2 nav-btn " style="height: 50px;" href="javascript:void(0)"
                                data-toggle="modal" data-target="#modalAuth">
                                <h6 style="color: white; transform: translateY(-13px)">Đăng nhập</h6>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
