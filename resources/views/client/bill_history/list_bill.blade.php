<div class="order-list">
    @foreach ($list_bill as $bill)
        <div class="order-item brd-rd5">
            <div class="order-info">
                <span class="red-clr font-weight-bold mb-2">ID hóa đơn: #{{ $bill->id }}</span>
                <span class="price font-weight-bold mb-2">Tổng tiền: {{ number_format($bill->total_price) }}</span>
                <div class="mt-2 mb-2">
                    <span class="price font-weight-bold">Lịch đặt: {{ Carbon\Carbon::parse($bill->time)->format('H:i') }} {{ Carbon\Carbon::parse($bill->day)->format('d/m/Y') }}</span>
                </div>
                <span class="price font-weight-bold">Thời gian tạo: {{ Carbon\Carbon::parse($bill->created_at)->format('H:i:s d/m/Y') }}</span>
                <a class="theme-btn-2" data-toggle="modal" data-target=".modal{{ $bill->id }}" href=""
                   title="" itemprop="url"
                   style="width: 150px;height: 40px;color: white;border: none;padding: 0px;text-align: center;font-size: 13px;border-radius: 3px">
                    Chi tiết hoá đơn</a>
                @php
                    $hideReviewButton = false;
                @endphp
                @foreach($reviews as $review)
                    @if ($review->bill_id == $bill->id)
                        @php
                            $hideReviewButton = true;
                        @endphp
                    @endif
                @endforeach
                @if (!$hideReviewButton)
                    <a class="mr-1" data-toggle="modal" data-target=".modal_reviews{{ $bill->id }}" href=""
                       title="" itemprop="url"
                       style="width: 150px;height: 40px;color: white;border: none;padding: 0px;text-align: center;font-size: 13px;border-radius: 3px">
                        Đánh giá</a>
                @endif
            </div>
        </div>
    @endforeach
</div>
