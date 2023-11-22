<header class="about-head">
    <div class="nav-top" id="nav_nav">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('dist/images/logonew2.png') }}"
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
                                            class="home-click">Tin tức</a>
                                    </li>
                                    <li class="home-drop"><a href="{{route('client.contact')}}">Liên hệ</a></li>
                                    <li class="home-drop"><a href="{{ route('client.aboutus') }}">Giới thiệu</a></li>
                                    <div class="home-drop">

                                        @if (Auth::check())
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <a class="dropdown-toggle" href="javascript:void(0)"
                                                        role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                                        style="background-color: #d9842f !important; color: white; size: 30px">
                                                        Xin chào : <span>{{ Auth::user()->phone }}</span>
                                                    </a>

                                                    <ul class="dropdown-menu" style="top: 30px;background-color: #d9842f;"
                                                    aria-labelledby="navbarDarkDropdownMenuLink">
                                                        <li ><a class="dropdown-item" href="{{ route('profile.edit') }}">Thông tin cá nhân</a></li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>

                                        @else
                                            <a class="theme-btn-2" style="padding: 20px 1px;height: 20px;margin-bottom: 5px; margin-top: 10px"
                                                href="javascript:void(0)" data-toggle="modal" data-target="#modalAuth">
                                                <span style="color: white; transform: translateY(-13px) ">Đăng nhập</span>
                                            </a>
                                        @endif
                                    </div>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 ">
                    <ul class="nav justify-content-center list-style-none">
                        <li class="nav-1">
                            <a class="nav-link" href="{{ route('home.index') }}">Trang chủ</a>
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
                                </li>
                            </ul>
                        </li>

                        <li class="nav-1">
                            <a class="nav-link" href="{{route('client.contact')}}">Liên hệ</a>
                        </li>
                        <li class="nav-1">
                            <a class="nav-link" href="{{ route('client.aboutus') }}">Giới thiệu</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2" style="margin-top:18px ;">
                    <div class="nav-login">

                        @if (Auth::check())
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown ">
                                    <a class="btn btn-secondary dropdown-toggle border-0" href="javascript:void(0)"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="background-color: #d9842f !important; color: white;">
                                        Xin chào : <span>{{ Auth::user()->phone }}</span>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-dark" style="top: 45px;"
                                        aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Thông tin cá nhân</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        @else
                            <a class="theme-btn-2" style="padding: 20px 15px;height: 10px;margin-bottom: 5px ;"
                                href="javascript:void(0)" data-toggle="modal" data-target="#modalAuth">
                                <h6 style="color: white; transform: translateY(-10px)">Đăng nhập</h6>
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
