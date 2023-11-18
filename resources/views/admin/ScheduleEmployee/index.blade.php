@extends('admin.templates.app')
@section ('title','Nhân viên')
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
<div class="text-center">
    <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white mr-2">Chú thích</h3>
    <span class="btn btn-rounded-success w-24 mr-1 mb-2">Trống lịch</span>
    <span class="btn btn-rounded-warning w-32 mr-1 mb-2">Đã hoàn thành</span>
    <span class="btn btn-rounded-danger w-32 mr-1 mb-2">Đã được đặt</span>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-5 lg:mt-0">
            <div class="relative flex items-center p-5">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="{{$employee->username}}" class="rounded-full" src="{{asset($employee->avatar)}}">
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{$employee->username}}</div>
                    {{-- <div class="text-slate-500">Backend Engineer</div> --}}
                </div>
            </div>
            <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                <div class="font-medium text-center lg:text-left lg:mt-3">Liên hệ</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i>{{$employee->email}}</div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="phone" class="w-4 h-4 mr-2"></i>{{$employee->phone}}</div>
                </div>
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
                    <div class="dropdown ml-auto sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                    </div>
                </div>
                <div class="p-5">
                    <table class="table table-report -mt-2">
                        <thead>
                            <th class="text-center whitespace-nowrap">Ngày làm việc</th>
                            <th colspan="888" class="text-center whitespace-nowrap">Các khoảng thời gian làm việc</th>
                        </thead>
                        <tbody>
                            @foreach($workSchedules as $item)
                            <tr class="intro-x">
                                <td class="text-center" style="border-right: 1px solid white">{{$item->day}}</td>
                                <td class="flex flex-wrap">
                                    @foreach ($item->times as $time)
                                    @php
                                    $cellColorClass = 'text-success';
                                    $bookingInfo = '';
                                    $serviceNames = [];
                                    $statusText = 'Chưa có khách hàng đặt lịch';
                                    foreach ($bookings as $booking) {
                                        if ($time->time == $booking->time && $item->day == $booking->day) {
                                            if ($booking->status === 'confirmed') {
                                                $cellColorClass = 'text-danger';
                                                $bookingInfo = $booking->name;
                                                $serviceNames[] = $booking->service_name;
                                                $statusText = 'Đã xác nhận';
                                            } elseif ($booking->status === 'waiting') {
                                                $cellColorClass = 'text-danger';
                                                $bookingInfo = $booking->name;
                                                $serviceNames[] = $booking->service_name;
                                                $statusText = 'Đang chờ cắt';
                                            } elseif ($booking->status === 'success') {
                                                $cellColorClass = 'text-warning';
                                                $bookingInfo = $booking->name;
                                                $serviceNames[] = $booking->service_name;
                                                $statusText = 'Đã hoàn thành';
                                            }
                                        }
                                    }
                                    @endphp
                                    <div class="py-2 px-4 border border-white whitespace-normal {{ $cellColorClass }}" onclick="openPopup('{{$time->time}}', '{{$item->day}}', '{{$employee->id}}', '{{$bookingInfo}}', '{{ json_encode($serviceNames) }}', '{{$statusText}}')">
                                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview">{{$time->time}}</a>
                                    </div>
                                    @endforeach
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
<script>
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
