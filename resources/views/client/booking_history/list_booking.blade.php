<h4 itemprop="headline">Danh Sách Lịch Đặt</h4>
<div class="booking-table">
    <table>
        <thead>
            <th class="text-nowrap text-center">Thợ cắt tóc</th>
            <th class="text-nowrap text-center">Tổng tiền</th>
            <th class="text-nowrap text-center">Giảm giá</th>
            <th class="text-nowrap text-center">Đã thanh toán</th>
            <th class="text-nowrap text-center">Thanh toán</th>
            <th class="text-nowrap text-center">Lịch đặt</th>
            <th class="text-nowrap text-center">Trạng thái</th>
            <th class="text-nowrap text-center">Hành động</th>
        </thead>
        <tbody>
            @foreach ($list_booking as $booking)
                <tr>
                    <td class="text-nowrap text-center">{{ $booking->admin->username ?? '' }}</td>
                    <td class="text-nowrap text-center">{{ number_format($booking->total_price) }} VND</td>
                    <td class="text-nowrap text-center">{{ number_format($booking->promotion->discount ?? 0) }} VND</td>
                    <td class="text-nowrap text-center">{{ number_format($booking->amount_paid) }} VND</td>
                    <td class="text-nowrap text-center">
                        @if ($booking->payment == 'offline')
                        <span class="">Tại cửa hàng</span>
                    @elseif ($booking->payment == 'vnpay')
                        <span class="">VNPAY</span>
                    @endif
                    </td>
                    <td class="text-center"><span>
                            {{ \Carbon\Carbon::parse($booking->time)->format('H:i') }}
                            <br>
                            {{ \Carbon\Carbon::parse($booking->day)->format('d/m/Y') }}
                        </span>
                    </td>
                    <td class="text-nowrap">
                        @if ($booking->status == 'pending')
                            <span class="text-black">Chờ xác nhận</span>
                        @elseif($booking->status == 'confirmed')
                            <span class="text-primary">Đã xác nhận</span>
                        @elseif ($booking->status == 'waiting')
                            <span class="text-warning">Đang chờ cắt</span>
                        @elseif($booking->status == 'success')
                            <span class="text-success">Đã hoàn thành</span>
                        @elseif($booking->status == 'canceled')
                            <span class="text-danger">Đã hủy</span>
                        @endif
                    </td>
                    <td class="">
                        @php
                            $hideReviewButton = false;

                            foreach ($reviews as $review) {
                                if ($review->booking_id == $booking->id) {
                                    $hideReviewButton = true;
                                    break;
                                }
                            }
                        @endphp

                        @if (!$hideReviewButton && $booking->status == 'success')
                            <a data-toggle="modal" data-target=".modal_reviews{{ $booking->id }}"
                                href="javascript:void(0)" title="" itemprop="url">
                                <button class="text-center"
                                    style="width: 100px;
													height: 30px;
													color: white;
													background-color: black;
													border: none;
													font-size: 13px;">
                                    Đánh giá
                                </button>
                            </a>
                        @endif
                        @if ($booking->status == 'success')
                            @include('client.booking_history.modal_reviews')
                        @endif
                        <a data-toggle="modal" data-target=".modal{{ $booking->id }}" href="javascript:void(0)"
                            title="" itemprop="url">
                            <button class="text-center"
                                style="width: 100px;
                            height: 30px;
                            color: white;
                            background-color: #d9842f;
                            border: none;
                            font-size: 13px;">
                                Chi tiết dịch vụ
                            </button>
                        </a>
                        <br>
                        @if ($booking->status == 'pending')
                            <form class="delete-form" action="{{ route('booking-history.delete', $booking->id) }}" method="POST">
                                @csrf
                                <button class="text-center mt-2"
                                    style="width: 100px;
                                               height: 30px;
                                               color: white;
                                               border:none;
                                               background-color: rgb(185, 49, 49);
                                               font-size: 13px;">
                                    Hủy lịch
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@foreach ($list_booking as $booking)
    @include('client.booking_history.modal')
@endforeach

<script>
    // Sử dụng hàm sendAjaxRequest để xác nhận và xoá phần tử
    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var urlToDelete = form.attr('action');

        // Hiển thị hộp thoại xác nhận
        Swal.fire({
            title: 'Huỷ lịch?',
            text: 'Bạn chắc chắc muốn hủy lịch?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy',
        }).then((result) => {
            if (result.isConfirmed) {
                // Nếu xác nhận xoá, thực hiện Ajax request bằng hàm sendAjaxRequest
                sendAjaxRequest(urlToDelete, 'POST', {
                    _method: 'POST'
                }, function(response) {
                    if (response.success) {
                        toastr.success(response.success);
                        window.location.reload();
                    }
                }, function(error) {
                    showErrors(error);
                });
            }
        });
    });
</script>
