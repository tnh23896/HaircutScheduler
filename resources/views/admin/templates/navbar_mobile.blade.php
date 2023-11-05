<div class="mobile-menu-bar">
    <a href="#" class="flex mr-auto">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logonew2.png')}}">
    </a>
    <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                                                           class="w-8 h-8 text-white transform -rotate-90"></i> </a>
</div>
<div class="scrollable">
    <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle"
                                                           class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    <ul class="scrollable__content py-2">
        {{--

            <a href="{{ route('admin.auth.logout') }}" class="dropdown-item hover:bg-white/5"> <i --}}

        <li>
            <a href="{{ route('admin.dashboard') }}" class="menu">
                <div class="menu__icon"><i data-lucide="home"></i></div>
                <div class="menu__title"> Dashboard</div>
            </a>
        </li>
        @if(auth('admin')->user()->can('admin.serviceManagement.category.index') || auth('admin')->user()->can('admin.serviceManagement.service.index'))
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="align-justify"></i></div>
                    <div class="menu__title"> Quản lý dịch vụ <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="">
                    @if(auth('admin')->user()->can('admin.serviceManagement.category.index') )
                        <li>
                            <a href="{{ route('admin.serviceManagement.category.index') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="list-ordered"></i></div>
                                <div class="menu__title"> Danh mục</div>
                            </a>
                        </li>
                    @endif
                    @if(auth('admin')->user()->can('admin.serviceManagement.service.index') )
                        <li>
                            <a href="{{ route('admin.serviceManagement.service.index') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="scissors"></i></div>
                                <div class="menu__title"> Dịch vụ</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if(auth('admin')->user()->can('admin.employee.index'))
            <li>
                <a href="{{ route('admin.employee.index') }}" class="menu">
                    <div class="menu__icon"><i data-lucide="contact"></i></div>
                    <div class="menu__title"> Quản lý nhân viên</div>
                </a>
            </li>
        @endif
        @if(auth('admin')->user()->can('admin.scheduleManagement.index'))
            <li>
                <a href="{{ route('admin.scheduleManagement.index') }}" class="menu">
                    <div class="menu__icon"><i data-lucide="calendar"></i></div>
                    <div class="menu__title"> Quản lý lịch đặt</div>
                </a>
            </li>
        @endif
        @if(auth('admin')->user()->can('admin.billManagement.index'))
            <li>
                <a href="{{ route('admin.billManagement.index') }}" class="menu">
                    <div class="menu__icon"><i data-lucide="check-square"></i></div>
                    <div class="menu__title">Quản lý hoá đơn</div>
                </a>
            </li>
        @endif
        @if(auth('admin')->user()->can('admin.banners.index'))
            <li>
                <a href="{{ route('admin.banners.index') }}" class="menu">
                    <div class="menu__icon"><i data-lucide="square"></i></div>
                    <div class="menu__title">Quản lý banner</div>
                </a>
            </li>
        @endif
        @if(auth('admin')->user()->can('admin.UserManagement.index'))
            <li>
                <a href="{{ route('admin.UserManagement.index') }}" class="menu">
                    <div class="menu__icon"><i data-lucide="user"></i></div>
                    <div class="menu__title">Quản lý người dùng</div>
                </a>
            </li>
        @endif
        @if(auth('admin')->user()->can('admin.TimeManagement.index'))
            <li>
                <a href="{{ route('admin.TimeManagement.index') }}" class="menu">
                    <div class="menu__icon"><i data-lucide="alarm-clock"></i></div>
                    <div class="menu__title">Quản lý thời gian làm việc</div>
                </a>
            </li>
        @endif
        @if(auth('admin')->user()->can('admin.ScheduleEmployee.index'))
            <li>
                <a href="{{ route('admin.ScheduleEmployee.index') }}" class="menu">
                    <div class="menu__icon"><i data-lucide="calendar"></i></div>
                    <div class="menu__title"> Xem lịch làm việc</div>
                </a>
            </li>
        @endif
        @if(auth('admin')->user()->can('admin.RoleManagement.index'))
            <li>
                <a href="{{ route('admin.RoleManagement.index') }}" class="menu">
                    <div class="menu__icon"><i data-lucide="git-branch-plus"></i></div>
                    <div class="menu__title"> Quản lý vai trò</div>
                </a>
            </li>
        @endif
        @if(auth('admin')->user()->can('admin.blogManagement.category.index') || auth('admin')->user()->can('admin.blogManagement.blog.index'))
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="home"></i></div>
                    <div class="menu__title">Quản lý blog <i data-lucide="chevron-down" class="menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="">
                    @if(auth('admin')->user()->can('admin.blogManagement.category.index'))
                        <li>
                            <a href="{{ route('admin.blogManagement.category.index') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="list-ordered"></i></div>
                                <div class="menu__title">Danh mục</div>
                            </a>
                        </li>
                    @endif
                    @if(auth('admin')->user()->can('admin.blogManagement.blog.index'))
                        <li>
                            <a href="{{ route('admin.blogManagement.blog.index') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="activity"></i></div>
                                <div class="menu__title">Blog</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        <li>
            <a href="{{ route('admin.auth.logout') }}" class="menu">
                <div class="menu__icon"><i data-lucide="toggle-right"></i></div>
                <div class="menu__title">Đăng xuất</div>
            </a>
        </li>
        <li class="menu__devider my-6"></li>
        <li class="menu__devider my-6"></li>
    </ul>
</div>
