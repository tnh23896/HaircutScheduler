@extends('admin.templates.app')
@section ('title','Schedule Details')
@section('content')
    <form action="{{route('admin.scheduleManagement.scheduleDetails.update', $item->id)}}" method="post"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-header">
            <div>
                <h1 class="font-bold text-2xl">Schedule Detail:#{{$item->id}}</h1>
                <h4 class="font-bold text-2sm">Customer Name: {{$item->name}}</h4>
                <h4 class="font-bold text-2sm">Phone: {{$item->phone}}</h4>
            </div>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
                <tr>
                    <th class="text-xl font-bold">Name Service</th>
                    <th class="text-xl font-bold">Price</th>
                    <th class="text-xl font-bold">Service Uses</th>
                </tr>
                @foreach($item->booking_details as $detail)
                    <tr>
                        <td>{{$detail->name}}</td>
                        <td>{{$detail->price}}</td>
                        <td>
                            <input type="checkbox"
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
            <a href="{{route('admin.scheduleManagement.index')}}" class="btn btn-primary w-32 mr-1">List Schedule</a>
            @if($item->status !== "success")
            <button type="submit" id="saveBtn" class="btn btn-success w-24 text-white">
               Save</button>
            @endif
        </div>
    </form>
    <div class="mb-4">
        <a href="{{route('admin.scheduleManagement.scheduleDetails.create', $item->id)}}" ><button class="btn btn-primary">Thêm dịch vụ</button></a>
    </div>
@endsection
