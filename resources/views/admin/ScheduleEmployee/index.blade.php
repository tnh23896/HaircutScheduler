@extends('admin.templates.app')
@section ('title','Nhân viên')
@section('content')
<!-- END: Top Bar -->
<h2 class="intro-y text-lg font-medium mt-10">
    Danh sách
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">

    <!-- BEGIN: Data List -->
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
                <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white mr-2">Lịch làm việc:
                </h3>
            </div>
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">Ngày làm việc</th>
                    <th colspan="888" class="text-center whitespace-nowrap">Các khoảng thời gian làm
                        việc</th>
                </tr>
            </thead>
            <tbody id="dataContainer">
                @foreach($workSchedules as $item)
                <tr class="intro-x">
                    <td class="text-center" style="border-right: 1px solid white">{{$item->day}}</td>
                    <td class="flex flex-wrap">
                        @foreach($item->times as $time)
                        <div class="w-1/3 text-center py-2 px-4 border border-white whitespace-normal">
                            {{$time->time}}
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
        <div class="mt-5">
        <table class="table table-report -mt-2">
            <div class="text-center">
                <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white mr-2">Lịch khách hàng đặt
                </h3>
            </div>
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">Ngày</th>
                    <th colspan="888" class="text-center whitespace-nowrap">Thời gian</th>
                </tr>
            </thead>
            <tbody id="dataContainer">
                @foreach($bookings as $item)
                <tr class="intro-x">
                    <td class="text-center" style="border-right: 1px solid white">{{$item->day}}</td>
                    <td class="flex flex-wrap">
                        @foreach($item->times as $time)
                        <div class="w-1/3 text-center py-2 px-4 border border-white whitespace-normal">
                            {{$time->time}}
                        </div>
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav class="w-full sm:w-auto sm:mr-auto">
            {{ $bookings->links('pagination::bootstrap-4') }}
        </nav>
        </div>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <nav class="w-full sm:w-auto sm:mr-auto">
        </nav>
        <select class="w-20 form-select box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
</div>
@endsection