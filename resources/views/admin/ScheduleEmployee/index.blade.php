@extends('admin.templates.app')
@section('title', 'Nhân viên')
@section('content')
    <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body p-10">
                    <h3 class="text-xl font-semibold text-center">Chi tiết lịch làm việc</h3>
                    <h3 class="text-xl font-semibold">Nhân viên: {{ $employee->username }}</h3>
                    <div class="whitespace-normal" id="bookingInfo">
                        <table class="table text-left">
                            <tr>
                                <td>Ngày: </td>
                                <td id="bookingContent2"></td>
                            </tr>
                            <tr>
                                <td>Thời gian: </td>
                                <td id="bookingContent1"></td>
                            </tr>
                            <tr id="customer">
                                <td>Khách hàng: </td>
                                <td id="bookingContent3"></td>
                            </tr>
                            <tr id="service">
                                <td>Dịch vụ: </td>
                                <td id="bookingContent4"></td>
                            </tr>
                            <tr>
                                <td>Trạng thái: </td>
                                <td id="bookingContentStatus"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="superlarge-modal-size-preview1" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body p-10">
                    <div class="intro-y box p-5">
                        <h2 class="font-medium text-base mb-5">Đăng ký lịch làm việc </h2>
                        <button id="toggleFormButton" class="btn btn-primary mb-2">Đăng ký theo tuần</button>
                        <div id="formDate" class="schedule-form">
                            <form action="{{ route('admin.ScheduleEmployee.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="formType" value="date">

                                <!-- Các trường cho đăng ký theo ngày -->
                                <label for="date">Chọn ngày:</label>
                                <input type="date" class=" form-control form-control-lg" name="date" style="border-color: #312E81"
                                    required>

                                <!-- Chọn thời gian -->
                                <div id="timeSlots" class="grid grid-cols-3 gap-4" style="margin-top: 15px">
                                    @foreach ($shifts as $slot)
                                        <div>
                                            <input type="checkbox" class="form-check-input w-6 h-6 mr-1" name="timeSlots[]" value="{{ $slot->id }}"  style="border-color: #312E81"
                                                id="timeSlot{{ $slot->id }}">
                                            <label for="timeSlot{{ $slot->id }}">{{ $slot->name }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Nút submit -->
                                <button type="submit" class="btn btn-primary mt-5">Đăng ký</button>
                            </form>
                        </div>
                        <!-- Form đăng ký theo tuần -->
                        <div id="formWeek" class="schedule-form" style="display:none;">
                            <form action="{{ route('admin.ScheduleEmployee.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="formType" value="week">

                                <!-- Các trường cho đăng ký theo tuần -->
                                <label for="week">Chọn tuần:</label>
                                <input type="week" class="form-control form-control-lg my-2" name="week"  style="border-color: #312E81"
                                    required>

                                <!-- Chọn thời gian -->
                                <div id="timeSlots" class="grid grid-cols-3 gap-4" style="margin-top: 15px">
                                    @foreach ($shifts as $slot)
                                        <div>
                                            <input type="checkbox" class="form-check-input w-6 h-6 mr-1" name="timeSlots[]" value="{{ $slot->id }}"  style="border-color: #312E81"
                                                id="timeSlot{{ $slot->id }}">
                                            <label for="timeSlot{{ $slot->id }}">{{ $slot->name }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Nút submit -->
                                <button type="submit" class="btn btn-primary mt-5">Đăng ký</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white mr-2">Chú thích</h3>
        <span class="btn btn-rounded-success w-32 mr-1 mb-2 text-white">Trống lịch</span>
        <span class="btn btn-rounded-danger w-32 mr-1 mb-2 text-white">Đã được đặt</span>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5 lg:mt-0">
                <div class="content-center p-5 flex flex-col items-center">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                        <img alt="{{ $employee->username }}" class="rounded-full"
                            src="{{ $employee->avatar ? asset($employee->avatar) : asset('dist/images/default.jpg') }}">
                    </div>
                    <div class="text-center">
                        <div class="sm:w-40 truncate sm:whitespace-normal font-medium text-lg">
                            {{ $employee->username }}</div>
                    </div>
                </div>
                <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="font-medium text-center lg:text-left lg:mt-3">Liên hệ</div>
                    <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                        <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail"
                                class="w-4 h-4 mr-2"></i>{{ $employee->email }}</div>
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="phone"
                                class="w-4 h-4 mr-2"></i>{{ $employee->phone }}</div>
                    </div>
                </div>
                <div class="py-2 px-4 border border-white whitespace-normal">
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview1"
                        class="btn btn-primary">Đăng kí lịch làm việc</a>
                </div>
            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y box col-span-12 2xl:col-span-12">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Lịch làm việc
                        </h2>
                        <form action="{{ route('admin.ScheduleEmployee.search') }}" method="post">
                            @csrf
                            <div class="w-full relative text-slate-500 flex items-center">
                                <input type="date" name="search" class="form-control w-40 sm:w-auto box pr-10"
                                    value="{{ request('search') }}" style="border-color: #312E81">
                                <button type="submit">
                                    <i class="w-5 h-5 absolute my-auto inset-y-0 mr-3 right-0 top-0"
                                        data-lucide="search"></i>
                                </button>
                            </div>
                        </form>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"
                                data-tw-toggle="dropdown"> <i data-lucide="more-horizontal"
                                    class="w-5 h-5 text-slate-500"></i> </a>
                        </div>
                    </div>
                    <div class="p-5">
                        <table class="table table-report -mt-2">
                            <thead>
                                <th class="text-center whitespace-nowrap">Ngày làm việc</th>
                                <th colspan="888" class="text-center whitespace-nowrap">Các khoảng thời gian làm việc
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($workSchedules as $item)
                                    @php
                                        $createdAt = \Carbon\Carbon::parse($item->created_at);
                                        $timeDifference = now()->diffInHours($createdAt);
                                        $showEditButton = $timeDifference < 24;
                                    @endphp
                                    <tr class="intro-x">
                                        <td class="text-center" style="border-right: 1px solid #1E293B">{{ \Carbon\Carbon::parse($item->day)->format('d-m-Y')}}
                                        </td>
                                        <td class="flex flex-wrap">
                                            @foreach ($item->times as $time)
                                                @php
                                                    $bookingInfo = '';
                                                    $serviceNames = [];
                                                    $statusText = 'Chưa có khách hàng đặt lịch';
                                                    foreach ($bookings as $booking) {
                                                        if ($time->time == $booking->time && $item->day == $booking->day) {
                                                            if ($booking->status === 'confirmed') {
                                                                $bookingInfo = $booking->name;
                                                                $serviceNames[] = $booking->service_name;
                                                                $statusText = 'Đã xác nhận';
                                                            } elseif ($booking->status === 'waiting') {
                                                                $bookingInfo = $booking->name;
                                                                $serviceNames[] = $booking->service_name;
                                                                $statusText = 'Đang cắt';
                                                            } elseif ($booking->status === 'success') {
                                                                $bookingInfo = $booking->name;
                                                                $serviceNames[] = $booking->service_name;
                                                                $statusText = 'Đã hoàn thành';
                                                            }elseif ($booking->status === 'pending') {
                                                                $bookingInfo = $booking->name;
                                                                $serviceNames[] = $booking->service_name;
                                                                $statusText = 'Chờ xác nhận';
                                                            }

                                                        }
                                                    }
                                                @endphp
                                                <div class="py-2 px-4 border border-green-700 whitespace-normal {{ $time->pivot->status == 'available' ? 'text-success' : 'text-danger' }}">
                                                    <a href="javascript:;" data-tw-toggle="modal"  onclick="openPopup('{{ \Carbon\Carbon::parse($time->time)->format('H:i') }}', '{{ \Carbon\Carbon::parse($item->day)->format('d-m-Y') }}', '{{ $employee->id }}', '{{ $bookingInfo }}', '{{ json_encode($serviceNames) }}', '{{ $statusText }}')"
                                                        data-tw-target="#superlarge-modal-size-preview">{{ \Carbon\Carbon::parse($time->time)->format('H:i') }}</a>
                                                </div>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <div class="flex justify-center items-center gap-2">
                                                <div class="flex justify-center items-center">
                                                    @if ($showEditButton)
                                                        <a href="javascript:;" data-tw-toggle="modal"
                                                            data-tw-target="#modal{{ $item->id }}"
                                                            class="flex items-center cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="lucide lucide-check-square">
                                                                <polyline points="9 11 12 14 22 4" />
                                                                <path
                                                                    d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
                                                            </svg>
                                                            Sửa
                                                        </a>
                                                    @else
                                                        <a href="javascript:;" style="display: none"
                                                            data-tw-toggle="modal"
                                                            data-tw-target="#modal{{ $item->id }}"
                                                            class="flex items-center cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="lucide lucide-check-square">
                                                                <polyline points="9 11 12 14 22 4" />
                                                                <path
                                                                    d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
                                                            </svg>
                                                            Sửa
                                                        </a>
                                                    @endif
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav class="w-full sm:w-auto sm:mr-auto">
                            {{ $workSchedules->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($workSchedules as $item)
        @include('admin.ScheduleEmployee.edit')
    @endforeach
    <script>
        var toggleFormButton = document.getElementById('toggleFormButton');
        var formDate = document.getElementById('formDate');
        var formWeek = document.getElementById('formWeek');

        toggleFormButton.addEventListener('click', function() {
            if (formDate.style.display === 'none') {
                formDate.style.display = 'block';
                formWeek.style.display = 'none';
                toggleFormButton.innerText = 'Đăng ký theo tuần';
            } else {
                formDate.style.display = 'none';
                formWeek.style.display = 'block';
                toggleFormButton.innerText = 'Đăng ký theo ngày';
            }
        });

        function openPopup(time, day, employeeId, bookingInfo, serviceName, statusText) {
            const bookingContent1 = $('#bookingContent1');
            const bookingContent2 = $('#bookingContent2');
            const bookingContent3 = $('#bookingContent3');
            const bookingContent4 = $('#bookingContent4');
            const bookingContentStatus = $('#bookingContentStatus');
            const customer = $('#customer');
            const service = $('#service');

            bookingContentStatus.text(statusText);

            if (bookingInfo) {
                bookingContent1.text(time);
                bookingContent2.text(day);
                bookingContent3.text(bookingInfo);
                customer.removeAttr('style');
                if (serviceName) {
                    const serviceNames = JSON.parse(serviceName);
                    const formattedServiceNames = serviceNames.join('<br>');
                    bookingContent4.html(formattedServiceNames);
                    service.removeAttr('style');
                } else {
                    bookingContent4.text('Không có dịch vụ');
                    service.show();
                }

            } else {
                bookingContent1.text(time);
                bookingContent2.text(day);
                customer.hide();
                service.hide();
            }
        }
    </script>
@endsection
