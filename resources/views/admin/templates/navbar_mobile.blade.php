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



        @if (auth('admin')->user()->can('admin.employee.index') ||
                auth('admin')->user()->can('admin.UserManagement.index')||
                auth('admin')->user()->can('admin.RoleManagement.index'))
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="user"></i></div>
                    <div class="menu__title"> Quản lý người dùng và vai trò <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="">
                    @if(auth('admin')->user()->can('admin.UserManagement.index'))
                        <li>
                            <a href="{{ route('admin.UserManagement.index') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="activity"></i></div>
                                <div class="menu__title">Quản lý người dùng</div>
                            </a>
                        </li>
                    @endif
                    @if(auth('admin')->user()->can('admin.employee.index'))
                        <li>
                            <a href="{{ route('admin.employee.index') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="activity"></i></div>
                                <div class="menu__title"> Quản lý nhân viên</div>
                            </a>
                        </li>
                    @endif
                    @if(auth('admin')->user()->can('admin.RoleManagement.index'))
                        <li>
                            <a href="{{ route('admin.RoleManagement.index') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="activity"></i></div>
                                <div class="menu__title"> Quản lý vai trò</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if (auth('admin')->user()->can('admin.employee.index') ||
                auth('admin')->user()->can('admin.UserManagement.index')||
                auth('admin')->user()->can('admin.RoleManagement.index'))
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="ticket"></i></div>
                    <div class="menu__title"> Quản lý đánh giá và ưu đãi <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="">
                    @if (auth('admin')->user()->can('admin.PromotionManagement.index'))
                        <li>
                            <a href="{{ route('admin.rating.index') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="activity"></i></div>
                                <div class="menu__title"> Quản lý đánh giá</div>
                            </a>
                        </li>
                    @endif
                    @if(auth('admin')->user()->can('admin.PromotionManagement.index'))
                        <li>
                            <a href="{{ route('admin.PromotionManagement.index') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="activity"></i></div>
                                <div class="menu__title"> Quản lý mã giảm giá</div>
                            </a>
                        </li>
                    @endif
                </ul>
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

        @if (auth('admin')->user()->can('admin.employee.index') ||
                auth('admin')->user()->can('admin.UserManagement.index')||
                auth('admin')->user()->can('admin.RoleManagement.index'))
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="alarm-clock"></i></div>
                    <div class="menu__title"> Quản lý lịch làm việc <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="">
                    @if(auth('admin')->user()->can('admin.TimeManagement.index'))
                        <li>
                            <a href="{{ route('admin.TimeManagement.index') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="activity"></i></div>
                                <div class="menu__title">Quản lý thời gian làm việc</div>
                            </a>
                        </li>
                    @endif
                    @if(auth('admin')->user()->can('admin.scheduleManagement.index'))
                        <li>
                            <a href="{{ route('admin.scheduleManagement.index') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="activity"></i></div>
                                <div class="menu__title"> Quản lý lịch đặt</div>
                            </a>
                        </li>
                    @endif
                    @if(auth('admin')->user()->can('admin.ScheduleEmployee.index'))
                        <li>
                            <a href="{{ route('admin.ScheduleEmployee.index') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="activity"></i></div>
                                <div class="menu__title"> Xem lịch làm việc</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if(auth('admin')->user()->can('admin.Statistical.scheduleStatistics') || auth('admin')->user()->can('admin.Statistical.revenueStatistics') ||
            auth('admin')->user()->can('admin.Statistical.serviceUsageStatistics') || auth('admin')->user()->can('admin.Statistical.employeeAndCustomerStatistics'))
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-lucide="pie-chart" class="block mx-auto"></i></div>
                    <div class="menu__title">Quản lý thống kê<i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                </a>
                <ul class="">
                    @if(auth('admin')->user()->can('admin.Statistical.revenueStatistics'))
                        <li>
                            <a href="{{ route('admin.Statistical.revenueStatistics') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="activity"></i></div>
                                <div class="menu__title">Thống kê doanh thu</div>
                            </a>
                        </li>
                    @endif
                    @if(auth('admin')->user()->can('admin.Statistical.scheduleStatistics'))
                        <li>
                            <a href="{{ route('admin.Statistical.scheduleStatistics') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="activity"></i></div>
                                <div class="menu__title">Thống kê lịch đặt</div>
                            </a>
                        </li>
                    @endif
                    @if(auth('admin')->user()->can('admin.Statistical.serviceUsageStatistics'))
                        <li>
                            <a href="{{ route('admin.Statistical.serviceUsageStatistics') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="activity"></i></div>
                                <div class="menu__title">Thống kê dịch vụ</div>
                            </a>
                        </li>
                    @endif
                    @if(auth('admin')->user()->can('admin.Statistical.employeeAndCustomerStatistics'))
                        <li>
                            <a href="{{ route('admin.Statistical.employeeAndCustomerStatistics') }}" class="menu">
                                <div class="menu__icon"><i data-lucide="activity"></i></div>
                                <div class="menu__title">Thống kê nhân viên và khách hàng</div>
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
