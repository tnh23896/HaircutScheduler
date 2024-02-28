<style>

    .text-secondary-d1 {
        color: #354a1d !important;
    }

    .page-header {
        margin: 0 0 1rem;
        padding-bottom: 1rem;
        padding-top: .5rem;
        border-bottom: 1px dotted #e2e2e2;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -ms-flex-align: center;
        align-items: center;
    }

    .page-title {
        padding: 0;
        margin: 0;
        font-size: 1.75rem;
        font-weight: 300;
    }

    .brc-default-l1 {
        border-color: #dce9f0 !important;
    }

    .ml-n1, .mx-n1 {
        margin-left: -.25rem !important;
    }

    .mr-n1, .mx-n1 {
        margin-right: -.25rem !important;
    }

    .mb-4, .my-4 {
        margin-bottom: 1.5rem !important;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }

    .text-grey-m2 {
        color: #888a8d !important;
    }

    .text-success-m2 {
        color: #86bd68 !important;
    }

    .font-bolder, .text-600 {
        font-weight: 600 !important;
    }

    .text-110 {
        font-size: 110% !important;
    }

    .text-blue {
        color: #478fcc !important;
    }

    .pb-25, .py-25 {
        padding-bottom: .75rem !important;
    }

    .pt-25, .py-25 {
        padding-top: .75rem !important;
    }

    .bgc-default-tp1 {
        background-color:#354a1d  !important;
    }

    .bgc-default-l4, .bgc-h-default-l4:hover {
        background-color: #f3f8fa !important;
    }

    .page-header .page-tools {
        -ms-flex-item-align: end;
        align-self: flex-end;
    }

    .btn-light {
        color: #757984;
        background-color: #f5f6f9;
        border-color: #dddfe4;
    }

    .w-2 {
        width: 1rem;
    }

    .text-120 {
        font-size: 120% !important;
    }

    .text-primary-m1 {
        color: #4087d4 !important;
    }

    .text-danger-m1 {
        color: #dd4949 !important;
    }

    .text-blue-m2 {
        color: #68a3d5 !important;
    }

    .text-150 {
        font-size: 150% !important;
    }

    .text-60 {
        font-size: 60% !important;
    }

    .text-grey-m1 {
        color: #7b7d81 !important;
    }

    .align-bottom {
        vertical-align: bottom !important;
    }

</style>

<div class="modal fade modal{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white text-black">
            <div class="page-content container">
                <div class="page-header text-blue-d2 justify-content-end">
                    <div class="page-tools">
                        <div class="action-buttons">
                            <a class="btn bg-white btn-light mx-1px text-95" href="{{ route('print.bill', $bill->id) }}" data-title="Print">
                                Tải về
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container px-5 pb-5">
                    <h1 class="text-center text-5xl pt-16 text-secondary-d1">DT BARBER</h1>
                    <p class="text-center pt-2 text-secondary-d1">HÂN HẠNH ĐƯỢC PHỤC VỤ.</p>
                    <div class="text-center">
                    <h1 class="page-title text-secondary-d1 font-weight-bold">
                        Hóa đơn
                    </h1>
                    <small>Mã hóa đơn: {{$bill->id}} / Ngày lập: {{$bill->created_at}}</small>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center text-150">
                                        <img src="{{ asset('client/assets/images/writelogo.png')}}" alt=""
                                             width="125px">
                                        <span class="text-default-d3"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <span class="text-sm text-grey-m2 align-middle">Khách hàng:</span>
                                        <span class="text-600 text-110 text-blue align-middle">{{$bill->name}}</span>
                                    </div>
                                    <div class="text-grey-m2">
                                        <div class="my-1">{{$bill->email}}</div>
                                        <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i>
                                            <b class="text-600">{{$bill->phone}}</b></div>
                                    </div>
                                </div>
                                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                    <hr class="d-sm-none"/>
                                    <div class="text-grey-m2 text-right">
                                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                            Thanh toán tới
                                        </div>
                                        <div class="my-1">DT BARBER</div>
                                        <div class="my-1">dtbarber@gmail.com</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="row border-bottom py-25 text-secondary-d1">
                                    <div class="col-9 col-sm-8">Tên Dịch Vụ</div>
                                    <div class="d-none d-sm-block col-4 col-sm-4 text-right">Giá Tiền</div>
                                </div>
                                @foreach($bill->bill_details as $detail)
                                    <div class="text-95 text-secondary-d3">
                                        <div class="row mb-2 mb-sm-0 py-25">
                                            <div class="col-9 col-sm-8">{{$detail->name}}</div>
                                            <div class="col-4 text-secondary-d2 text-right">{{number_format($detail->price)}} VND</div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row border-b-2 brc-default-l2"></div>
                                <hr/>
                                <div class="sm:text-left sm:ml-auto" style="text-align: right">
                                    <div class="text-base">Số tiền phải thanh toán: {{number_format($bill->total_price) }} VND</div>
                                </div>
                                    <hr/>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="sm:text-left mt-10 sm:mt-0">
                                            <div class="text-base">Thông tin ngân hàng</div>
                                            <div class="text-lg font-medium mt-2 text-secondary-d1">Ngân hàng Vietcombank</div>
                                            <div class="mt-1">Tên tài khoản : DT Barber</div>
                                            <div class="mt-1">Số tài khoản : 0123 456 789</div>
                                        </div>
                                    </div>
                                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                        <div class="sm:text-left sm:ml-auto" style="text-align: right">
                                            <div class="text-base">Liên hệ</div>
                                            <div class="text-base mt-2">dtbarber.vn@gmail.com</div>
                                            <div class="text-base mt-1">(+84) 123 456 789</div>
                                            <div class="text-base mt-1">Cao đẳng FPT Polytechnic Hà Nội</div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <span class="text-secondary-d1 text-105">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
