@extends('admin.templates.app')
@section ('title','Chi tiết lịch đặt')
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
            </div>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
                <tr>
                    <th class="text-xl font-bold text-center">ID Dịch vụ</th>
                    <th class="text-xl font-bold text-center">Tên dịch vụ</th>
                    <th class="text-xl font-bold text-center">Giá dịch vụ</th>
                    <th class="text-xl font-bold text-center">Dịch vụ sử dụng</th>
                    <th class="text-xl font-bold text-center">Tên nhân viên chỉnh sửa</th>
                </tr>
                @foreach($item->booking_details->sortByDesc('created_at') as $detail)
                    <tr>
                        <td class="text-center">{{$detail->service_id}}</td>
                        <td class="text-center">{{$detail->name}}</td>
                        <td class="text-center">{{$detail->price}}</td>
                        <td class="text-center">
                            <input type="checkbox" class="form-check-input"
                                   name="status[]" @checked($detail->status == "success") value="{{$detail->id}}"
                                   @if($item->status == "success")
                                       disabled
                                @endif
                            >
                        </td>
                        <td class="text-center">{{$detail->admin->username ?? ''}}</td>
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
@endsection
