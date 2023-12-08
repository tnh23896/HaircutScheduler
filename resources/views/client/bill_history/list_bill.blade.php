<div class="order-list">
    @foreach ($list_bill as $bill)
        <div class="order-item brd-rd5">
            <div class="order-info">
                <span class="red-clr font-weight-bold mb-2">ID hóa đơn: #{{ $bill->id }}</span>
                <span class="price font-weight-bold mb-2">Tổng tiền: {{ number_format($bill->total_price) }} VND</span>
                <div class="mt-2 mb-2">
                    <span class="price font-weight-bold">Lịch đặt: {{ Carbon\Carbon::parse($bill->time)->format('H:i') }}
                        {{ Carbon\Carbon::parse($bill->day)->format('d/m/Y') }}</span>
                </div>
                <div class="mt-2 mb-2">
                <span class="price font-weight-bold">Phương thức thanh toán:
                    @if ($bill->payment == 'offline')
                    <span class="">Tại cửa hàng</span>
                @elseif ($bill->payment == 'vnpay')
                    <span class="">VNPAY</span>
                @elseif ($bill->payment == 'momo')
                    <span class="">MOMO</span>
                @endif
            </div>
                <span class="price font-weight-bold">Thời gian tạo:
                    {{ Carbon\Carbon::parse($bill->created_at)->format('H:i:s d/m/Y') }}</span>
                <a class="theme-btn-2" data-toggle="modal" data-target=".modal{{ $bill->id }}" href=""
                    title="" itemprop="url"
                    style="width: 150px;height: 40px;color: white;border: none;padding: 0px;text-align: center;font-size: 13px;border-radius: 3px">
                    Chi tiết hoá đơn</a>

            </div>
        </div>
    @endforeach
</div>
