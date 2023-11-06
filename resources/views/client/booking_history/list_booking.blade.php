<div class="booking-table">
    <table>
        <thead>
        <th>Thợ cắt tóc</th>
        <th>Giảm giá</th>
        <th>Tổng tiền</th>
        <th>Lịch đặt</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
        </thead>
        <tbody>
        @foreach ($list_booking as $booking)
            <tr>
                <td>{{ $booking->admin->username }}</td>
                <td>{{ number_format($booking->promotion->discount) }}</td>
                <td><span>{{ number_format($booking->total_price) }}</span> <a class="detail-link brd-rd50"
                                                                               href="javascript:void(0)"
                                                                               title="" itemprop="url"><i
                            class="fa fa-chain"></i></a></td>
                <td><span>{{ $booking->time }} {{ $booking->day }}</span> <a class="detail-link brd-rd50"
                                                                             href="javascript:void(0)"
                                                                             title="" itemprop="url"><i
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
                <td class="">
                    <a href="{{ route('booking-history.edit', $booking->id) }}">
                        <button class="text-center text-uppercase"
                                style="width: 100px;
                                                  height: 30px;
                                                  background-color: #D9842F;
                                                  color: white;
                                                  border: none;
                                                  font-size: 13px;
                                                  border-radius: 3px">
                            Xem chi tiết
                        </button>
                    </a>
                    @if ($booking->status == 'pending')
                        <a href="">
                            <button class="btn btn-danger text-center text-uppercase"
                                    style="width: 100px;
                                                       height: 30px;
                                                       color: white;
                                                       border: none;
                                                       font-size: 13px;
                                                       border-radius: 3px">
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
