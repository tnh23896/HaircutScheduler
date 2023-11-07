@extends('client.templates.layout_dashboard')
@section('title', 'Chi tiết lịch đặt')
@section('content')
    <!-- content begin -->
    <div class="no-bottom no-top" id="content" xmlns="http://www.w3.org/1999/html">
        <div id="top"></div>
        <section id="subheader" class="jarallax">
            <img src="{{ asset('client/images/background/2.jpg') }}" class="jarallax-img" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h1>Chi tiết các dịch vụ đã đặt</h1>
                        <div class="de-separator"></div>
                    </div>
                </div>
            </div>
            <div class="de-gradient-edge-bottom"></div>
        </section>
        <section id="section-pricing" aria-label="section">
            <div class="container">
                <form action="{{ route('booking-details.update', $item->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table table-striped" style="border: #CF814D;">
                        <thead class="text-black font-weight-bold">
                        <tr>
                            <td>Tên Dịch Vụ</td>
                            <td>Trạng Thái</td>
                            <td>Giá Tiền</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($item->booking_details as $detail)
                            <tr class="text-black">
                                <td>{{ $detail->name }}</td>
                                <td>
                                    <input style="height: 15px; width: 15px" type="checkbox" name="status[]"
                                           @checked($detail->status == 'success') value="{{ $detail->id }}"
                                           @if ($item->status == 'success') disabled @endif
                                    >
                                </td>
                                <td>{{ $detail->price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if ($item->status !== 'success')
                        <div class="mt-4 float-right mb-2">
                            <button type="submit" class="btn"
                                    style="width: 130px;  height: 40px; background-color: #D9842F; border-radius: unset !important; color: white">
                                Lưu
                            </button>
                        </div>
                    @endif
                </form>
                <div class="mt-4 mr10 float-right mr-2 mb-2">
                    <a href="{{route('booking_history')}}">
                        <button class="btn btn-dark"
                                style="width: 130px;  height: 40px; border-radius: unset !important;">
                            Quay Lại
                        </button>
                    </a>
                </div>
            </div>
            @if ($item->status !== 'success')
                <div class="mb-4">
                    <a data-toggle="modal" data-target="#modal{{ $item->id }}">
                        <button
                            style="width: 130px;  height: 40px; background-color: #D9842F; border: unset!important; border-radius: unset !important; color: white">
                            Thêm dịch vụ
                        </button>
                    </a>
                </div>
                <!-- Modal -->
                @include('client.booking_history.create_service')
            @endif
        </section>
    </div>
    <!-- content close -->
@endsection
