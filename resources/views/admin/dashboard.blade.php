@extends('admin.templates.app')
@section('title', 'Bảng điều khiển')
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Báo cáo tổng hợp
                        </h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="shopping-cart"
                                            data-lucide="shopping-cart"
                                            class="lucide lucide-shopping-cart report-box__icon text-primary">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path>
                                        </svg>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $getbill }}</div>
                                    <div class="text-base text-slate-500 mt-1">Đơn thành công</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="user"
                                            data-lucide="user" class="lucide lucide-user report-box__icon text-success">
                                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $getadmin }}</div>
                                    <div class="text-base text-slate-500 mt-1">Nhân viên</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="credit-card"
                                            data-lucide="credit-card"
                                            class="lucide lucide-credit-card report-box__icon text-warning">
                                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2">
                                            </rect>
                                            <line x1="8" y1="21" x2="16" y2="21"></line>
                                            <line x1="12" y1="17" x2="12" y2="21"></line>
                                        </svg>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $getservice }}</div>
                                    <div class="text-base text-slate-500 mt-1">Dịch vụ</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="credit-card"
                                            data-lucide="users"
                                            class="lucide lucide-credit-card report-box__icon text-pending">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2">
                                            </rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $getuser }}</div>
                                    <div class="text-base text-slate-500 mt-1">Khách hàng</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                <!-- BEGIN: Sales Report -->
                <div class="col-span-12 lg:col-span-6 mt-8">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Thông kê doanh thu
                        </h2>
                    </div>
                    <div class="intro-y box p-5 mt-12 sm:mt-5">
                        <div class="mb-3 ml-3">
                            <div class="flex">
                                <div>
                                    <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
                                        {{ number_format($revenue) }} VND
                                    </div>
                                    <div class="mt-0.5 text-slate-500">Tháng này</div>
                                </div>
                                <div
                                    class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                                </div>
                                <div>
                                    <div class="text-slate-500 text-lg xl:text-xl font-medium">
                                        {{ number_format($lastMonthrevenue) }} VND</div>
                                    <div class="mt-0.5 text-slate-500">Tháng trước</div>
                                </div>
                            </div>
                            {{-- <form id="filterRevenueform" method="POST">
                                @csrf
                                <div class="flex justify-end mt-3">
                                    <select name="month" id="month" class="tom-select w-full tomselected mx-3">
                                        <option value="0" selected="true" class="w-96">Chọn tháng</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">Tháng {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="year" id="year" class="tom-select w-full tomselected mx-3">
                                        <option value="0" selected="true" class="w-96">Chọn năm</option>
                                        @for ($year = 1990; $year <= 2030; $year++)
                                            <option value="{{ $year }}">Năm {{ $year }}</option>
                                        @endfor
                                    </select>
                                    <button type="button" id="saveFilterRevenue" class="btn btn-secondary mr-1 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" icon-name="filter"
                                            data-lucide="filter" class="lucide lucide-filter block mx-auto">
                                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3">
                                            </polygon>
                                        </svg>
                                    </button>
                                </div>
                            </form> --}}
                        </div>
                        <div class="report-chart">
                            <div class="h-[275px]">
                                <canvas id="report-line-chart" data-filter-data="{{ json_encode($totalRevenue) }}"
                                    class="mt-6 -mb-6" width="486" height="343"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Sales Report -->
                <!-- BEGIN: Weekly Top Seller -->
                <div class="col-span-12 sm:col-span-6 lg:col-span-6 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Thống kê dịch vụ sử dụng
                        </h2>

                    </div>
                    <div class="intro-y box p-5 mt-5">
                        {{-- <form id="topservice" method="POST">
                            @csrf
                            <div class="flex justify-end">
                                <select name="month" id="month" class="tom-select w-full tomselected mx-3">
                                    <option value="0" selected="true" class="w-96">Chọn tháng</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">Tháng {{ $i }}</option>
                                    @endfor
                                </select>
                                <select name="year" id="year" class="tom-select w-full tomselected mx-3">
                                    <option value="0" selected="true" class="w-96">Chọn năm</option>
                                    @for ($year = 1990; $year <= 2030; $year++)
                                        <option value="{{ $year }}">Năm {{ $year }}</option>
                                    @endfor
                                </select>
                                <button type="button" id="saveservice" class="btn btn-secondary mr-1 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="filter"
                                        data-lucide="filter" class="lucide lucide-filter block mx-auto">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg>
                                </button>
                            </div>
                        </form> --}}
                        <div class="mt-3">
                            <div class="h-[213px]">
                                <canvas id="report-pie-chart" width="203" height="266"
                                    data-topservice-data="{{ json_encode($topservice) }}"
                                    style="display: block; box-sizing: border-box; height: 212.8px; width: 162.4px;"></canvas>
                            </div>
                        </div>
                        <div class="w-52 sm:w-auto mx-auto mt-8" id="your-chart-container">
                            {{-- //sử dụng js để in // --}}
                        </div>

                    </div>
                </div>
                <!-- END: Weekly Top Seller -->
                <!-- BEGIN: Official Store -->
                <div class="col-span-12 xl:col-span-8 mt-6">
                    <div class="col-span-12 lg:col-span-6">
                        <!-- BEGIN: Vertical Bar Chart -->
                        <h2 class="text-lg font-medium truncate mr-5">
                            Thống kê lịch đặt
                        </h2>
                        <div class="intro-y box p-5 mt-12 sm:mt-5">
                            {{-- <div class="">
                                <form id="filterForm" method="POST">
                                    @csrf
                                    <div class="flex justify-end">
                                        <select name="month" id="month" class="tom-select w-full tomselected mx-3">
                                            <option value="0" selected="true" class="w-96">Chọn tháng</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}">Tháng {{ $i }}</option>
                                            @endfor
                                        </select>
                                        <select name="year" id="year" class="tom-select w-full tomselected mx-3">
                                            <option value="0" selected="true" class="w-96">Chọn năm</option>
                                            @for ($year = 1990; $year <= 2030; $year++)
                                                <option value="{{ $year }}">Năm {{ $year }}</option>
                                            @endfor
                                        </select>
                                        <button type="button" id="saveFilter" class="btn btn-secondary mr-1 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                icon-name="filter" data-lucide="filter"
                                                class="lucide lucide-filter block mx-auto">
                                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div> --}}
                            <div id="vertical-bar-chart" class="p-5">
                                <div class="preview">
                                    <div class="h-[400px]">
                                        <canvas id="vertical-bar-chart-widget"
                                            data-filtered-data="{{ json_encode($data) }}">
                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Vertical Bar Chart -->
                    </div>
                </div>
                <!-- END: Official Store -->
                <!-- BEGIN: Weekly Best Sellers -->
                <div class="col-span-12 xl:col-span-4 mt-6">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Top 5 nhân viên
                        </h2>
                    </div>
                    <div class="mt-2">
                        {{-- <form id="filterTopEmployee" method="POST">
                            @csrf
                            <div class="flex justify-end">
                                <select name="month" id="month" class="tom-select w-96 tomselected mx-3"
                                    style="width: 150px">
                                    <option value="0" selected="true">Tháng</option>
                                    @for ($m = 1; $m <= 12; $m++)
                                        <option value="{{ $m }}">Tháng {{ $m }}</option>
                                    @endfor
                                </select>
                                <select name="year" id="year" class="tom-select w-96 tomselected mx-3"
                                    style="width: 150px">
                                    <option value="0" selected="true">Năm</option>
                                    @for ($year = 1990; $year <= 2030; $year++)
                                        <option value="{{ $year }}">Năm {{ $year }}</option>
                                    @endfor
                                </select>
                                <button type="button" id="saveFilterTopEmployee" class="btn btn-secondary mr-1 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" icon-name="filter"
                                        data-lucide="filter" class="lucide lucide-filter block mx-auto">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg>
                                </button>
                            </div>
                        </form> --}}
                        <div id="topEmployeesContent">
                            @foreach ($topEmployeesData as $employee)
                                <div class="intro-y">
                                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                            <img alt="Employee Avatar"
                                                src="{{ asset($employee['avatar'] ?? 'default.jpg') }}">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">{{ $employee['username'] }}</div>
                                            <div class="text-slate-500 text-xs mt-0.5">
                                                @if ($employee['avgRating'] > 0)
                                                    Đánh giá: {{ number_format($employee['avgRating'], 1) }} &#9733
                                                @else
                                                    Chưa có đánh giá
                                                @endif
                                            </div>
                                        </div>
                                        <div
                                            class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">
                                            {{ $employee['totalBookings'] }} Đơn đặt
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- END: Weekly Best Sellers -->
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Top 5 khách hàng đặt lịch nhiều nhất
                        </h2>
                    </div>
                    <form id="filterBookerForm" method="POST">
                        @csrf
                        <div class="flex justify-end">
                            <select name="month" id="month" class="tom-select w-96 tomselected mx-3"
                                style="width: 150px">
                                <option value="0" selected="true">Chọn tháng</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">Tháng {{ $i }}</option>
                                @endfor
                            </select>
                            <select name="year" id="year" class="tom-select w-96 tomselected mx-3"
                                style="width: 150px">
                                <option value="0" selected="true">Chọn năm</option>
                                @for ($year = 1990; $year <= 2030; $year++)
                                    <option value="{{ $year }}">Năm {{ $year }}</option>
                                @endfor
                            </select>
                            <button type="button" id="saveFilterBooker" class="btn btn-secondary mr-1 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="filter"
                                    data-lucide="filter" class="lucide lucide-filter block mx-auto">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0" id="listBooker">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">#</th>
                                    <th class="whitespace-nowrap">Ảnh</th>
                                    <th class="text-center whitespace-nowrap">Tên khách hàng</th>
                                    <th class="text-center whitespace-nowrap">Lượt đặt</th>
                                    <th class="text-center whitespace-nowrap">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 1 @endphp
                                @foreach ($topBooker as $booker)
                                    <tr class="intro-x">
                                        <td>{{ $count++ }}</td>
                                        <td class="w-40">
                                            <div class="text-center flex">
                                                <div class="w-16 h-16 image-fit zoom-in">
                                                    <img alt="ảnh" class="tooltip rounded-full"
                                                        src="{{ asset($booker->avatar ?? 'default.jpg') }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center whitespace-nowrap">
                                            <a href="#"
                                                class="text-center font-medium whitespace-nowrap">{{ $booker->name }}</a>
                                        </td>
                                        <td class=" text-center">{{ $booker->totalBookings }}</td>
                                        <td class="text-center">{{ number_format($booker->totalPrice) }} vnd</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>
    </div>
@endsection
