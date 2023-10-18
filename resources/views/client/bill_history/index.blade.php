@extends('client.templates.app')
@section('title', 'Bill History')
@section('content')
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
                    <thead class="text-center text-black font-monospace">
                    <tr>
                        <th>Thợ Cắt Tóc</th>
                        <th>Giảm Giá</th>
                        <th>Tổng Tiền</th>
                        <th>Lịch Đặt</th>
                        <th>Hành Động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_bill as $bill)
                        <tr class="text-black text-center flex justify-center">
                            <td>{{$bill->admin->username}}</td>
                            <td>{{$bill->promotion->discount}}</td>
                            <td>{{number_format($bill->total_price)}} vnd</td>
                            <td>{{$bill->time}} {{$bill->day}}</td>
                            <td class="flex">
                                <a data-toggle="modal" style="cursor: pointer;" data-target=".modal{{$bill->id}}" >
                                    <button class="btn btn-success  text-center" style="width: 150px;  height: 40px; ">
                                        Chi tiết hóa đơn
                                    </button>
                                </a>
                            </td>
                            {{--                        <td data-toggle="modal" style="cursor: pointer;" data-target=".bd-example-modal-lg">Xem hóa đơn</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


            <!-- Modal -->
            @foreach($list_bill as $bill)
                @include('client.bill_history.modal')
             @endforeach
        </section>

    </div>
@endsection
