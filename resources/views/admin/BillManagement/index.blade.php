@extends('admin.templates.app')
@section('title', 'Danh sách hóa đơn')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách hóa đơn
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex flex-wrap items-center mt-3 xl:mt-0">
                {{-- Form tìm kiếm theo ngày và giờ --}}
                <form action="{{ route('admin.billManagement.searchDateTime') }}" method="GET" class="mr-3">
                    <div class="w-full relative text-slate-500 flex items-center">
                        <input type="date" name="day" class="form-control box w-40 sm:w-auto mr-2"
                            value="{{ request('day') }}" style="border-color: #312E81">
                        <input type="time" name="time" class="form-control w-40 sm:w-auto box pr-10"
                            value="{{ request('time') }}" style="border-color: #312E81">
                        <button type="submit">
                            <i class="w-5 h-5 absolute my-auto inset-y-0 mr-3 right-0 top-0" data-lucide="search"></i>
                        </button>
                    </div>
                </form>
                {{-- Form tìm kiếm theo tên và số điện thoại --}}
                <form action="{{ route('admin.billManagement.search') }}" method="GET" class="mr-3">
                    <div class="w-full relative text-slate-500 flex items-center">
                        <input type="text" name="search" class="form-control w-40 sm:w-auto box pr-10"
                            placeholder="Tìm kiếm..." value="{{ request('search') }}" style="border-color: #312E81">
                        <button type="submit">
                            <i class="w-5 h-5 absolute my-auto inset-y-0 mr-3 right-0 top-0" data-lucide="search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">Khách hàng</th>
                        <th class="text-center whitespace-nowrap">Tên nhân viên</th>
                        <th class="text-center whitespace-nowrap">Số tiền thanh toán</th>
                        <th class="text-center whitespace-nowrap">Thanh toán</th>
                        <th class="text-center whitespace-nowrap">Lịch đặt</th>
                        <th class="text-center whitespace-nowrap">Thời gian tạo đơn</th>
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    </tr>
                </thead>
                @foreach ($data as $item)
                    <tbody>
                        <tr class="intro-x">
                            <td class="!py-3.5">
                                <div class="flex items-center">
                                    <div class="">
                                        <a href="#" class="font-medium whitespace-nowrap">{{ $item->name }}</a>
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $item->phone }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center"><a class="flex items-center justify-center"
                                    href="javascript:;">{{ $item->username ?? '' }}</a></td>
                            <td class="text-center">{{ number_format($item->total_price) }} VND</td>
                            <td class="text-center">
                                @if ($item->payment == 'offline')
                                    <span class="">Tại cửa hàng</span>
                                @elseif ($item->payment == 'vnpay')
                                    <span class="">VNPAY</span>
                                @elseif ($item->payment == 'momo')
                                    <span class="">MOMO</span>
                                @endif
                            </td>
                            <td class="w-40">
                                <div class="flex items-center justify-center text-center">
                                    {{ \Carbon\Carbon::parse($item->time)->format('H:i') }}
                                    <br>
                                    {{ \Carbon\Carbon::parse($item->day)->format('d/m/Y') }}
                                </div>
                            </td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s') }}
                                <br>
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-auto cursor-pointer" data-tw-toggle="modal"
                                        data-tw-target="#modal{{ $item->id }}">
                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                        Xem chi tiết
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $data->links('pagination::bootstrap-4') }}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
    {{-- Modal --}}
    <!-- BEGIN: Modal Toggle -->
    <!-- END: Modal Toggle --> <!-- BEGIN: Modal Content -->
    @foreach ($data as $item)
        <div id="modal{{ $item->id }}" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-content" style="background-color: #cfd1c9">

                <div class="content" style="background-color: #cfd1c9">
                    <!-- BEGIN: Top Bar -->
                    <!-- END: Top Bar -->
                    <div class="intro-y flex flex-col sm:flex-row items-center mt-8 ">
                        <h2 class="text-lg font-medium mr-auto" style="color:#354a1d">
                            Trang chi tiết hóa đơn
                        </h2>
                        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                            <a href="{{ route('admin.billManagement.printBill', $item->id) }}"><button
                                    class="btn btn-primary ">Tải hóa đơn</button></a>
                        </div>
                    </div>
                    <!-- BEGIN: Invoice -->
                    <div class="intro-y box overflow-hidden mt-5" style="background-color: #fefefe; color:#354a1d">
                        <div class="text-center sm:text-left">
                            <h1 class="text-center text-5xl pt-16" style="color: #354a1d">DT BARBER</h1>
                            <p class="text-center pt-2" style="color: #354a1d">HÂN HẠNH ĐƯỢC PHỤC VỤ.</p>
                            <div class="px-5 sm:px-20 py-8 text-center">
                                <div class="font-semibold text-3xl">Hóa đơn</div>
                                <div class="mt-2">Số<span class="font-medium">#{{ $item->id }}</span></div>
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
                                            <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">Tên dịch vụ
                                            </th>
                                            <th class="border-b-2 dark:border-darkmode-400 text-right whitespace-nowrap">
                                                Giá
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
                                                    {{ number_format($detail->price) }} VND</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="sm:text-left sm:ml-auto py-5" style="text-align: right">
                                <div class="text-base">Giảm giá:
                                    {{ number_format($item->promotion->discount ?? 0) }} VND <br>
                                    <div class="text-base">Số tiền phải thanh toán:
                                        {{ number_format($item->total_price) }} VND
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
                            <div class="sm:text-left mt-10 sm:mt-0">
                                <div class="text-base">Thông tin ngân hàng</div>
                                <div class="text-lg font-medium mt-2">Ngân hàng Vietcombank</div>
                                <div class="mt-1">Tên tài khoản : DT Barber</div>
                                <div class="mt-1">Số tài khoản : 9358609355</div>
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
    @endforeach
@endsection
