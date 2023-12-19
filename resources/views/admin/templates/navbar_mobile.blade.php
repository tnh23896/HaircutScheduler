    <div class="mobile-menu-bar">
        <a href="{{ route('admin.welcome') }}" class="flex mr-auto">
            <img alt="Midone - HTML Admin Template" class="" style="width: 60px" src="{{ asset('dist/images/LOGO.png') }}">
        </a>
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle"
                class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        <ul class="scrollable__content py-2">
            @if (auth('admin')->user()->can('admin.dashboard'))
            <li>
                <a href="{{ route('admin.dashboard') }}" class="menu">
                    <div class="menu__icon"><i data-lucide="home"></i></div>
                    <div class="menu__title"> Dashboard</div>
                </a>
            </li>
            @endif
            {{-- Dịch vụ --}}
            @if (auth('admin')->user()->can('admin.serviceManagement.category.index') ||
                    auth('admin')->user()->can('admin.serviceManagement.service.index'))
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"><i data-lucide="align-justify"></i></div>
                        <div class="menu__title"> Quản lý dịch vụ <i data-lucide="chevron-down"
                                class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        @if (auth('admin')->user()->can('admin.serviceManagement.category.index'))
                            <li>
                                <a href="{{ route('admin.serviceManagement.category.index') }}" class="menu">
                                    <div class="menu__icon"><i data-lucide="list-ordered"></i></div>
                                    <div class="menu__title"> Danh mục</div>
                                </a>
                            </li>
                        @endif
                        @if (auth('admin')->user()->can('admin.serviceManagement.service.index'))
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

            {{-- Đơn --}}
            @if (auth('admin')->user()->can('admin.scheduleManagement.index') ||
                    auth('admin')->user()->can('admin.billManagement.index'))
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"><i data-lucide="book-open"></i></div>
                        <div class="menu__title"> Quản lý đơn <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        @if (auth('admin')->user()->can('admin.scheduleManagement.index'))
                            <li>
                                <a href="{{ route('admin.scheduleManagement.index') }}" class="menu">
                                    <div class="menu__icon"><i data-lucide="shopping-bag"></i></div>
                                    <div class="menu__title">Lịch đặt</div>
                                </a>
                            </li>
                        @endif
                        @if (auth('admin')->user()->can('admin.billManagement.index'))
                            <li>
                                <a href="{{ route('admin.billManagement.index') }}" class="menu">
                                    <div class="menu__icon"><i data-lucide="check-square"></i></div>
                                    <div class="menu__title">Hoá đơn</div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- Người dùng --}}
            @if (auth('admin')->user()->can('admin.employee.index') ||
                    auth('admin')->user()->can('admin.UserManagement.index') ||
                    auth('admin')->user()->can('admin.RoleManagement.index'))
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"><i data-lucide="user"></i></div>
                        <div class="menu__title"> Quản lý người dùng<i data-lucide="chevron-down"
                                class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        @if (auth('admin')->user()->can('admin.UserManagement.index'))
                            <li>
                                <a href="{{ route('admin.UserManagement.index') }}" class="menu">
                                    <div class="menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-user-circle-2">
                                            <path d="M18 20a6 6 0 0 0-12 0" />
                                            <circle cx="12" cy="10" r="4" />
                                            <circle cx="12" cy="12" r="10" />
                                        </svg></div>
                                    <div class="menu__title">Khách hàng</div>
                                </a>
                            </li>
                        @endif
                        @if (auth('admin')->user()->can('admin.employee.index'))
                            <li>
                                <a href="{{ route('admin.employee.index') }}" class="menu">
                                    <div class="menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-user-cog">
                                            <circle cx="18" cy="15" r="3" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                                            <path d="m21.7 16.4-.9-.3" />
                                            <path d="m15.2 13.9-.9-.3" />
                                            <path d="m16.6 18.7.3-.9" />
                                            <path d="m19.1 12.2.3-.9" />
                                            <path d="m19.6 18.7-.4-1" />
                                            <path d="m16.8 12.3-.4-1" />
                                            <path d="m14.3 16.6 1-.4" />
                                            <path d="m20.7 13.8 1-.4" />
                                        </svg></i></div>
                                    <div class="menu__title">Nhân viên</div>
                                </a>
                            </li>
                        @endif
                        @if (auth('admin')->user()->can('admin.RoleManagement.index'))
                            <li>
                                <a href="{{ route('admin.RoleManagement.index') }}" class="menu">
                                    <div class="menu__icon"><i data-lucide="shield"></i></div>
                                    <div class="menu__title">Vai trò</div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- Lịch làm việc --}}
            @if (auth('admin')->user()->can('admin.TimeManagement.index') ||
                    auth('admin')->user()->can('admin.ScheduleEmployee.index'))
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"><i data-lucide="alarm-clock"></i></div>
                        <div class="menu__title"> Quản lý lịch làm việc <i data-lucide="chevron-down"
                                class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        @if (auth('admin')->user()->can('admin.TimeManagement.index'))
                            <li>
                                <a href="{{ route('admin.TimeManagement.index') }}" class="menu">
                                    <div class="menu__icon"><i data-lucide="clock-3"></i></div>
                                    <div class="menu__title">Thời gian làm việc</div>
                                </a>
                            </li>
                        @endif

                        @if (auth('admin')->user()->can('admin.ScheduleEmployee.index'))
                            <li>
                                <a href="{{ route('admin.ScheduleEmployee.index') }}" class="menu">
                                    <div class="menu__icon"><i data-lucide="calendar"></i></div>
                                    <div class="menu__title"> Xem lịch làm việc</div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- Đánh giá và ưu đãi --}}
            @if (auth('admin')->user()->can('admin.rating.index') ||
                    auth('admin')->user()->can('admin.PromotionManagement.index'))
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"><i data-lucide="ticket"></i></div>
                        <div class="menu__title"> Quản lý đánh giá và ưu đãi <i data-lucide="chevron-down"
                                class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        @if (auth('admin')->user()->can('admin.rating.index'))
                            <li>
                                <a href="{{ route('admin.rating.index') }}" class="menu">
                                    <div class="menu__icon"><i data-lucide="star"></i></div>
                                    <div class="menu__title">Đánh giá</div>
                                </a>
                            </li>
                        @endif
                        @if (auth('admin')->user()->can('admin.PromotionManagement.index'))
                            <li>
                                <a href="{{ route('admin.PromotionManagement.index') }}" class="menu">
                                    <div class="menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-badge-dollar-sign">
                                            <path
                                                d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                                            <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                                            <path d="M12 18V6" />
                                        </svg></div>
                                    <div class="menu__title">Mã giảm giá</div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- Tin tức --}}
            @if (auth('admin')->user()->can('admin.blogManagement.category.index') ||
                    auth('admin')->user()->can('admin.blogManagement.blog.index'))
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"><i data-lucide="book-open" class="block mx-auto"></i></div>
                        <div class="menu__title"> Quản lý tin tức<i data-lucide="chevron-down"
                                class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        @if (auth('admin')->user()->can('admin.blogManagement.category.index'))
                            <li>
                                <a href="{{ route('admin.blogManagement.category.index') }}" class="menu">
                                    <div class="menu__icon"><i data-lucide="list-ordered"></i></div>
                                    <div class="menu__title">Danh mục</div>
                                </a>
                            </li>
                        @endif
                        @if (auth('admin')->user()->can('admin.blogManagement.blog.index'))
                            <li>
                                <a href="{{ route('admin.blogManagement.blog.index') }}" class="menu">
                                    <div class="menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-newspaper">
                                            <path
                                                d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                                            <path d="M18 14h-8" />
                                            <path d="M15 18h-5" />
                                            <path d="M10 6h8v4h-8V6Z" />
                                        </svg></div>
                                    <div class="menu__title">Tin tức</div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- Thống kê --}}
            @if (auth('admin')->user()->can('admin.Statistical.scheduleStatistics') ||
                    auth('admin')->user()->can('admin.Statistical.revenueStatistics') ||
                    auth('admin')->user()->can('admin.Statistical.serviceUsageStatistics') ||
                    auth('admin')->user()->can('admin.Statistical.employeeAndCustomerStatistics'))
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"><i data-lucide="pie-chart" class="block mx-auto"></i></div>
                        <div class="menu__title">Quản lý thống kê<i data-lucide="chevron-down"
                                class="menu__sub-icon "></i> </div>
                    </a>
                    <ul class="">
                        @if (auth('admin')->user()->can('admin.Statistical.revenueStatistics'))
                            <li>
                                <a href="{{ route('admin.Statistical.revenueStatistics') }}" class="menu">
                                    <div class="menu__icon"><i data-lucide="trending-up"></i></div>
                                    <div class="menu__title">Doanh thu</div>
                                </a>
                            </li>
                        @endif
                        @if (auth('admin')->user()->can('admin.Statistical.scheduleStatistics'))
                            <li>
                                <a href="{{ route('admin.Statistical.scheduleStatistics') }}" class="menu">
                                    <div class="menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-bar-chart-3">
                                            <path d="M3 3v18h18" />
                                            <path d="M18 17V9" />
                                            <path d="M13 17V5" />
                                            <path d="M8 17v-3" />
                                        </svg></div>
                                    <div class="menu__title">Lịch đặt</div>
                                </a>
                            </li>
                        @endif
                        @if (auth('admin')->user()->can('admin.Statistical.serviceUsageStatistics'))
                            <li>
                                <a href="{{ route('admin.Statistical.serviceUsageStatistics') }}" class="menu">
                                    <div class="menu__icon"><i data-lucide="pie-chart"></i></div>
                                    <div class="menu__title">Dịch vụ</div>
                                </a>
                            </li>
                        @endif
                        @if (auth('admin')->user()->can('admin.Statistical.employeeAndCustomerStatistics'))
                            <li>
                                <a href="{{ route('admin.Statistical.employeeAndCustomerStatistics') }}"
                                    class="menu">
                                    <div class="menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-bar-chart-horizontal">
                                            <path d="M3 3v18h18" />
                                            <path d="M7 16h8" />
                                            <path d="M7 11h12" />
                                            <path d="M7 6h3" />
                                        </svg></div>
                                    <div class="menu__title">Nhân viên và khách hàng</div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- Banner --}}
            @if (auth('admin')->user()->can('admin.banners.index'))
                <li>
                    <a href="{{ route('admin.banners.index') }}" class="menu">
                        <div class="menu__icon"><i data-lucide="square"></i></div>
                        <div class="menu__title">Quản lý banner</div>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('admin.auth.logout') }}" class="menu">
                    <div class="menu__icon"><i data-lucide="toggle-right"></i></div>
                    <div class="menu__title">Đăng xuất</div>
                </a>
            </li>
            <li class="menu__devider my-6"></li>
        </ul>
    </div>
