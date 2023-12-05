@extends('admin.templates.app')
@section('title', 'Chi tiết dịch vụ')
@section('css_header_custom')
<style>
	thead {
			position: sticky;
			top: -1px;
			background-color: white; /* Màu nền cho phần cố định */
			border: 1px solid #dee2e6;
			z-index: 1; /* Đảm bảo nằm trên các phần khác của bảng */
			/* shadow viền */
			box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
	}
</style>
@endsection
@section('content')
    <form action="{{ route('admin.scheduleManagement.scheduleDetails.update', $item->id) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-header">
            <div>
                <h1 class="font-bold text-2xl">Lịch đặt :#{{ $item->id }}</h1>
                <h4 class="font-bold text-2sm">Tên khách hàng: {{ $item->name }}</h4>
                <h4 class="font-bold text-2sm">Số điện thoại: {{ $item->phone }}</h4>
                <h4 class="font-bold text-2sm">Nhân viên: {{ $item->admin->username }}</h4>
                @if ($item->payment == 'vnpay')
                    <h4 class="font-bold text-2sm">Số tiền đã trả: {{ number_format($item->amount_paid) }} VND</h4>
                @else
                    <h4 class="font-bold text-2sm">Số tiền đã trả: 0 </h4>
                @endif


                <h4 class="font-bold text-2sm">
                    @if ($item->promotion && $item->promotion->discount !== null)
                        <h4 class="font-bold text-2sm">Giảm giá: {{ number_format($item->promotion->discount) }} VND</h4>
                    @else
                        <h4 class="font-bold text-2sm">Giảm giá: 0</h4>
                    @endif
                </h4>

                @if ($item->payment == 'vnpay')
                    @if ($item->amount_paid > $sum_price_end)
                        <h4 class="font-bold text-2sm">Số tiền cửa hàng trả lại:
                            {{ number_format($item->amount_paid - $sum_price_end) }} VND</h4>
                    @elseif($item->amount_paid < $sum_price_end)
                        <h4 class="font-bold text-2sm">Số tiền phải khách trả:
                            {{ number_format($sum_price_end - $item->amount_paid) }} VND</h4>
                    @else
                        <h4 class="font-bold text-2sm">Số tiền phải trả: 0 </h4>
                    @endif
                @else
                    <h4 class="font-bold text-2sm">Số tiền phải trả: {{ number_format($sum_price_end) }} VND</h4>
                @endif
            </div>
        </div>
        <div class="modal-body">
            <table class="table table-bordered"  >
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
                        <td class="text-center" style="border: 1px solid #312E81">{{ number_format($detail->price) }} VND</td>
                        <td class="text-center" style="border: 1px solid #312E81">
                            <input type="checkbox" class="qr-checkbox form-check-input" style="border-color: #312E81"
                                name="status[]" @checked($detail->status == 'success') value="{{ $detail->id }}"
                                @if ($item->status == 'success') disabled @endif>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
        <div class="text-right mt-5">
            <a href="{{ route('admin.scheduleManagement.index') }}" class="btn btn-outline-secondary w-36 mr-1" style="border: 1px solid #312E81">Trang danh
                sách</a>
            @if ($item->status !== 'success')
                <button type="submit" id="saveBtn" class="btn btn-primary w-32 text-white">
                    Lưu thay đổi
                </button>
            @endif
        </div>

    </form>
    @if ($item->status !== 'success')
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
						<table class="table  table-bordered rounded"  style="">
							<thead  class="">
								<tr class="stell" style="">
										<th class="text-xl font-bold text-center">Nhân viên</th>
										<th class="text-xl font-bold text-center">Hành động</th>
										<th class="text-xl font-bold text-center">Thời gian</th>
								</tr>
							</thead>
								<tbody >
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
												<td class="text-center"style="border: 1px solid #312E81">{{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s d/m/Y') }}</td>
										</tr>
								@endforeach
								</tbody>
						</table>
					</div>
				</div>
@endsection
