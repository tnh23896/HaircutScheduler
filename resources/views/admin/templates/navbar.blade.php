<nav class="side-nav">
    <a href="#" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> BookStore </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="/" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="side-menu-dark-file-manager.html" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
                <div class="side-menu__title"> Book </div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.scheduleManagement.index')}}" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-lucide="credit-card"></i> </div>
                <div class="side-menu__title"> Schedule Management </div>
            </a>
        </li>
        <li>
            <a href="side-menu-dark-chat.html" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="message-square"></i> </div>
                <div class="side-menu__title"> Rating </div>
            </a>
        </li>
        <li>
            <a href="" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title"> Genre </div>
            </a>
        </li>
        <li>
            <a href="side-menu-dark-calendar.html" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                <div class="side-menu__title"> Invoice </div>
            </a>
        </li>
        <li>
            <a href="side-menu-dark-calendar.html" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                <div class="side-menu__title"> User </div>
            </a>
        </li>
        <li>
            <a href="side-menu-dark-calendar.html" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                <div class="side-menu__title"> Promotion </div>
            </a>
        </li>
        <li>
            <a href="" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                <div class="side-menu__title"> Category </div>
            </a>
        </li>
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
                <li class="breadcrumb-item"><a href="#">Application</a></li>
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
                            <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">willsmith@left4code.com
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
            <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell"
                    class="notification__icon dark:text-slate-500"></i> </div>
            <div class="notification-content pt-2 dropdown-menu">
                <div class="notification-content__box dropdown-content">
                    <div class="notification-content__title">Notifications</div>
                    <div class="cursor-pointer relative flex items-center mt-5">
                        <div class="w-12 h-12 flex-none image-fit mr-1">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="{{ asset('dist/images/profile-3.jpg') }}">
                            <div
                                class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                            </div>
                        </div>
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a href="javascript:;" class="font-medium truncate mr-5">John Travolta</a>
                                <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                            </div>
                            <div class="w-full truncate text-slate-500 mt-0.5">There are many variations of passages of
                                Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                injected humour, or randomi</div>
                        </div>
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
                        <div class="font-medium">Kevin Spacey</div>
                        <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Backend Engineer</div>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    <li>
                        <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="user"
                                class="w-4 h-4 mr-2"></i> Profile </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit"
                                class="w-4 h-4 mr-2"></i> Add Account </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock"
                                class="w-4 h-4 mr-2"></i> Reset Password </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle"
                                class="w-4 h-4 mr-2"></i> Help </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    <li>
                        <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right"
                                class="w-4 h-4 mr-2"></i> Logout </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
    <!-- END: Top Bar -->
