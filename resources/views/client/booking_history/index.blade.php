@extends('client.templates.layout_dashboard')
@section('title', 'Booking History')
@section('content')
    @include('client.templates.navbar2')

    <div id="my-bookings">
        <div class="tabs-wrp brd-rd5">
            <div class="book-on">
                <h4 itemprop="headline">MY APPOINTMENT</h4>
                <!--  <div class="select-wrap-inner">
                         <select class="form-control">
                               <option>Default select</option>
                          </select>
                          <select class="form-control">
                               <option>Default select</option>
                          </select>
                     </div> -->
            </div>
            <div class="booking-table">
                <table>
                    <thead>
                        <tr>
                            <th>Thợ cắt tóc</th>
                            <th>Giảm giá</th>
                            <th>Tổng tiền</th>
                            <th>Lịch đặt</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_booking as $booking)
                            <tr>
                                <td>{{ $booking->admin->username }}</td>
                                <td>{{ number_format($booking->promotion->discount) }}</td>
                                <td><span>{{ number_format($booking->total_price) }}</span> <a class="detail-link brd-rd50"
                                        href="javascript:void(0)" title="" itemprop="url"><i
                                            class="fa fa-chain"></i></a></td>
                                <td><span>{{ $booking->time }} {{ $booking->day }}</span> <a class="detail-link brd-rd50"
                                        href="javascript:void(0)" title="" itemprop="url"><i
                                            class="fa fa-chain"></i></a></td>

                                <td>
                                    @if ($booking->status == 'pending')
                                        <span class="text-warning">Pending</span>
                                    @elseif($booking->status == 'success')
                                        <span class="text-success">Success</span>
                                    @elseif($booking->status == 'canceled')
                                        <span class="text-danger">Cancelled</span>
                                    @endif
                                </td>
                                <td class="flex">
                                    <a href="{{ route('booking-history.edit', $booking->id) }}">
                                        <button class="text-center"
                                            style="width: 130px;  height: 40px; background-color: #D9842F; color: white; border: none; ">
                                            Xem chi tiết
                                        </button>
                                    </a>
                                    @if ($booking->status == 'pending')
                                        <a href="">
                                            <button class="btn btn-danger  text-center"
                                                style="width: 130px;  height: 40px; ">
                                                Hủy lịch
                                            </button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
