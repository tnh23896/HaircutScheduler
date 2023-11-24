@extends('admin.templates.app')
@section('title', 'Bảng điều khiển')
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
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

                <div class="col-span-12 xl:col-span-12 mt-6">
                    <div class="col-span-12 lg:col-span-12">
                        <div class="intro-y h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Thống kê doanh thu
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-12 sm:mt-5">
                            <div id="vertical-bar-chart" class="p-5">
                                <div class="preview">
                                    <div class="h-[400px]">
                                        <canvas id="vertical-widget"
                                            data-fil-data="{{ json_encode($totalRevenue) }}">
                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-8 mt-8">
                    <div class="intro-y h-10 mb-5" style="display: flex;justify-content: space-between">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Thống kê nhân viên
                        </h2>
                        <form id="filterTopEmployee" method="POST">
                            @csrf
                            <div class="flex">
                                <select name="day" id="day" class="tom-select w-32 tomselected mx-3">
                                    <option value="0" selected="true" class="w-24">Chọn ngày</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}">Ngày {{ $i }}</option>
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
                        </form>
                    </div>
                    <div class="mt-2">
                        <div id="topEmployeesContent">
                            @if (!empty($topEmployeesData))
                                @foreach ($topEmployeesData as $employee)
                                    <div class="">
                                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                                <img alt="Employee Avatar"
                                                    src="{{ asset($employee['avatar'] ?? 'default.jpg') }}">
                                            </div>
                                            <div class="ml-4 mr-auto">
                                                <div class="font-medium text-lg">{{ $employee['username'] }}</div>
                                                <div class="text-slate-500 text-sm mt-0.5">
                                                    @if ($employee['avgRating'] > 0)
                                                        Đánh giá: {{ number_format($employee['avgRating'], 1) }} &#9733
                                                    @else
                                                        Chưa có đánh giá
                                                    @endif
                                                </div>
                                            </div>
                                            <div
                                                class="py-2 mr-2 px-3 rounded-full text-sm bg-success text-white cursor-pointer font-medium">
                                                {{ $employee['totalSuccessfulBookings'] }} lịch đặt thành công
                                            </div>
                                            <div
                                                class="py-2 px-3 rounded-full text-sm bg-danger text-white cursor-pointer font-medium">
                                                {{ $employee['totalCancelledBookings'] }} lịch huỷ
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center text-gray-500">Không có dữ liệu.</div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-4 mt-8">
                    <div class="intro-y h-10" style="display: flex;justify-content: space-between">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Thống kê dịch vụ
                        </h2>
                        <form id="topservice" method="POST">
                            @csrf
                            <div class="flex">
                                <select name="day" id="day" class="tom-select w-32 tomselected mx-3">
                                    <option value="0" selected="true" class="w-24">Chọn ngày</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}">Ngày {{ $i }}</option>
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
                        </form>
                    </div>
                    <div class="intro-y box p-5 mt-5">
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

                <div class="col-span-12 xl:col-span-12 mt-6">
                    <div class="col-span-12 lg:col-span-12">
                        <div class="intro-y h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Thống kê lịch đặt
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-12 sm:mt-5">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#saveFilterTopEmployee').on('click', function() {
                var formData = new FormData($('#filterTopEmployee')[0]);
                var url = "{{ route('admin.topEmployee') }}";

                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        console.log(response);
                        var employeesArray = Object.values(response.topEmployeesData);
                        var employeeItemHtml = '';

                        if (employeesArray.length > 0) {
                            employeeItemHtml = employeesArray.map((employee, index) => `
                        <div class="">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                    <img alt="Employee Avatar" src="${employee.avatar}">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium text-lg">${employee.username}</div>
                                    <div class="text-slate-500 text-sm mt-0.5">
                                        ${formatRating(employee.avgRating)}
                                    </div>
                                </div>
                                <div class="py-2 px-3 mr-2 rounded-full text-sm bg-success text-white cursor-pointer font-medium">
                                    ${employee.totalSuccessfulBookings} lịch đặt thành công
                                </div>
                                <div class="py-2 px-3 rounded-full text-sm bg-danger text-white cursor-pointer font-medium">
                                    ${employee.totalCancelledBookings} lịch huỷ
                                </div>
                            </div>
                        </div>`).join('');
                        } else {
                            employeeItemHtml = '<p class ="text-center text-gray-500">Không có dữ liệu.</p>';
                        }

                        $('#topEmployeesContent').html(employeeItemHtml);
                    },
                    function(error) {
                        alert('Error');
                    }
                );
            });
            // Định dạng đánh giá
            function formatRating(avgRating) {
                return avgRating !== null && avgRating !== undefined ?
                    `Đánh giá: ${parseFloat(avgRating).toFixed(1)} &#9733` : 'Chưa có đánh giá';
            }
        });
    </script>
@endsection
