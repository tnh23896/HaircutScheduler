@extends('client.templates.layout_dashboard')
@section('title', ' Trang hóa đơn')
@section('content')
   

    <div id="my-orders">
        <div class="tabs-wrp brd-rd5">
            <h4 itemprop="headline">MY ORDERS</h4>

            <div class="order-list">
                @foreach ($list_bill as $bill)
                    <div class="order-item brd-rd5">
                        <div class="order-info">
                            <span class="red-clr font-weight-bold mb-2">ID hóa đơn: #{{ $bill->id }}</span>
                            <span class="price font-weight-bold mb-2">Tổng tiền:
                                {{ number_format($bill->total_price) }}</span>
                            <div class="mt-2 mb-2">
                                <span class="price font-weight-bold">Lịch đặt: {{ $bill->time }} {{ $bill->day }}</span>
                            </div>
                            <span class="price font-weight-bold">Thời gian tạo: {{ $bill->created_at }}</span>
                            <a class="brd-rd2 theme-btn-2" data-toggle="modal" data-target=".modal{{ $bill->id }}"
                                href="javascript:void(0)" title="" itemprop="url">Order Detail</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>




    @foreach ($list_bill as $bill)
        @include('client.bill_history.modal')
    @endforeach
@endsection
