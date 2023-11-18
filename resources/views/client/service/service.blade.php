@extends('client.templates.app')
@section('title', 'Dịch vụ')
@section('content')
    @include('client.templates.navbar2')
    <section class="position-relative footer-area">
        <div class="container bg-text-area">
            <h2>Dịch vụ</h2>
        </div>
    </section>
    <section class="bg-gray gap position-relative no-bottom lg-no-bottom md-no-bottom sm-no-bottom">
        <div class="container">
            <div class="heading-style text-center">
                <h2>DỊCH VỤ CUNG CẤP</h2>
                <span class="text-uppercase d-block text-color">Bảng giá chi tiết</span>
            </div>
            <div class="row justify-content-center align-items-center">
                @foreach ($listServices as $category)
                    @php $rowNum = $loop->iteration; @endphp
                    @if ($rowNum % 2 == 0)
                        <div class="col-lg-6 col-md-12">
                            <div class="price-content">
                                <div class="price-title">
                                    <h3>{{ $category['category'] ?? '' }}</h3>
                                </div>
                                @foreach ($category['services'] as $service)
                                    <div class="price-inner d-flex justify-content-between align-items-baseline">
                                        <p class="pr-3" style="white-space: nowrap;">{{ $service->name ?? '' }}</p>
                                        <hr class="w-100 m-0">
                                        <p class="pl-3" style="white-space: nowrap;">
                                            {{ number_format($service->price ?? '') }} VND</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 offset-lg-1">
                            <div class="my-5">
                                <img class="img-fluid mx-auto my-auto" src="{{ asset($category['image'] ?? '') }}"
                                    alt="{{ $category['category'] ?? '' }}" style="max-width: 100%; max-height: 100%;">
                            </div>
                        </div>
                    @else
                        <div class="col-lg-5 col-md-12 offset-lg-1">
                            <div class="my-5">
                                <img class="img-fluid mx-auto my-auto" src="{{ asset($category['image'] ?? '') }}"
                                    alt="{{ $category['category'] ?? '' }}" style="max-width: 100%; max-height: 100%;">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="price-content">
                                <div class="price-title">
                                    <h3>{{ $category['category'] ?? '' }}</h3>
                                </div>
                                @foreach ($category['services'] as $service)
                                    <div class="price-inner d-flex justify-content-between align-items-baseline">
                                        <p class="pr-3" style="white-space: nowrap;">{{ $service->name ?? '' }}</p>
                                        <hr class="w-100 m-0">
                                        <p class="pl-3" style="white-space: nowrap;">
                                            {{ number_format($service->price ?? '') }} VND</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-120 mt-5">
        {{ $categoryService->links('custom.pagination') }}
    </section>

    <div class="text-center mt-5 gap no-top">
        <a class="theme-btn-2" href="{{route('booking-service.index')}}">Đặt dịch vụ ngay bây giờ</a>
    </div>
@endsection
