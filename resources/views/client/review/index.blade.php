@extends('client.templates.layout_dashboard')
@section('title', 'Lịch sử đánh giá')
@section('title_page', 'Lịch sử đánh giá')
@section('content')
    <h4 itemprop="headline">Lịch sử đánh giá</h4>
    <div class="booking-table">
        <table>
            <thead>
            <th class="text-nowrap text-center">Mã hóa đơn</th>
            <th class="text-nowrap text-center">Nhân viên</th>
            <th class="text-nowrap text-center">Số sao</th>
            <th class="text-nowrap text-center">Nội dung</th>
            </thead>
            <tbody>
                @foreach($list_reviews as $review)
                    <tr>
                        <td class="text-nowrap text-center">{{ $review->bill_id }}</td>
                        <td class="text-nowrap text-center">{{$review->admin->username}}</td>
                        <td class="text-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->star)
                                            <i class="fa-solid fa-star text-warning me-1"></i>
                                        @else
                                            <i class="fa-regular fa-star me-1"></i>
                                        @endif
                                    @endfor
                        </td>
                        <td class="text-left" style="width: 500px; height: auto">{{$review->comment}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('client.templates.pagination')
@endsection

