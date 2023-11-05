<div id="modal{{$item->id}}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-content">

        <div class="content">
            <!-- BEGIN: Top Bar -->
            <!-- END: Top Bar -->
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
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
                                    <a href="#" class="dropdown-item"> <i data-lucide="file" class="w-4 h-4 mr-2"></i>
                                        Export Word </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item"> <i data-lucide="file" class="w-4 h-4 mr-2"></i>
                                        Export PDF </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Invoice -->
            <div class="intro-y box overflow-hidden mt-5">
                <div class="border-b border-slate-200/60 dark:border-darkmode-400 text-center sm:text-left">
                    <div class="px-5 py-10 sm:px-20 sm:py-20">
                        <div class="text-primary font-semibold text-3xl">Hóa đơn</div>
                        <div class="mt-2"> số <span class="font-medium">#{{$item->id}}</span></div>
                        <div class="mt-1">{{$item->created_at}}</div>
                    </div>
                    <div class="flex flex-col lg:flex-row px-5 sm:px-20 pt-10 pb-10 sm:pb-20">
                        <div>
                            <div class="text-base text-slate-500">Tên khách hàng</div>
                            <div class="text-lg font-medium text-primary mt-2">{{$item->name}}</div>
                            <div class="mt-1">{{$item->email}}</div>
                        </div>
                        <div class="lg:text-right mt-10 lg:mt-0 lg:ml-auto">
                            <div class="text-base text-slate-500">Thanh toán tới</div>
                            <div class="text-lg font-medium text-primary mt-2">BLAXCUT</div>
                            <div class="mt-1">blaxcut.vn@gmail.com</div>
                        </div>
                    </div>
                </div>
                <div class="px-5 sm:px-16 py-10 sm:py-20">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">Tên dịch vụ</th>
                                <th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">Giá tiền
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($item->bill_details as $detail)
                                <tr>
                                    <td class="border-b dark:border-darkmode-400">
                                        <div class="font-medium whitespace-nowrap">{{$detail->name}}</div>
                                    </td>
                                    <td class="text-right border-b dark:border-darkmode-400 w-32 font-medium">{{$detail->price}} vnd</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
                    <div class="text-center sm:text-left mt-10 sm:mt-0">
                        <div class="text-base text-slate-500">Tên người nhận</div>
                        <div class="text-lg text-primary font-medium mt-2">Elon Musk</div>
                        <div class="mt-1">Số tài khoản : 098347234832</div>
                        <div class="mt-1">Mã code : LFT133243</div>
                    </div>
                    <div class="text-center sm:text-left sm:ml-auto">
                        <div class="text-base text-slate-500">Tổng tiền: {{$item->total_price}} vnd</div>
                        <div class="text-base text-warning">Giảm giá: {{ $item->promotion->discount ?? 0 }} vnd</div>
                        <hr>
                        <div class="text-base text-success">Số tiền phải thanh toán: {{$item->total_price - ($item->promotion->discount ?? 0)}} vnd</div>
                        <div class="mt-1">Đã bao gồm thuế VAT(10%)</div>
                    </div>
                </div>
            </div>
            <!-- END: Invoice -->
        </div>
    </div>
</div>

