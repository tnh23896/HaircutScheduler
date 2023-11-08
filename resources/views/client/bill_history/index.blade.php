@extends('client.templates.layout_dashboard')
@section('title', ' Trang hóa đơn')
@section('content')
    <div id="my-orders">
        <div class="tabs-wrp brd-rd5">
            <h4 itemprop="headline">Danh Sách Hóa Đơn</h4>
            <div id="data-wrapper">
                @include('client.bill_history.list_bill')
            </div>
        </div>
    </div>
    <div>
        {{$list_bill->links('custom.pagination')}}
    </div>
    @foreach ($list_bill as $bill)
        @include('client.bill_history.modal')
    @endforeach
    @include('client.templates.pagination')
@endsection
