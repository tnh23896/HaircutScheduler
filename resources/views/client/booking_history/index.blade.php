@extends('client.templates.layout_dashboard')
@section('title', 'Booking History')
@section('content')
    <div id="data-wrapper">
        @include('client.booking_history.list_booking')
    </div>
    <div>
        {{ $list_booking->links('custom.pagination') }}
    </div>
    @include('client.templates.pagination')
@endsection

