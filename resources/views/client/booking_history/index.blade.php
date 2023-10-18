@extends('client.templates.app')
@section('title', 'Danh sách lịch')
@section('content')

    <!-- content begin -->
    <div class="no-bottom no-top" id="content" xmlns="http://www.w3.org/1999/html">
        <div id="top"></div>

        <section id="subheader" class="jarallax">
            <img src="{{asset('client/images/background/2.jpg')}}" class="jarallax-img" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h1>View Your Orders</h1>
                        <div class="de-separator"></div>
                    </div>
                </div>
            </div>
            <div class="de-gradient-edge-bottom"></div>
        </section>
        <section id="section-pricing" aria-label="section">
            <div class="container">
                <table class="table table-striped" style="border: #CF814D;">
                    <thead class="text-center text-black font-monospace h4">
                    <tr>
                        <th>Thợ Cắt Tóc</th>
                        <th>Giảm Giá</th>
                        <th>Tổng Tiền</th>
                        <th>Lịch Đặt</th>
                        <th>Trạng Thái</th>
                        <th>Hành Động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_booking as $booking)
                    <tr class="text-black text-center flex justify-center">
                        <td>{{$booking->admin->username}}</td>
                        <td>{{$booking->promotion->discount}}</td>
                        <td>{{number_format($booking->total_price)}} vnd</td>
                        <td>{{$booking->time}} {{$booking->day}}</td>
                        <td>
                            @if( $booking->status == "pending")
                                <span class="text-warning">Pending</span>
                            @elseif($booking->status == "success")
                                <span class="text-success">Success</span>
                            @elseif($booking->status == "canceled")
                                <span class="text-danger">Cancelled</span>
                            @endif
                        </td>
                        <td class="flex">
                                <a href="{{route('booking-history.edit', $booking->id)}}">
                                    <button class="btn btn-success  text-center" style="width: 130px;  height: 40px; ">
                                    Xem chi tiết
                                    </button>
                                </a>
                            @if($booking->status == "pending")
                            <a href="">
                                <button class="btn btn-danger  text-center" style="width: 130px;  height: 40px; ">
                                Hủy lịch
                                </button>
                            </a>
                            @endif
                        </td>
{{--                        <td data-toggle="modal" style="cursor: pointer;" data-target=".bd-example-modal-lg">Xem hóa đơn</td>--}}
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


            <!-- Modal -->
    </section>

    </div>
    <!-- content close -->

@endsection
