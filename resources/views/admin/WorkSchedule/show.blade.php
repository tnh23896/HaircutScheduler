@extends('admin.templates.app')
@section('title', 'Chi tiết lịch làm việc của nhân viên')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Thông tin chi tiết
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.work-schedule.index', ['id' => $workSchedule->admin->id ?? '']) }}"
                class="btn btn-primary shadow-md mr-2">Trở về</a>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible text-center">
            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Nhân viên
                {{ $workSchedule->admin->username ?? '' }}</h2>
            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                <li>
                    <img src="{{ $workSchedule->admin->avatar ?? '' }}" class="w-40 h-40 mx-auto rounded-full" alt="">
                </li>
                <li class="text-lg">
                    Email: {{ $workSchedule->admin->email ?? '' }}
                </li>
                <li class="text-lg">
                    Số điện thoại: {{ $workSchedule->admin->phone ?? '' }}
                </li>
                <li class="text-lg">
                    Mô tả: {{ $workSchedule->admin->description ?? '' }}
                </li>
                <li class="text-lg">
                    Trạng thái: {{ $workScheduleDetail->status == 'available' ? 'Đang rảnh' : 'Đã có khách đặt' }}
                </li>
                <li class="text-lg">
                    Ngày làm việc: {{ $workSchedule->day }}
                </li>
                <li class="text-lg">
                    Thời gian làm việc: {{ $time->time }}
                </li>
            </ul>
        </div>
        <!-- END: Data List -->
    </div>
@endsection
