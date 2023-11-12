@extends('admin.templates.app')
@section ('title','Danh sách hóa đơn')
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
                <form action="{{route('admin.billManagement.searchDateTime')}}" method="GET" class="mr-3">
                    <div class="w-full relative text-slate-500 flex items-center">
                        <input type="date" name="day" class="form-control box w-40 sm:w-auto mr-2" value="{{ request('day') }}">
                        <input type="time" name="time" class="form-control w-40 sm:w-auto box pr-10" value="{{ request('time') }}">
                        <button type="submit">
                            <i class="w-5 h-5 absolute my-auto inset-y-0 mr-3 right-0 top-0" data-lucide="search"></i>
                        </button>
                    </div>
                </form>
                {{-- Form tìm kiếm theo tên và số điện thoại --}}
                <form action="{{route('admin.billManagement.search')}}" method="GET" class="mr-3">
                    <div class="w-full relative text-slate-500 flex items-center">
                        <input type="text" name="search" class="form-control w-40 sm:w-auto box pr-10" placeholder="Tìm kiếm..."
                               value="{{ request('search') }}">
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
                    <th class="text-center whitespace-nowrap">Giá gốc</th>
                    <th class="text-center whitespace-nowrap">Giảm giá</th>
                    <th class="text-center whitespace-nowrap">Số tiền thanh toán</th>
                    <th class="text-center whitespace-nowrap">Lịch đặt</th>
                    <th class="text-center whitespace-nowrap">Thời gian tạo đơn</th>
                    <th class="text-center whitespace-nowrap">Hành động</th>
                </tr>
                </thead>
                @foreach($data as $item)
                    <tbody>
                    <tr class="intro-x">
                        <td class="!py-3.5">
                            <div class="flex items-center">
                                <div class="">
                                    <a href="#" class="font-medium whitespace-nowrap">{{$item->name}}</a>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{$item->phone}}</div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"><a class="flex items-center justify-center"
                                                   href="javascript:;">{{$item->admin->username ?? ''}}</a></td>
                        <td class="text-center">{{number_format($item->total_price) }} vnd</td>
                        <td class="text-center">{{ $item->promotion->discount ?? 0 }} vnd</td>
                        <td class="text-center">{{number_format($item->total_price - ($item->promotion->discount ?? 0)) }} vnd</td>
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
                                <a data-tw-toggle="modal" data-tw-target="#modal{{$item->id}}"
                                   class="flex items-center text-success cursor-pointer">
                                    <svg viewBox="0 0 24 24" class="w-6 h-6 mr-1" fill="#ffffff"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                           stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M8.12673 3.56055C7.76931 3.24284 7.23069 3.24284 6.87327 3.56055C5.98775 4.34768 4.67284 4.38188 3.75 3.66317V20.337C4.67284 19.6183 5.98775 19.6525 6.87327 20.4396C7.23069 20.7573 7.76931 20.7573 8.12673 20.4396C9.05248 19.6167 10.4475 19.6167 11.3733 20.4396C11.7307 20.7573 12.2693 20.7573 12.6267 20.4396C13.5525 19.6167 14.9475 19.6167 15.8733 20.4396C16.2307 20.7573 16.7693 20.7573 17.1267 20.4396C18.0122 19.6525 19.3272 19.6183 20.25 20.337V3.66317C19.3272 4.38188 18.0122 4.34768 17.1267 3.56055C16.7693 3.24284 16.2307 3.24284 15.8733 3.56055C14.9475 4.38344 13.5525 4.38344 12.6267 3.56055C12.2693 3.24284 11.7307 3.24284 11.3733 3.56055C10.4475 4.38344 9.05248 4.38344 8.12673 3.56055ZM5.87673 2.43943C6.80248 1.61654 8.19752 1.61654 9.12327 2.43943C9.48069 2.75714 10.0193 2.75714 10.3767 2.43943C11.3025 1.61654 12.6975 1.61654 13.6233 2.43943C13.9807 2.75714 14.5193 2.75714 14.8767 2.43943C15.8025 1.61654 17.1975 1.61654 18.1233 2.43943C18.4807 2.75714 19.0193 2.75714 19.3767 2.43943C20.2963 1.62202 21.75 2.27482 21.75 3.50519V20.495C21.75 21.7253 20.2963 22.3781 19.3767 21.5607C19.0193 21.243 18.4807 21.243 18.1233 21.5607C17.1975 22.3836 15.8025 22.3836 14.8767 21.5607C14.5193 21.243 13.9807 21.243 13.6233 21.5607C12.6975 22.3836 11.3025 22.3836 10.3767 21.5607C10.0193 21.243 9.48069 21.243 9.12327 21.5607C8.19752 22.3836 6.80248 22.3836 5.87673 21.5607C5.51931 21.243 4.98069 21.243 4.62327 21.5607C3.70369 22.3781 2.25 21.7253 2.25 20.495V3.50519C2.25 2.27482 3.70369 1.62202 4.62327 2.43943C4.98069 2.75714 5.51931 2.75714 5.87673 2.43943ZM6.75 8.50017C6.75 8.08595 7.08579 7.75017 7.5 7.75017H16.5C16.9142 7.75017 17.25 8.08595 17.25 8.50017C17.25 8.91438 16.9142 9.25017 16.5 9.25017H7.5C7.08579 9.25017 6.75 8.91438 6.75 8.50017ZM6.75 12.0002C6.75 11.586 7.08579 11.2502 7.5 11.2502H16.5C16.9142 11.2502 17.25 11.586 17.25 12.0002C17.25 12.4144 16.9142 12.7502 16.5 12.7502H7.5C7.08579 12.7502 6.75 12.4144 6.75 12.0002ZM6.75 15.5002C6.75 15.086 7.08579 14.7502 7.5 14.7502H16.5C16.9142 14.7502 17.25 15.086 17.25 15.5002C17.25 15.9144 16.9142 16.2502 16.5 16.2502H7.5C7.08579 16.2502 6.75 15.9144 6.75 15.5002Z"
                                                  fill="#1C274C"></path>
                                        </g>
                                    </svg>
                                    Xem chi tiết </a>
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
    {{-- Modal--}}
    <!-- BEGIN: Modal Toggle -->
    <!-- END: Modal Toggle --> <!-- BEGIN: Modal Content -->
    @foreach($data as $item)
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
                                class="btn btn-primary ">In hóa đơn</button></a>
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
                                                {{ $detail->price }} VND</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="sm:text-left sm:ml-auto py-5" style="text-align: right">
                            <div class="text-base">Tổng tiền: {{ $item->total_price }} VND</div>
                            <div class="text-base">Giảm giá: {{ $item->promotion->discount ?? 0 }} VND</div>
                            <hr>
                            <div class="text-lg	">Số tiền phải thanh toán:
                                {{ $item->total_price - ($item->promotion->discount ?? 0) }} VND</div>
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
        {{-- @include('admin.BillManagement.modal') --}}
    @endforeach
@endsection


