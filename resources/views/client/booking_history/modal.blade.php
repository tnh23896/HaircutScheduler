<div class="modal fade modal{{ $booking->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white text-black ">
            <div class="page-content container">
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
                            <table class="table table-striped" style="border: #CF814D;">
                                <thead class="text-black font-weight-bold">
                                    <tr>
                                        <td>Tên Dịch Vụ</td>
                                        <td>Trạng Thái</td>
                                        <td>Giá Tiền</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($booking->booking_details as $detail)
                                        <tr class="text-black">
                                            <td>{{ $detail->name }}</td>
                                            <td>
                                                <input style="height: 15px; width: 15px" type="checkbox" name="status[]"
                                                    @checked($detail->status == 'success') value="{{ $detail->id }}" disabled>
                                            </td>
                                            <td>{{ $detail->price }} vnd</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <div class="text-black font-weight-bold text-right" style="margin-right:70px ; margin-top: 10px ; margin-bottom: 10px">
                                <label for="">Tổng tiền: {{ $booking->total_price }} VND</label>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
