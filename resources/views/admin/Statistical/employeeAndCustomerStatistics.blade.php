@extends('admin.templates.app')
@section('title', 'Thống kê nhân viên và khách hàng')
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xl:col-span-8 mt-6">
            <div class="col-span-12 lg:col-span-6">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Top 5 khách hàng đặt lịch nhiều nhất năm
                    </h2>
                </div>
                <form id="filterBookerForm" method="POST">
                    @csrf
                    <div class="flex justify-end">
                        <select name="year" id="year" class="tom-select w-96 tomselected mx-3" style="width: 150px">
                            <option value="0" selected="true">Chọn năm</option>
                            @for ($year = 1990; $year <= 2030; $year++)
                                <option value="{{ $year }}">Năm {{ $year }}</option>
                            @endfor
                        </select>
                        <button type="button" id="saveFilterBooker" class="btn btn-secondary mr-1 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="filter" data-lucide="filter"
                                class="lucide lucide-filter block mx-auto">
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
                                            <div class="w-16 h-16 image-fit">
                                                <img alt="ảnh" class="rounded-full"
                                                    src="{{$booker->avatar === 'default.jpg' ? asset('dist/images/default.jpg') : asset($booker->avatar) }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center whitespace-nowrap">
                                        <a href="#"
                                            class="text-center font-medium whitespace-nowrap">{{ $booker->name }}</a>
                                    </td>
                                    <td class=" text-center">{{ $booker->totalBookings }}</td>
                                    <td class="text-center">{{ number_format($booker->totalPrice) }} VND</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-span-12 xl:col-span-4 mt-6">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Top 5 nhân viên xuất sắc nhất năm
                </h2>
            </div>
            <div>
                <form id="filterTopEmployee" style="margin-bottom:73px" method="POST">
                    @csrf
                    <div class="flex justify-end">
                        <select name="year" id="year" class="tom-select w-96 tomselected mx-3"
                            style="width:8rem">
                            <option value="0" selected="true">Chọn Năm</option>
                            @for ($year = 1990; $year <= 2030; $year++)
                                <option value="{{ $year }}">Năm {{ $year }}</option>
                            @endfor
                        </select>
                        <button type="button" id="saveFilterTopEmployee" class="btn btn-secondary mr-1 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="filter" data-lucide="filter"
                                class="lucide lucide-filter block mx-auto">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg>
                        </button>
                    </div>
                </form>
                <div id="topEmployeesContent">
                    @foreach ($topEmployeesData as $employee)
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                {{-- Display employee information --}}
                                <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                    <img alt="Employee Avatar"
                                        src="{{$employee['avatar'] === '' ? asset('dist/images/default.jpg') : asset($employee['avatar']) }}">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">{{ $employee['username'] }}</div>
                                    <div class="text-slate-500 text-xs mt-0.5">
                                        @if ($employee['avgRating'] > 0)
                                            Đánh giá: {{ number_format($employee['avgRating'], 1) }} &#9733
                                        @else
                                            Đánh giá: 0.0 &#9733
                                        @endif
                                    </div>
                                </div>
                                <div
                                    class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">
                                    {{ $employee['totalBookings'] }} lịch thành công
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function formatCurrency(amount) {
            const formattedAmount = amount.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND',
                minimumFractionDigits: 0,
            });

            const currencySymbol = "VND";
            const replacedSymbol = formattedAmount.replace(/\./g, ',').replace("₫", currencySymbol);

            return replacedSymbol;
        }

        $(function() {
            $('#saveFilterBooker').on('click', function() {
                var formData = new FormData($('#filterBookerForm')[0]);
                var url = "{{ route('admin.topBooker') }}";

                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        $('#listbooker').html('');

                        var bookerArray = Object.values(response.bookerData);

                        if (bookerArray.length > 0) {
                            var bookerItemHtml = `
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
                                            ${bookerArray.map((booker, index) => `
                                                                            <tr class="intro-x">
                                                                                <td>${index + 1}</td>
                                                                                <td class="w-40">
                                                                                    <div class="text-center flex">
                                                                                        <div class="w-16 h-16 image-fit zoom-in">
                                                                                            <img alt="ảnh" class="tooltip rounded-full" src="{{ asset('${booker.avatar}') }}">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center whitespace-nowrap">
                                                                                    <a href="#" class="text-center font-medium whitespace-nowrap">${booker.name}</a>
                                                                                </td>
                                                                                <td class=" text-center">${booker.totalBookings}</td>
                                                                                <td class="text-center">${ formatCurrency(booker.totalPrice)}</td>
                                                                            </tr> `).join('')}
                                        </tbody>
                                    </table>`;
                            $('#listBooker').html(bookerItemHtml);
                        } else {
                            $('#listBooker').html('<p>Không có dữ liệu.</p>');
                        }
                    },
                    function(error) {
                        alert('Error')
                    }
                );
            });
        });

        $(function() {
            $('#saveFilterTopEmployee').on('click', function() {
                var formData = new FormData($('#filterTopEmployee')[0]);
                var url = "{{ route('admin.topEmployees') }}";

                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        console.log(response);
                        var employeesArray = Object.values(response.topEmployeesData);
                        var employeeItemHtml = '';

                        if (employeesArray.length > 0) {
                            employeeItemHtml = employeesArray.map((employee, index) => `
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                    <img alt="Employee Avatar" src="{{ asset('${employee.avatar}') }}">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">${employee.username}</div>
                                    <div class="text-slate-500 text-xs mt-0.5">
                                        ${formatRating(employee.avgRating)}
                                    </div>
                                </div>
                                <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">
                                    ${employee.totalBookings} lịch đặt thành công
                                </div>
                            </div>
                        </div>`).join('');
                        } else {
                            employeeItemHtml = '<p>Không có dữ liệu.</p>';
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
