<div id="modal{{ $item->id }}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-content" style="background-color: #cfd1c9">

        <div class="content" style="background-color: #cfd1c9">
            <!-- BEGIN: Top Bar -->
            <!-- END: Top Bar -->
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto" style="color:#354a1d">
                    Trang chi tiết hóa đơn
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <button class="btn btn-primary shadow-md mr-2">In hóa đơn</button>
                    <div class="dropdown ml-auto sm:ml-0">
                        <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                            <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
                                    data-lucide="plus"></i> </span>
                        </button>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="#" class="dropdown-item"> <i data-lucide="file"
                                            class="w-4 h-4 mr-2"></i>
                                        Export Word </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item"> <i data-lucide="file"
                                            class="w-4 h-4 mr-2"></i>
                                        Export PDF </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Invoice -->
            <div class="intro-y box overflow-hidden mt-5" style="background-color: #fefefe; color:#354a1d">
                <div class="text-center sm:text-left">
                    <h1 class="text-center text-5xl pt-16" style="color: #354a1d">DT BARBER</h1>
                    <p class="text-center pt-2" style="color: #354a1d">HÂN HẠNH ĐƯỢC PHỤC VỤ.</p>
                    <div class="px-5 sm:px-20 py-8 text-center">
                        <div class="font-semibold text-3xl">Hóa đơn</div>
                        <div class="mt-2"> số <span class="font-medium">#{{ $item->id }}</span></div>
                        <div class="mt-1">Ngày lập: {{ $item->created_at }}</div>
                    </div>
                    <div class="flex flex-col lg:flex-row px-5 sm:px-20">
                        <div>
                            <div class="text-base">Tên khách hàng</div>
                            <div class="text-lg font-medium text-primary mt-2">{{ $item->name }}</div>
                            <div class="mt-1">{{ $item->email }}</div>
                        </div>
                        <div class="lg:text-right mt-10 lg:mt-0 lg:ml-auto">
                            <div class="text-base">Thanh toán tới</div>
                            <div class="text-lg font-medium text-primary mt-2">DT BARBER</div>
                            <div class="mt-1">dtbarber.vn@gmail.com</div>
                        </div>
                    </div>
                </div>
                <div class="px-5 sm:px-16 sm:py-20">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">Tên dịch vụ</th>
                                    <th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">Giá
                                        tiền
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item->bill_details as $detail)
                                    <tr>
                                        <td class="border-b dark:border-darkmode-400">
                                            <div class="font-medium whitespace-nowrap">{{ $detail->name }}</div>
                                        </td>
                                        <td class="text-right border-b dark:border-darkmode-400 w-32 font-medium">
                                            {{ $detail->price }} vnd</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="sm:text-left sm:ml-auto py-5" style="text-align: right">
                        <div class="text-base">Tổng tiền: {{ $item->total_price }} vnd</div>
                        <div class="text-base">Giảm giá: {{ $item->promotion->discount ?? 0 }} vnd</div>
                        <hr>
                        <div class="text-lg	">Số tiền phải thanh toán:
                            {{ $item->total_price - ($item->promotion->discount ?? 0) }} vnd</div>
                        <div class="mt-1">Đã bao gồm thuế VAT(10%)</div>
                    </div>
                </div>
                <div class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
                    <div class="sm:text-left mt-10 sm:mt-0">
                        <div class="text-base">Thông tin ngân hàng</div>
                        <div class="text-lg font-medium mt-2">Ngân hàng Vietcombank</div>
                        <div class="mt-1">Tên tài khoản : DT Barber</div>
                        <div class="mt-1">Số tài khoản : 0123 456 789</div>
                    </div>
                    <div class="sm:text-left sm:ml-auto" style="text-align: right">
                        <div class="text-base">Liên hệ</div>
                        <div class="text-base mt-2">dtbarber.vn@gmail.com</div>
                        <div class="text-base mt-1">(+84) 123 456 789</div>
                        <div class="text-base mt-1">Cao đẳng FPT Polytechnic Hà Nội</div>
                    </div>
                </div>
            </div>
            <!-- END: Invoice -->
        </div>
    </div>
</div>
