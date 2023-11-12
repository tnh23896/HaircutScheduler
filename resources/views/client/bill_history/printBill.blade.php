<div class="container__bill">
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
           margin-top: 30px;
       }

       .custom-table {
           border-collapse: collapse;
           margin: 0 auto;
           width: 90%;
       }

       .custom-table-header {
           border-bottom: 2px solid #333;
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

       .custom-container-box-Information-left {
           float: left;
           width: 40%;
           margin-left: 30px;
           /* Lề giữa hai div */
       }

       .custom-container-box-Information-right {
           float: right;
           text-align: right;
           width: 40%;
           margin-right: 30px;
           /* Lề giữa hai div */
       }

       .custom-text-base {
           font-size: 1rem;
       }

       .custom-mt-1 {
           margin-top: 0.625rem;
       }

       .custom-container {
           padding: 0 1rem 2.5rem 1rem;
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
   <div class="modal-dialog modal-xl modal-content" style="background-color: #cfd1c9">
       <div class="content">
           <!-- BEGIN: Top Bar -->
           <!-- END: Top Bar -->

           <!-- BEGIN: Invoice -->
           <div class="my-custom-box " style="background-color: #fefefe; color:#354a1d">
               <div class="text-center sm:text-left">
                   <h1 class="container__bill--text" style="color: #354a1d">DT BARBER</h1>
                   <p class="container__bill--title" style="color: #354a1d">HÂN HẠNH ĐƯỢC PHỤC VỤ.</p>
                   <div class="container__box--title">
                       <div class="container__title--bill custom-text-bill ">Hóa Đơn</div>
                       <div class="container__title--number"> số <span class="font-medium">#{{ $item->id }}</span>
                       </div>
                       <div class="container__title--date">Ngày lập: {{ $item->created_at }}</div>
                   </div>
                   <div class="custom-container-box-Information">
                       <div class="custom-container-box-Information-left">
                           <div class="custom-text-base">Tên khách hàng</div>
                           <div class="custom-text-lg custom-font-medium custom-text-primary custom-mt-2">
                               {{ $item->name }}
                           </div>
                           <div class="custom-mt-1">{{ $item->email }}</div>
                       </div>
                       <div class="custom-container-box-Information-right">
                           <div class="custom-text-base">Thanh toán tới</div>
                           <div class="custom-text-lg custom-font-medium custom-text-primary custom-mt-2">DT BARBER
                           </div>
                           <div class="custom-mt-1">dtbarber.vn@gmail.com</div>
                       </div>
                       <div style="clear: both;"></div>
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
                               @foreach ($item->bill_details as $detail)
                                   <tr>
                                       <td class="custom-table-cell custom-border-bottom"
                                           style="border-bottom: 1px solid #333 ">
                                           <div class="custom-table-cell-content">
                                               <div class="custom-font-medium custom-whitespace-nowrap">
                                                   {{ $detail->name }}</div>
                                           </div>
                                       </td>
                                       <td class="custom-text-right custom-table-cell custom-border-bottom custom-font-medium custom-w-32"
                                           style="border-bottom: 1px solid #333 ">
                                           {{ $detail->price }} VND
                                       </td>
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>
                   </div>
                   <div class="sm:text-left sm:ml-auto py-5 price" style="text-align: right">
                       <div class="text-base">Tổng tiền: {{ $item->total_price }} VND</div>
                       <div class="text-base">Giảm giá: {{ $item->promotion->discount ?? 0 }} VND</div>
                       <hr>
                       <div class="text-lg	">Số tiền phải thanh toán:
                           {{ $item->total_price - ($item->promotion->discount ?? 0) }} VND</div>
                   </div>
               </div>
               <div class="custom-container">
                   <div class="custom-info">
                       <div class="custom-text-base custom-mt-2">Thông tin ngân hàng</div>
                       <div class="custom-mt-1 ">Ngân hàng Vietcombank</div>
                       <div class="custom-mt-1">Tên tài khoản : DT Barber</div>
                       <div class="custom-mt-1">Số tài khoản : 0123 456 789</div>
                   </div>
                   <div class="custom-contact">
                       <div class="custom-text-base custom-mt-2">Liên hệ</div>
                       <div class="custom-mt-1">dtbarber.vn@gmail.com</div>
                       <div class="custom-mt-1">(+84) 123 456 789</div>
                       <div class="custom-mt-1">Cao đẳng FPT Polytechnic Hà Nội</div>
                   </div>
                   <div class="custom-clear"></div>
               </div>
           </div>
           <!-- END: Invoice -->
       </div>
   </div>
</div>