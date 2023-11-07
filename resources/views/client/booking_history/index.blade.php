@extends('client.templates.layout_dashboard')
@section('title', 'Booking History')
@section('content')
    <div id="data-wrapper">
        <h4 itemprop="headline">Danh Sách Lịch Đặt</h4>
        @include('client.booking_history.list_booking')
    </div>
    <div>
        {{$list_booking->links('custom.pagination')}}
    </div>
    @include('client.templates.pagination')
@endsection
