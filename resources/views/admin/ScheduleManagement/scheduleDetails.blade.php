@extends('admin.templates.app')
@section ('title','Chi tiết dịch vụ')
@section('content')
    <form action="{{route('admin.scheduleManagement.scheduleDetails.update', $item->id)}}" method="post"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-header">
            <div>
                <h1 class="font-bold text-2xl">Lịch đặt :#{{$item->id}}</h1>
                <h4 class="font-bold text-2sm">Tên khách hàng: {{$item->name}}</h4>
                <h4 class="font-bold text-2sm">Số điện thoại: {{$item->phone}}</h4>
                <h4 class="font-bold text-2sm">Nhân viên: {{$item->admin->username}}</h4>
                @if ($item->payment == "vnpay")
                <h4 class="font-bold text-2sm">Số tiền đã trả: {{number_format($item->amount_paid)}} VND</h4>
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
                
                @if ($item->payment == "vnpay")
                    @if ($item->amount_paid > $sum_price_end)
                    <h4 class="font-bold text-2sm">Số tiền cửa hàng trả lại: {{number_format($item->amount_paid - $sum_price_end)}} VND</h4>
                    @elseif($item->amount_paid < $sum_price_end)
                    <h4 class="font-bold text-2sm">Số tiền phải khách trả: {{number_format($sum_price_end - $item->amount_paid)}} VND</h4>
                    @else
                    <h4 class="font-bold text-2sm">Số tiền phải trả: 0 </h4>
                    @endif
                @else
                    
                <h4 class="font-bold text-2sm">Số tiền phải trả: {{number_format($sum_price_end)}} VND</h4>
                @endif
            </div>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
                <tr>
                    <th class="text-xl font-bold text-center">ID Dịch vụ</th>
                    <th class="text-xl font-bold text-center">Tên dịch vụ</th>
                    <th class="text-xl font-bold text-center">Giá dịch vụ</th>
                    <th class="text-xl font-bold text-center">Dịch vụ sử dụng</th>
                </tr>
                @foreach($item->booking_details->sortByDesc('created_at') as $detail)
                    <tr>
                        <td class="text-center">{{$detail->service_id}}</td>
                        <td class="text-center">{{$detail->name}}</td>
                        <td class="text-center">{{number_format($detail->price)}} VND</td>
                        <td class="text-center">
                            <input type="checkbox" class="qr-checkbox form-check-input" style="border-color: #312E81"
                                   name="status[]" @checked($detail->status == "success") value="{{$detail->id}}"
                                   @if($item->status == "success")
                                       disabled
                                @endif
                            >
                        </td>
                    </tr>
                @endforeach
            </table>
            
        </div>
        <div class="text-right mt-5">
            <a href="{{route('admin.scheduleManagement.index')}}" class="btn btn-outline-secondary w-36 mr-1">Trang danh
                sách</a>
            @if($item->status !== "success")
                <button type="submit" id="saveBtn" class="btn btn-primary w-32 text-white">
                    Lưu thay đổi
                </button>
            @endif
        </div>
        
    </form>
    @if($item->status !== "success")
        <div class="mb-4">
            <a data-tw-toggle="modal" data-tw-target="#modal{{$item->id}}">
                <button class="btn btn-primary w-32">Thêm dịch vụ</button>
            </a>
        </div>
        @include('admin.ScheduleManagement.createService')
    @endif

    {{-- Lịch sử thay đổi --}}
    <label for="" class="font-bold text-2xl mb-3">Lịch sử thay đổi</label>
    <table class="table table-bordered">
        <tr>
            <th class="text-xl font-bold text-center">Nhân viên</th>
            <th class="text-xl font-bold text-center">Hành động</th>
            <th class="text-xl font-bold text-center">Thời gian</th>
        </tr>
        @foreach($history_action as $item)
            <tr>
                <td class="text-center">{{$item->admin->username}}</td>
                <td class="text-center">{{$item->action}}</td>
                <td class="text-center">{{\Carbon\Carbon::parse($item->created_at)->format('H:i:s d/m/Y')}}</td>
            </tr>
        @endforeach
    </table>
@endsection
