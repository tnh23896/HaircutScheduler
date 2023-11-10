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
        <img alt="Midone - HTML Admin Template" class="w-10" src="{{ asset('dist/images/logonew2.png') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> DT BARBER </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="side-menu {{ request()->routeIs('admin.dashboard') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"><i data-lucide="home"></i></div>
                <div class="side-menu__title"> Dashboard</div>
            </a>
        </li>
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
        @if (auth('admin')->user()->can('admin.employee.index'))
            <li>
                <a href="{{ route('admin.employee.index') }}"
                    class="side-menu {{ request()->routeIs('admin.employee*') ? 'side-menu--active' : '' }} {{ request()->routeIs('admin.work-schedule.*') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="contact"></i></div>
                    <div class="side-menu__title">Quản lý nhân viên</div>
                </a>
            </li>
        @endif
        @if (auth('admin')->user()->can('admin.scheduleManagement.index'))
            <li>
                <a href="{{ route('admin.scheduleManagement.index') }}"
                    class="side-menu {{ request()->routeIs('admin.scheduleManagement*') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="calendar"></i></div>
                    <div class="side-menu__title"> Quản lý lịch đặt</div>
                </a>
            </li>
        @endif
        @if (auth('admin')->user()->can('admin.billManagement.index'))
            <li>
                <a href="{{ route('admin.billManagement.index') }}"
                    class="side-menu {{ request()->routeIs('admin.billManagement*') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="check-square"></i></div>
                    <div class="side-menu__title"> Quản lý hoá đơn</div>
                </a>
            </li>
        @endif
        @if (auth('admin')->user()->can('admin.banners.index'))
            <li>
                <a href="{{ route('admin.banners.index') }}"
                    class="side-menu {{ request()->routeIs('admin.banners*') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="square"></i></div>
                    <div class="side-menu__title"> Quản lý Banners</div>
                </a>
            </li>
        @endif
        @if (auth('admin')->user()->can('admin.UserManagement.index'))
            <li>
                <a href="{{ route('admin.UserManagement.index') }}"
                    class="side-menu {{ request()->routeIs('admin.UserManagement*') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="user"></i></div>
                    <div class="side-menu__title"> Quản lý người dùng</div>
                </a>
            </li>
        @endif
        @if (auth('admin')->user()->can('admin.TimeManagement.index'))
            <li>
                <a href="{{ route('admin.TimeManagement.index') }}"
                    class="side-menu {{ request()->routeIs('admin.TimeManagement*') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="alarm-clock"></i></div>
                    <div class="side-menu__title"> Quản lý thời gian làm việc</div>
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
        @if (auth('admin')->user()->can('admin.RoleManagement.index'))
            <li>
                <a href="{{ route('admin.RoleManagement.index') }}"
                    class="side-menu {{ request()->routeIs('admin.RoleManagement*') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="git-branch-plus"></i></div>
                    <div class="side-menu__title"> Quản lý vai trò</div>
                </a>
            </li>
        @endif
        @if (auth('admin')->user()->can('admin.PromotionManagement.index'))
            <li>
                <a href="{{ route('admin.PromotionManagement.index') }}"
                    class="side-menu {{ request()->routeIs('admin.PromotionManagement*') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="ticket"></i></div>
                    <div class="side-menu__title"> Quản lý mã giảm giá</div>
                </a>
            </li>
        @endif
        @if (auth('admin')->user()->can('admin.blogManagement.category.index') ||
                auth('admin')->user()->can('admin.blogManagement.blog.index'))
            <li>
                <a href="javascript:;"
                    class="side-menu {{ request()->routeIs('admin.blogManagement.*') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"><i data-lucide="align-justify" class="block mx-auto"></i></div>
                    <div class="side-menu__title">
                        Quản lý Blog
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
                                <div class="side-menu__icon"><i data-lucide="activity"></i></div>
                                <div class="side-menu__title">Blog</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
    </ul>
</nav>
<!-- END: Side Menu -->
<!-- BEGIN: Content -->
<div class="content">
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
            </ol>
        </nav>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
                <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
            </div>
            <a class="notification sm:hidden" href="#"> <i data-lucide="search"
                    class="notification__icon dark:text-slate-500"></i> </a>
            <div class="search-result">
                <div class="search-result__content">
                    <div class="search-result__content__title">Pages</div>
                    <div class="mb-5">
                        <a href="#" class="flex items-center">
                            <div
                                class="w-8 h-8 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full">
                                <i class="w-4 h-4" data-lucide="inbox"></i>
                            </div>
                            <div class="ml-3">Mail Settings</div>
                        </a>

                    </div>
                    <div class="search-result__content__title">Users</div>
                    <div class="mb-5">
                        <a href="#" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone - HTML Admin Template" class="rounded-full"
                                    src="{{ asset('dist/images/profile-9.jpg') }}">
                            </div>
                            <div class="ml-3">Will Smith</div>
                            <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                                willsmith@left4code.com
                            </div>
                        </a>
                    </div>
                    <div class="search-result__content__title">Products</div>
                    <a href="#" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="{{ asset('dist/images/preview-9.jpg') }}">
                        </div>
                        <div class="ml-3">Oppo Find X2 Pro</div>
                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Smartphone &amp; Tablet
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- END: Search -->
        <!-- BEGIN: Notifications -->
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
                <img alt="Midone - HTML Admin Template" src="{{ asset('dist/images/profile-9.jpg') }}">
            </div>
            <div class="dropdown-menu w-56">
                <ul class="dropdown-content bg-primary text-white">
                    <li class="p-2">
                        <div class="font-medium">{{ auth('admin')->user()->username }}</div>
                        @foreach (auth('admin')->user()->getRoleNames() as $v)
                            <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{ $v }}</div>
                        @endforeach
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    <li>
                        <a href="{{ route('admin.profile.edit') }}" class="dropdown-item hover:bg-white/5"> <i
                                data-lucide="user" class="w-4 h-4 mr-2"></i> Thông tin cá nhân </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
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

        //Cập nhật thông báo mới
        function updateAdminNotifications(data) {
            var adminNotifications = document.querySelector('#admin-notifications');
            var html = `
          <hr style="height: 1px" class="mx-auto my-4 bg-white border-0 rounded md:my-10 dark:bg-gray-700">
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
