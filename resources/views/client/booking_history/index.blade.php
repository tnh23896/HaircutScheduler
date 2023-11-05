@extends('client.templates.layout_dashboard')
@section('title', 'Booking History')
@section('content')
    <div id="my-bookings">
        <div class="">
            <div class="">
                <h4 itemprop="headline">Danh Sách Lịch Đặt</h4>
            </div>
            <div class="booking-table">
                <table>
                    <thead>
                    <tr>
                        <th class="text-nowrap">Thợ cắt tóc</th>
                        <th class="text-nowrap">Giá gốc</th>
                        <th class="text-nowrap">Giảm giá</th>
                        <th class="text-nowrap">Số tiền thanh toán</th>
                        <th class="text-nowrap">Lịch đặt</th>
                        <th class="text-nowrap">Trạng thái</th>
                        <th class="text-nowrap">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list_booking as $booking)
                        <tr>
                            <td class="text-nowrap">{{ $booking->admin->username }}</td>
                            <td class="text-nowrap"><span>{{ number_format($booking->total_price) }} vnd</span>
                                <a class="detail-link brd-rd50"
                                   href="javascript:void(0)"
                                   title="" itemprop="url">
                                    <i class="fa fa-chain"></i>
                                </a>
                            </td>
                            <td class="text-nowrap">{{ number_format($booking->promotion->discount ?? 0) }} vnd</td>
                            <td class="text-nowrap"><span>{{number_format($booking->total_price - ($booking->promotion->discount ?? 0)) }} vnd</span>
                                <a class="detail-link brd-rd50"
                                   href="javascript:void(0)"
                                   title="" itemprop="url">
                                    <i class="fa fa-chain"></i>
                                </a>
                            </td>
                            <td class="text-center text-nowrap"><span>
                                {{ \Carbon\Carbon::parse($booking->time)->format('H:i') }}
                                <br>
                                {{ \Carbon\Carbon::parse($booking->day)->format('d/m/Y') }}
                            </span>
                                <a class="detail-link brd-rd50"
                                   href="javascript:void(0)"
                                   title="" itemprop="url">
                                    <i class="fa fa-chain"></i>
                                </a>
                            </td>
                            <td class="text-nowrap">
                                @if ($booking->status == 'pending')
                                    <span class="text-black">Chờ xác nhận</span>
                                @elseif($booking->status == "confirmed")
                                    <span class="text-primary">Đã xác nhận</span>
                                @elseif ($booking->status == 'waiting')
                                    <span class="text-warning">Đang chờ cắt</span>
                                @elseif($booking->status == 'success')
                                    <span class="text-success">Đã hoàn thành</span>
                                @elseif($booking->status == 'canceled')
                                    <span class="text-danger">Đã hủy</span>
                                @endif
                            </td>
                            <td class="flex text-nowrap">
                                {{-- <a href="{{ route('booking-history.edit', $booking->id) }}">
                                    <button class="text-center"
                                            style="width: 130px;  height: 40px; background-color: #D9842F; color: white; border: none; ">
                                        Xem chi tiết
                                    </button>
                                </a> --}}
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
