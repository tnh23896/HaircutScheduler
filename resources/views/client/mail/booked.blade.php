<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container__bill--text {
            text-align: center;
            font-size: 40px;
            font-weight: lighter;
            font-weight: bolder;
        }

        .container__bill--title {
            text-align: center;
            font-size: 13px;
        }

        .container__title--bill {
            font-size: 25px;
            font-weight: 600;
            text-align: center;


        }

        .container__title--number {
            font-size: 16px;
            text-align: center;

        }

        .container__title--date {
            font-size: 16px;
            text-align: center;

        }

        .my-custom-box {
            padding: 1rem;
            overflow: hidden;
            margin-top: 1.25rem;
        }

        .container__box--table {
            margin-top: 5px;
        }

        .custom-table {
            border-collapse: collapse;
            margin: 0 auto;
            width: 90%;
        }

        .custom-table-header {
            border-bottom: 2px solid #000000;
            white-space: nowrap;
        }

        .custom-text-right {
            text-align: right;
        }

        .custom-text-left {
            text-align: left;
        }

        .custom-table-cell {
            white-space: nowrap;
        }

        .custom-font-medium {
            font-size: 16px;
        }

        .custom-overflow-x-auto {
            overflow-x: auto;
        }

        .custom-whitespace-nowrap {
            white-space: nowrap;
        }

        .custom-w-32 {
            width: 8rem;
            /* Tính theo 1rem = 4px của Tailwind */
        }

        .custom-table-cell-content {
            display: flex;
            align-items: center;
        }

        .custom-table-cell-content div {
            margin-right: 8px;
            /* Điều chỉnh khoảng cách giữa tên dịch vụ và đường kẻ dưới */
        }

        .custom-table-cell {
            padding: 5px 0 5px 0;

        }

        .custom-container-box-Information {
            width: 100%;
            overflow: hidden;
        }

        .custom-container .custom-item {
            margin-top: 10px;
          
            margin-right: 15px;
         
            margin-left: 15px;
        
                        display: block;

        }

        .custom-container .custom-item {
           
        }

        .custom-text-base {
            font-size: 1rem;
        }

        .custom-mt-1 {
            margin-top: 0.625rem;
        }

        .custom-container {
            padding: 0 2rem 1.5rem 2rem;
            /* px-5 sm:px-20 pb-10 sm:pb-20 */
        }

        .custom-info {
            float: left;
            width: 40%;
            margin-left: 20px;
        }

        .custom-contact {
            float: right;
            text-align: right;
            width: 45%;
            margin-right: 28px;
        }

        .custom-text-bill {
            font-weight: normal;
        }

        .custom-text-base,
        .custom-text-lg {
            font-weight: normal;
        }

        .custom-mt-1 {
            margin-top: 0.625rem;
        }

        .custom-mt-2 {
            margin-top: 1.25rem;
        }

        .custom-clear {
            clear: both;
        }

        .price {
            padding-right: 37px;
        }

        @page {
            size: A4;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container__bill">
        <div class="modal-dialog modal-xl modal-content" style="background-color: #cfd1c9">
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <!-- END: Top Bar -->
                <!-- BEGIN: Invoice -->
                <div class="my-custom-box " style="background-color: #fefefe; color:#000000">
                    <div class="text-center sm:text-left">
                        <h1 class="container__bill--text" style="color: #000000">DT BARBER</h1>
                        <p class="container__bill--title" style="color: #000000">HÂN HẠNH ĐƯỢC PHỤC VỤ.</p>
                        <div class="container__box--title">
                            <div class="container__title--bill custom-text-bill ">Lịch Đặt</div>
                            <div class="container__title--number"> Số <span
                                    class="font-medium">#{{ $booking->id }}</span>
                            </div>
                            <div class="container__title--date">Ngày đặt: {{ $booking->day }} - {{ $booking->time }}
                            </div>
                            <div class="container__title--date">Nhân viên: {{ $booking->admin->username }}</div>
                        </div>
                        <div class="custom-container">
                            <!-- Thẻ div đầu tiên -->
                            <div class="custom-item">
                                Tên khách hàng: {{ $booking->name }}
                            </div>

                            <!-- Thẻ div thứ hai -->
                            <div class="custom-item">
                                Email khách hàng: {{ $booking->email }}
                            </div>
                        </div>



                    </div>
                    <div class="container__box--table">
                        <div class="custom-overflow-x-auto">
                            <table class="custom-table">
                                <thead>
                                    <tr>
                                        <th class="custom-table-header custom-text-left">Tên dịch vụ</th>
                                        <th class="custom-table-header custom-text-right">Giá tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($booking->booking_details as $item)
                                        <tr>
                                            <td class="custom-table-cell custom-border-bottom"
                                                style="border-bottom: 1px solid #000000 ">
                                                <div class="custom-table-cell-content">
                                                    <div class="custom-font-medium custom-whitespace-nowrap">
                                                        {{ $item->name }}</div>
                                                </div>
                                            </td>
                                            <td class="custom-text-right custom-table-cell custom-border-bottom custom-font-medium custom-w-32"
                                                style="border-bottom: 1px solid #000000 ">
                                                {{ number_format($item->price) }} VND
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="sm:text-left sm:ml-auto py-5 price" style="text-align: right">
                            <div class="text-base">Số tiền phải thanh toán: {{ number_format($booking->total_price) }}
                                VND
                            </div>
                            <div class="text-base">Giảm giá: {{ number_format($booking->promotion->discount ?? 0) }} VND
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="custom-container">
                        <p>Nếu có bất kỳ thay đổi nào về lịch hẹn hoặc nếu bạn cần hỗ trợ thêm, vui lòng liên hệ với
                            chúng tôi qua số điện thoại <strong>0358-609-355</strong> hoặc email
                            <strong>thangcx2810@gmail.com</strong>. Chúng tôi sẽ rất vui lòng giúp đỡ bạn.
                        </p>

                        <p>Chúng tôi mong chờ một buổi hẹn tuyệt vời và hy vọng rằng dịch vụ của chúng tôi sẽ đáp ứng
                            đúng những mong đợi của bạn.</p>

                        <p>Xin chân thành cảm ơn và chúc bạn một ngày tốt lành!</p>

                        <p>Trân trọng,<br>
                            DTBARBER<br>
                            0358-609-355</p>
                        <div class="custom-clear"></div>
                    </div>
                </div>
                <!-- END: Invoice -->
            </div>
        </div>
    </div>
</body>

</html>
