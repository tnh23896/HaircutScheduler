<style>
    /* Firefox */
    .scroll-container {
        scrollbar-width: thin;
    }

    /* Webkit (Safari/Chrome) */
    .scroll-container::-webkit-scrollbar {
        width: 6px;
    }

    .scroll-container::-webkit-scrollbar-thumb {
        width: 6px;
    }

    .notification-dot {
        position: absolute;
        top: 0;
        right: 0;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: red;
        display: none;
        /* Ẩn dấu chấm đỏ ban đầu */
    }

    .notification-dot.active {
        display: block;
        /* Hiển thị dấu chấm đỏ khi có thông báo mới */
    }
</style>

<nav class="side-nav">
    <a href="#" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone - HTML Admin Template" class="w-10" src="{{ asset('dist/images/LOGO.png') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> DT BARBER </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        @if (auth('admin')->user()->can('admin.dashboard'))
        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="side-menu {{ request()->routeIs('admin.dashboard') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"><i data-lucide="home"></i></div>
                <div class="side-menu__title"> Dashboard</div>
            </a>
        </li>
        @endif
        {{-- Dịch vụ --}}
        @if (auth('admin')->user()->can('admin.serviceManagement.category.index') ||
                auth('admin')->user()->can('admin.serviceManagement.service.index'))
            <li>
                <a href="javascript:;"
                    class="side-menu {{ request()->routeIs('admin.serviceManagement.*') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="align-justify" class="block mx-auto"></i></div>
                    <div class="side-menu__title">
                        Quản lý dịch vụ
                        <div class="side-menu__sub-icon "><i data-lucide="chevron-down"></i></div>
                    </div>
                </a>
                <ul class="">
                    @if (auth('admin')->user()->can('admin.serviceManagement.category.index'))
                        <li>
                            <a href="{{ route('admin.serviceManagement.category.index') }}"
                                class="side-menu {{ request()->routeIs('admin.serviceManagement.category*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i data-lucide="list-ordered"></i></div>
                                <div class="side-menu__title">Danh mục</div>
                            </a>
                        </li>
                    @endif

                    @if (auth('admin')->user()->can('admin.serviceManagement.service.index'))
                        <li>
                            <a href="{{ route('admin.serviceManagement.service.index') }}"
                                class="side-menu {{ request()->routeIs('admin.serviceManagement.service*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i data-lucide="scissors"></i></div>
                                <div class="side-menu__title">Dịch vụ</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Quản lý đơn --}}
        @if (auth('admin')->user()->can('admin.scheduleManagement.index') ||
                auth('admin')->user()->can('admin.billManagement.index'))
            <li>
                <a href="javascript:;"
                    class="side-menu {{ request()->routeIs('admin.scheduleManagement.*') || request()->routeIs('admin.billManagement.*')
                        ? 'side-menu--active'
                        : '' }}">
                    <div class="side-menu__icon"><i data-lucide="book-open" class="block mx-auto"></i> </div>
                    <div class="side-menu__title">
                        Quản lý đơn
                        <div class="side-menu__sub-icon "><i data-lucide="chevron-down"></i></div>
                    </div>
                </a>
                <ul class="">
                    @if (auth('admin')->user()->can('admin.scheduleManagement.index'))
                        <li>
                            <a href="{{ route('admin.scheduleManagement.index') }}"
                                class="side-menu {{ request()->routeIs('admin.scheduleManagement*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i data-lucide="shopping-bag"></i></div>
                                <div class="side-menu__title">Lịch đặt</div>
                            </a>
                        </li>
                    @endif
                    @if (auth('admin')->user()->can('admin.billManagement.index'))
                        <li>
                            <a href="{{ route('admin.billManagement.index') }}"
                                class="side-menu {{ request()->routeIs('admin.billManagement*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i data-lucide="clipboard" class="block mx-auto"></i></div>
                                <div class="side-menu__title">Hoá đơn</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Quản lý người dùng --}}
        @if (auth('admin')->user()->can('admin.employee.index') ||
                auth('admin')->user()->can('admin.UserManagement.index') ||
                auth('admin')->user()->can('admin.RoleManagement.index'))
            <li>
                <a href="javascript:;"
                    class="side-menu {{ request()->routeIs('admin.employee.*') ||
                    request()->routeIs('admin.UserManagement.*') ||
                    request()->routeIs('admin.RoleManagement.*')
                        ? 'side-menu--active'
                        : '' }}">
                    <div class="side-menu__icon"><i data-lucide="user"></i></div>
                    <div class="side-menu__title">
                        Quản lý người dùng
                        <div class="side-menu__sub-icon "><i data-lucide="chevron-down"></i></div>
                    </div>
                </a>
                <ul class="">
                    @if (auth('admin')->user()->can('admin.UserManagement.index'))
                        <li>
                            <a href="{{ route('admin.UserManagement.index') }}"
                                class="side-menu {{ request()->routeIs('admin.UserManagement*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-user-circle-2">
                                        <path d="M18 20a6 6 0 0 0-12 0" />
                                        <circle cx="12" cy="10" r="4" />
                                        <circle cx="12" cy="12" r="10" />
                                    </svg></div>
                                <div class="side-menu__title">Khách hàng</div>
                            </a>
                        </li>
                    @endif
                    @if (auth('admin')->user()->can('admin.employee.index'))
                        <li>
                            <a href="{{ route('admin.employee.index') }}"
                                class="side-menu {{ request()->routeIs('admin.employee*') ? 'side-menu--active' : '' }} {{ request()->routeIs('admin.work-schedule.*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
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
                                <div class="side-menu__title">Nhân viên</div>
                            </a>
                        </li>
                    @endif
                    @if (auth('admin')->user()->can('admin.RoleManagement.index'))
                        <li>
                            <a href="{{ route('admin.RoleManagement.index') }}"
                                class="side-menu {{ request()->routeIs('admin.RoleManagement*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i data-lucide="shield"></i></div>
                                <div class="side-menu__title">Vai trò</div>
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
                <a href="javascript:;"
                    class="side-menu {{ request()->routeIs('admin.TimeManagement.*') || request()->routeIs('admin.ScheduleEmployee.*')
                        ? 'side-menu--active'
                        : '' }}">
                    <div class="side-menu__icon"><i data-lucide="alarm-clock"></i></div>
                    <div class="side-menu__title">
                        Quản lý lịch làm việc
                        <div class="side-menu__sub-icon "><i data-lucide="chevron-down"></i></div>
                    </div>
                </a>
                <ul class="">
                    @if (auth('admin')->user()->can('admin.TimeManagement.index'))
                        <li>
                            <a href="{{ route('admin.TimeManagement.index') }}"
                                class="side-menu {{ request()->routeIs('admin.TimeManagement*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i data-lucide="clock-3"></i></div>
                                <div class="side-menu__title">Thời gian làm việc</div>
                            </a>
                        </li>
                    @endif

                    @if (auth('admin')->user()->can('admin.ScheduleEmployee.index'))
                        <li>
                            <a href="{{ route('admin.ScheduleEmployee.index') }}"
                                class="side-menu {{ request()->routeIs('admin.ScheduleEmployee*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i data-lucide="calendar"></i></div>
                                <div class="side-menu__title"> Xem lịch làm việc</div>
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
                <a href="javascript:;"
                    class="side-menu {{ request()->routeIs('admin.rating.*') || request()->routeIs('admin.PromotionManagement.*')
                        ? 'side-menu--active'
                        : '' }}">
                    <div class="side-menu__icon"><i data-lucide="ticket"></i></div>
                    <div class="side-menu__title">
                        Quản lý đánh giá và ưu đãi
                        <div class="side-menu__sub-icon"><i data-lucide="chevron-down"></i></div>
                    </div>
                </a>
                <ul class="">
                    @if (auth('admin')->user()->can('admin.rating.index'))
                        <li>
                            <a href="{{ route('admin.rating.index') }}"
                                class="side-menu {{ request()->routeIs('admin.rating.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i data-lucide="star"></i></div>
                                <div class="side-menu__title">Đánh giá</div>
                            </a>
                        </li>
                    @endif
                    @if (auth('admin')->user()->can('admin.PromotionManagement.index'))
                        <li>
                            <a href="{{ route('admin.PromotionManagement.index') }}"
                                class="side-menu {{ request()->routeIs('admin.PromotionManagement*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-badge-dollar-sign">
                                        <path
                                            d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                                        <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                                        <path d="M12 18V6" />
                                    </svg></div>
                                <div class="side-menu__title">Mã giảm giá</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Quản lý tin tức --}}
        @if (auth('admin')->user()->can('admin.blogManagement.category.index') ||
                auth('admin')->user()->can('admin.blogManagement.blog.index'))
            <li>
                <a href="javascript:;"
                    class="side-menu {{ request()->routeIs('admin.blogManagement.*') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="book-open" class="block mx-auto"></i> </div>
                    <div class="side-menu__title">
                        Quản lý tin tức
                        <div class="side-menu__sub-icon "><i data-lucide="chevron-down"></i></div>
                    </div>
                </a>
                <ul class="">
                    @if (auth('admin')->user()->can('admin.blogManagement.category.index'))
                        <li>
                            <a href="{{ route('admin.blogManagement.category.index') }}"
                                class="side-menu {{ request()->routeIs('admin.blogManagement.category*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i data-lucide="list-ordered"></i></div>
                                <div class="side-menu__title">Danh mục</div>
                            </a>
                        </li>
                    @endif
                    @if (auth('admin')->user()->can('admin.blogManagement.blog.index'))
                        <li>
                            <a href="{{ route('admin.blogManagement.blog.index') }}"
                                class="side-menu {{ request()->routeIs('admin.blogManagement.blog*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-newspaper">
                                        <path
                                            d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                                        <path d="M18 14h-8" />
                                        <path d="M15 18h-5" />
                                        <path d="M10 6h8v4h-8V6Z" />
                                    </svg></div>
                                <div class="side-menu__title">Tin tức</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Quản lý thống kê --}}
        @if (auth('admin')->user()->can('admin.Statistical.scheduleStatistics') ||
                auth('admin')->user()->can('admin.Statistical.revenueStatistics') ||
                auth('admin')->user()->can('admin.Statistical.serviceUsageStatistics') ||
                auth('admin')->user()->can('admin.Statistical.employeeAndCustomerStatistics'))
            <li>
                <a href="javascript:;"
                    class="side-menu {{ request()->routeIs('admin.Statistical.*') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="pie-chart" class="block mx-auto"></i></div>
                    <div class="side-menu__title">
                        Quản lý thống kê
                        <div class="side-menu__sub-icon "><i data-lucide="chevron-down"></i></div>
                    </div>
                </a>
                <ul class="">
                    @if (auth('admin')->user()->can('admin.Statistical.revenueStatistics'))
                        <li>
                            <a href="{{ route('admin.Statistical.revenueStatistics') }}"
                                class="side-menu {{ request()->routeIs('admin.Statistical.revenueStatistics*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i data-lucide="trending-up"></i></div>
                                <div class="side-menu__title">Doanh thu</div>
                            </a>
                        </li>
                    @endif
                    @if (auth('admin')->user()->can('admin.Statistical.scheduleStatistics'))
                        <li>
                            <a href="{{ route('admin.Statistical.scheduleStatistics') }}"
                                class="side-menu {{ request()->routeIs('admin.Statistical.scheduleStatistics*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-bar-chart-3">
                                        <path d="M3 3v18h18" />
                                        <path d="M18 17V9" />
                                        <path d="M13 17V5" />
                                        <path d="M8 17v-3" />
                                    </svg></div>
                                <div class="side-menu__title">Lịch đặt</div>
                            </a>
                        </li>
                    @endif
                    @if (auth('admin')->user()->can('admin.Statistical.serviceUsageStatistics'))
                        <li>
                            <a href="{{ route('admin.Statistical.serviceUsageStatistics') }}"
                                class="side-menu {{ request()->routeIs('admin.Statistical.serviceUsageStatistics*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i data-lucide="pie-chart"></i></div>
                                <div class="side-menu__title">Dịch vụ</div>
                            </a>
                        </li>
                    @endif
                    @if (auth('admin')->user()->can('admin.Statistical.employeeAndCustomerStatistics'))
                        <li>
                            <a href="{{ route('admin.Statistical.employeeAndCustomerStatistics') }}"
                                class="side-menu {{ request()->routeIs('admin.Statistical.employeeAndCustomerStatistics*') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-bar-chart-horizontal">
                                        <path d="M3 3v18h18" />
                                        <path d="M7 16h8" />
                                        <path d="M7 11h12" />
                                        <path d="M7 6h3" />
                                    </svg></div>
                                <div class="side-menu__title">Nhân viên và khách hàng</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Quản lý banners --}}
        @if (auth('admin')->user()->can('admin.banners.index'))
            <li>
                <a href="{{ route('admin.banners.index') }}"
                    class="side-menu {{ request()->routeIs('admin.banners*') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="square"></i></div>
                    <div class="side-menu__title"> Quản lý banners</div>
                </a>
            </li>
        @endif
    </ul>
</nav>
<div class="content">
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
            </ol>
        </nav>
        <div class="intro-x dropdown mr-auto sm:mr-6">
            <div class="dropdown-toggle notification cursor-pointer" role="button" aria-expanded="false"
                data-tw-toggle="dropdown">
                <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i>
                <span id="notification-dot" class="notification-dot"></span>
            </div>
            <div class="notification-content pt-2 dropdown-menu">
                <div class="notification-content__box dropdown-content">
                    <div class="notification-content__title flex justify-between items-center">
                        <span class="whitespace-nowrap">Thông báo</span>
                        <span class="whitespace-nowrap ml-auto text-red-500 cursor-pointer"
                            id="deleteNotifications">Xóa tất cả</span>
                    </div>
                    <div id="admin-notifications" class="cursor-pointer relative items-center mt-5 scroll-container"
                        style="overflow: auto;
                                height: 350px;">
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Notifications -->
        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in"
                role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <img alt="{{ auth('admin')->user()->username }}"
                    src="{{auth('admin')->user()->avatar == '' ? asset('dist/images/default.jpg') : asset(auth('admin')->user()->avatar) }}">
            </div>
            <div class="dropdown-menu w-56">
                <ul class="dropdown-content bg-primary text-white">
                    <li class="p-2">
                        <div class="font-medium">{{ auth('admin')->user()->username }}</div>
                        @foreach (auth('admin')->user()->getRoleNames() as $v)
                            <div class="text-xs text-black/70 mt-0.5 dark:text-slate-500">{{ $v }}</div>
                        @endforeach
                    </li>
                    <li>
                        <hr class="dropdown-divider border-black/[0.08]">
                    </li>
                    <li>
                        <a href="{{ route('admin.profile.edit') }}" class="dropdown-item hover:bg-white/5"> <i
                                data-lucide="user" class="w-4 h-4 mr-2"></i> Thông tin cá nhân </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-black/[0.08]">
                    </li>
                    <li>
                        <a href="{{ route('admin.auth.logout') }}" class="dropdown-item hover:bg-white/5"> <i
                                data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Đăng xuất </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
    @include('admin.Auth.resetPassword')
    <!-- END: Top Bar -->
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        var pusher = new Pusher('80d489da003027f09add', {
            cluster: 'ap1'
        });

        //Lắng nghe sự kiện từ pusher, lưu thông báo vào localstorage
        var channel = pusher.subscribe('order');
        channel.bind('order-handle', function(data) {
            const existingData = JSON.parse(localStorage.getItem('newBooking')) || [];
            var notificationDot = document.getElementById("notification-dot");
            notificationDot.classList.add("active");
            existingData.push(data);
            localStorage.setItem('newBooking', JSON.stringify(existingData));
            updateAdminNotifications(data);
        });

        var cancel = pusher.subscribe('cancel');
        cancel.bind('cancel-handle', function(data) {
            const existingData = JSON.parse(localStorage.getItem('newBooking')) || [];
            var notificationDot = document.getElementById("notification-dot");
            notificationDot.classList.add("active");
            existingData.push(data);
            localStorage.setItem('newBooking', JSON.stringify(existingData));
            updateAdminNotifications(data);
        });

        //Cập nhật thông báo mới
        function updateAdminNotifications(data) {
            var adminNotifications = document.querySelector('#admin-notifications');
            var html = `
          <hr style="height: 1px; color: #312E81;" class="mx-auto my-4 bg-black border-0 rounded md:my-10 dark:bg-gray-700">
          <div class="ml-2 overflow-hidden">
            <div class="flex items-center">
              <a href="javascript:;" class="font-medium truncate mr-5">${data.message.message}</a>
              <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">${data.message.created_at}</div>
            </div>
            <div class="w-full truncate text-slate-500 mt-0.5">${data.message.id}. Lịch đặt: ${data.message.time} ${data.message.day}</div>
          </div>
        `;
            adminNotifications.insertAdjacentHTML('afterbegin', html);
        }

        //Lấy thông báo từ localstorage
        document.addEventListener('DOMContentLoaded', function() {
            const existingData = JSON.parse(localStorage.getItem('newBooking')) || [];
            existingData.forEach(function(data) {
                updateAdminNotifications(data);
            });
        });

        //Xóa dấu chấm đỏ khi có thông báo mới
        document.querySelector('.dropdown-toggle.notification').addEventListener('click', function() {
            var notificationDot = document.getElementById("notification-dot");
            notificationDot.classList.remove("active");
        });

        //xóa thông báo
        $('#deleteNotifications').click(function() {
            localStorage.removeItem('newBooking');
            $('#admin-notifications').html('');
        });
    </script>
