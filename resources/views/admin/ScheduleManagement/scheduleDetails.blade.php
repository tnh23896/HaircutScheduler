@extends('admin.templates.app')
@section('title', 'Chi tiết dịch vụ')
@section('css_header_custom')
    <style>
        thead {
            position: sticky;
            top: -1px;
            background-color: white;
            border: 1px solid #dee2e6;
            z-index: 1;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
@section('content')
    <form action="{{ route('admin.scheduleManagement.scheduleDetails.update', $item->id) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="intro-y pl-5 items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Lịch đặt #{{ $item->id }}
            </h2>
        </div>
        <div>
            <!-- BEGIN: Profile Info -->
            <div class="intro-y px-5 pt-5 mt-5">
                <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                    <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="{{ $item->user->avatar === 'default.jpg' ? asset('dist/images/default.jpg') : asset($item->user->avatar) }}">
                        </div>
                        <div class="ml-5">
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ $item->name }}
                            </div>
                            <div class="text-slate-500">{{ $item->phone }}</div>
                        </div>
                    </div>
                    <div
                        class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                        <div class="font-medium text-center lg:text-left lg:mt-3">Nhân viên: {{ $item->admin->username }}
                        </div>
                        <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                            <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="dollar-sign"
                                    class="w-4 h-4 mr-2"></i>
                                @if ($item->payment == 'vnpay' || $item->payment == 'momo')
                                    <h4 class="font-bold text-2sm">Số tiền đã trả: {{ number_format($item->amount_paid) }}
                                        VND</h4>
                                @else
                                    <h4 class="font-bold text-2sm">Số tiền đã trả: 0 </h4>
                                @endif
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="dollar-sign"
                                    class="w-4 h-4 mr-2"></i>
                                <h4 class="font-bold text-2sm">
                                    @if ($item->promotion && $item->promotion->discount !== null)
                                        <h4 class="font-bold text-2sm">Giảm giá:
                                            {{ number_format($item->promotion->discount) }} VND</h4>
                                    @else
                                        <h4 class="font-bold text-2sm">Giảm giá: 0</h4>
                                    @endif
                                </h4>
                            </div>
                            <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="dollar-sign"
                                    class="w-4 h-4 mr-2"></i>
                                @if ($item->payment == 'vnpay' || $item->payment == 'momo')
                                    @if ($item->amount_paid > $sum_price_end)
                                        <h4 class="font-bold text-2sm">Số tiền cửa hàng trả lại:
                                            {{ number_format($item->amount_paid - $sum_price_end) }} VND</h4>
                                    @elseif($item->amount_paid < $sum_price_end)
                                        <h4 class="font-bold text-2sm">Số tiền khách phải trả:
                                            {{ number_format($sum_price_end - $item->amount_paid) }} VND</h4>
                                    @else
                                        <h4 class="font-bold text-2sm">Số tiền phải trả: 0 </h4>
                                    @endif
                                @else
                                    <h4 class="font-bold text-2sm">Số tiền phải trả: {{ number_format($sum_price_end) }}
                                        VND</h4>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div
                        class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                        <div class="text-center rounded-md w-20 py-3">
                            <div class="font-medium text-primary text-xl"></div>
                            <div class="text-slate-500"></div>
                        </div>
                        <div class="text-center rounded-md w-20 py-3">
                            <div class="font-medium text-primary text-xl"></div>
                            <div class="text-slate-500"></div>
                        </div>
                        <div class="text-center rounded-md w-20 py-3">
                            <div class="font-medium text-primary text-xl"></div>
                            <div class="text-slate-500"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
                <tr>
                    <th class="text-xl font-bold text-center" style="border: 1px solid #312E81">ID Dịch vụ</th>
                    <th class="text-xl font-bold text-center" style="border: 1px solid #312E81">Tên dịch vụ</th>
                    <th class="text-xl font-bold text-center" style="border: 1px solid #312E81">Giá dịch vụ</th>
                    <th class="text-xl font-bold text-center" style="border: 1px solid #312E81">Dịch vụ sử dụng</th>
                </tr>
                @foreach ($item->booking_details->sortByDesc('created_at') as $detail)
                    <tr>
                        <td class="text-center" style="border: 1px solid #312E81">{{ $detail->service_id }}</td>
                        <td class="text-center" style="border: 1px solid #312E81">{{ $detail->name }}</td>
                        <td class="text-center" style="border: 1px solid #312E81">{{ number_format($detail->price) }} VND
                        </td>
                        <td class="text-center" style="border: 1px solid #312E81">
                            <input type="checkbox" class="qr-checkbox form-check-input" style="border-color: #312E81"
                                name="status[]" @checked($detail->status == 'success') value="{{ $detail->id }}"
                                @if ($item->status == 'success' || $item->status == 'canceled') disabled @endif>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
        <div class="text-right mt-5">
            <a href="{{ route('admin.scheduleManagement.index') }}" class="btn btn-outline-secondary w-36 mr-1"
                style="border: 1px solid #312E81">Trang danh
                sách</a>
            @if ($item->status == 'pending' || $item->status == 'waiting' || $item->status == 'confirmed')
                <button type="submit" id="saveBtn" class="btn btn-primary w-32 text-white">
                    Lưu thay đổi
                </button>
            @endif
        </div>

    </form>
    @if ($item->status == 'pending' || $item->status == 'waiting' || $item->status == 'confirmed')
        <div class="ml-4 mb-2 mt-2">
            <a data-tw-toggle="modal" data-tw-target="#modal{{ $item->id }}">
                <button class="btn btn-primary w-32">Thêm dịch vụ</button>
            </a>
        </div>
        @include('admin.ScheduleManagement.createService')
    @endif
    {{-- Lịch sử thay đổi --}}
    <label for="" class="font-bold text-2xl mb-3  ml-4">Lịch sử thay đổi</label>
    <div class="modal-body">
        <div class=" overflow-y-auto " style="height: 300px;">
            <table class="table  table-bordered rounded" style="">
                <thead class="">
                    <tr class="stell" style="">
                        <th class="text-xl font-bold text-center">Nhân viên</th>
                        <th class="text-xl font-bold text-center">Hành động</th>
                        <th class="text-xl font-bold text-center">Thời gian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history_action as $item)
                        <tr class="stells">
                            <td class="text-center"style="border: 1px solid #312E81">{{ $item->admin->username }}</td>
                            @php
                                // Tách chuỗi thành mảng bằng dấu chấm
                                $parts = explode('.,', $item->action, 2);
                                // Phần trước dấu chấm
                                $before_dot = trim($parts[0]);
                                // Phần sau dấu chấm
                                $after_dot = isset($parts[1]) ? trim($parts[1]) : '';
                            @endphp
                            <td class="text-center"style="border: 1px solid #312E81">
                                {{ $before_dot }}
                                <br>
                                {{ $after_dot }}
                            </td>
                            <td class="text-center"style="border: 1px solid #312E81">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
