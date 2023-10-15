@extends('admin.templates.app')
@section ('title','Nhân viên')
@section('content')
<h2 class="intro-y text-lg font-medium mt-10">
    Danh sách
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Nhân viên
            {{$employee->username}}:
        </h2>
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
                    <div class="mt-3 flex w-40 mx-auto">
                        <div class="w-20 bg-success text-white text-center border-0 py-2">Trống lịch</div>
                        <div class="w-20 bg-danger text-white text-center border-0 py-2">Đã được đặt</div>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">Ngày làm việc</th>
                        <th colspan="888" class="text-center whitespace-nowrap">Các khoảng thời gian làm việc</th>
                    </tr>
                </thead>
                <tbody id="dataContainer">
                    @foreach($workSchedules as $item)
                    <tr class="intro-x">
                        <td class="text-center" style="border-right: 1px solid white">{{$item->day}}</td>
                        <td class="flex flex-wrap">
                            @foreach ($item->times as $time)
                            @php
                            $cellColorClass = 'text-success';
                            $bookingInfo = '';
                            $serviceNames = [];
                            foreach ($bookings as $booking) {
                            if ($time->time == $booking->time && $item->day == $booking->day) {
                            $cellColorClass = 'text-danger';
                            $bookingInfo = $booking->name;
                            $serviceNames[] = $booking->service_name;
                            }
                            }
                            @endphp

                            <div class="py-2 px-4 border border-white whitespace-normal {{ $cellColorClass }}" onclick="openPopup('{{$time->time}}', '{{$item->day}}', '{{$employee->id}}', '{{$bookingInfo}}', '{{ json_encode($serviceNames) }}')">
                                <button class="open-modal">{{$time->time}}</button>
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
<div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto modal-content hidden-modal w-80 max-w-screen-sm">
    <div class="w-full max-w-md p-6  rounded shadow-lg">
        <div class="modal-header flex justify-end items-end bg-gray-100 py-2 px-4 rounded-t">
            <button class="text-gray-500 hover:text-gray-700 transform scale-110 close-modal">
                &times;
            </button>
        </div>
        <div class="modal-body mt-4 p-4 text-center">

            <table class="text-center table">
                <thead>
                    <tr>
                        <td>
                            <h3 class="text-xl font-semibold">Nhân viên: {{$employee->username}}</h3>
                        </td>
                    </tr>
                </thead>
                <tbody class="text-center whitespace-normal" id="bookingInfo">
                    <tr>
                        <td>
                            <p class="mb-2" id="bookingContent2"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="mb-2" id="bookingContent1"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="mb-2" id="bookingContent3"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="mb-2" id="bookingContent4"></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="fixed inset-0 z-40 bg-black opacity-100 blur-bg hidden-blur" id="blurOverlay"></div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modal = document.querySelector('.modal-content');
        var blurBackground = document.querySelector('.blur-bg');
        var blurOverlay = document.querySelector('#blurOverlay');

        modal.style.display = 'none';
        blurBackground.style.display = 'none';
        blurOverlay.style.display = 'none';

        var openModalButtons = document.querySelectorAll('.open-modal');
        var closeModalButtons = document.querySelectorAll('.close-modal');

        openModalButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                modal.style.display = 'block';
                blurBackground.style.display = 'block';
                blurOverlay.style.display = 'block';
            });
        });

        closeModalButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                modal.style.display = 'none';
                blurBackground.style.display = 'none';
                blurOverlay.style.display = 'none';
            });
        });

        // Sự kiện khi click vào overlay để tắt modal
        blurOverlay.addEventListener('click', function() {
            modal.style.display = 'none';
            blurBackground.style.display = 'none';
            blurOverlay.style.display = 'none';
        });
    });

    function openPopup(time, day, employeeId, bookingInfo, serviceName) {
        var modal = document.querySelector('.modal-content');
        var blurBackground = document.querySelector('.blur-bg');
        var blurOverlay = document.querySelector('#blurOverlay');
        var bookingContent1 = document.getElementById('bookingContent1');
        var bookingContent2 = document.getElementById('bookingContent2');
        var bookingContent3 = document.getElementById('bookingContent3');
        var bookingContent4 = document.getElementById('bookingContent4');

        if (bookingInfo) {
            bookingContent1.textContent = 'Thời gian: ' + time;
            bookingContent2.textContent = 'Ngày: ' + day;
            bookingContent3.textContent = 'Khách hàng: ' + bookingInfo;
            if (serviceName) {
                bookingContent4.textContent = 'Dịch vụ: ' + serviceName.slice(1, -1);
            } else {
                bookingContent4.textContent = 'Dịch vụ: Không có dịch vụ';
            }
        } else {
            bookingContent1.textContent = 'Thời gian: ' + time;
            bookingContent2.textContent = 'Ngày: ' + day;
            bookingContent3.textContent = 'Chưa có khách hàng đặt lịch';
            bookingContent4.textContent = ''; // Ẩn thông tin dịch vụ khi không có khách hàng
        }

        modal.style.display = 'block';
        blurBackground.style.display = 'block';
        blurOverlay.style.display = 'block';
    }
</script>

@endsection