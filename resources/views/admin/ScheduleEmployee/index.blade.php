@extends('admin.templates.app')
@section ('title','Nhân viên')
@section('content')
<h2 class="intro-y text-lg font-medium mt-10">
    Danh sách
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Nhân viên {{$employee->username}}:</h2>
        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
            <li>
                Email: {{$employee->email}}
            </li>
            <li>
                Số điện thoại: {{$employee->phone}}
            </li>
        </ul>
        <div class="mb-5">
            <table class="table table-report -mt-2">
                <div class="text-center">
                    <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white mr-2">Lịch làm việc:</h3>
                </div>
                <div class="text-center">
                    <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white mr-2">Chú thích:</h3>
                    <div class="mt-3 flex md:mx-auto justify-center">
                        <div class="legend-item mx-2 md:mx-0 md:ml-2" style="flex-grow: 1; max-width: 200px; box-sizing: border-box; background-color: #28a745; color: #fff; text-center: border-0; py-2;">Trống lịch</div>
                        <div class="legend-item mx-2 md:mx-0 md:ml-2" style="flex-grow: 1; max-width: 200px; box-sizing: border-box; background-color: #dc3545; color: #fff; text-center: border-0; py-2;">Đã được đặt</div>
                        <div class="legend-item mx-2 md:mx-0 md:ml-2" style="flex-grow: 1; max-width: 200px; box-sizing: border-box; background-color: #ffc107; color: #fff; text-center: border-0; py-2;">Đã hoàn thành</div>
                    </div>
                </div>               
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">Ngày làm việc</th>
                        <th colspan="888" class="text-center whitespace-nowrap">Các khoảng thời gian làm việc</th>
                    </tr>
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
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <nav class="w-full sm:w-auto sm:mr-auto">
        </nav>
    </div>
</div>
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
