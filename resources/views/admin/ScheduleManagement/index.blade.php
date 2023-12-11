@extends('admin.templates.app')
@section('title', 'Danh sách lịch đặt')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách lịch đặt
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            @if(auth('admin')->user()->can('admin.scheduleManagement.create'))
                <a href="{{ route('admin.scheduleManagement.create') }}">
                    <button class="btn btn-primary shadow-md mr-2">Thêm lịch đặt</button>
                </a>
            @endif
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex flex-wrap items-center mt-3 xl:mt-0">
                {{-- Form tìm kiếm theo ngày và giờ --}}
                <form action="{{ route('admin.scheduleManagement.searchDateTime') }}" method="GET" class="mr-3">
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
                <form action="{{ route('admin.scheduleManagement.search') }}" method="GET" class="mr-2">
                    <div class="w-full relative text-slate-500 flex items-center">
                        <input type="text" name="search" class="form-control w-40 sm:w-auto box pr-10"
                               placeholder="Tìm kiếm..." value="{{ request('search') }}" style="border-color: #312E81">
                        <button type="submit">
                            <i class="w-5 h-5 absolute my-auto inset-y-0 mr-3 right-0 top-0" data-lucide="search"></i>
                        </button>
                    </div>
                </form>
                {{-- Form lọc theo trạng thái --}}
                <form id="filterForm" action="{{ route('admin.scheduleManagement.filter') }}" method="GET">
                    <select id="filterSelect" name="filter" class="w-40 sm:w-auto form-select box"
                            onchange="submitForm()" style="border-color: #312E81">
                        <option value="">Tất cả</option>
                        <option value="pending">Chưa xác nhận</option>
                        <option value="confirmed">Đã xác nhận</option>
                        <option value="waiting">Đang cắt</option>
                        <option value="success">Đã hoàn thành</option>
                        <option value="canceled">Đã hủy</option>
                    </select>
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
                    <th class="text-center whitespace-nowrap">Tổng tiền</th>
                    <th class="text-center whitespace-nowrap">Đã thanh toán</th>
                    <th class="text-center whitespace-nowrap">Lịch đặt</th>
                    <th class="text-center whitespace-nowrap">Thanh toán</th>
                    <th class="text-center whitespace-nowrap">Trạng thái</th>
                    @if(auth('admin')->user()->can('admin.scheduleManagement.edit') || auth('admin')->user()->can('admin.scheduleManagement.scheduleDetails.index'))
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    @endif
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
                        <td class="text-center whitespace-nowrap">{{ number_format($item->total_price) }} VND</td>
                        <td class="text-center whitespace-nowrap">{{ number_format($item->amount_paid) }} VND</td>
                        <td class="w-40">
                            <div class="flex items-center justify-center text-center">
                                {{ \Carbon\Carbon::parse($item->time)->format('H:i') }}
                                <br>
                                {{ \Carbon\Carbon::parse($item->day)->format('d/m/Y') }}
                            </div>
                        </td>
                        <td class="text-center">
                            @if ($item->payment == 'offline')
                                <span class="badge">Tại cửa hàng</span>
                            @elseif ($item->payment == 'vnpay')
                                <span class="badge">VNPAY</span>
                            @elseif($item->payment == 'momo')
                                <span class="badge">MOMO</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <form class="ajaxForm{{ $item->id }}" enctype="multipart/form-data">
                                <input name="name" type="text" class="form-control w-full"
                                       placeholder="Input text" value="{{ $item->name }}" disabled hidden>
                                <input id="" type="text" name="name_staff"
                                       class="name_staff form-control w-full" placeholder="Input text"
                                       value="{{ $item->admin->username ?? '' }}" disabled hidden>
                                <input type="text" name="user_id" class="form-control w-full"
                                       value="{{ $item->user_id }}" hidden>
                                <input type="text" name="admin_id" class="form-control w-full"
                                       value="{{ $item->admin_id }}" hidden>
                                <input type="text" name="phone" class="form-control w-full"
                                       value="{{ $item->phone }}" hidden>
                                <input type="text" name="promo_id" class="form-control w-full"
                                       value="{{ $item->promo_id }}" hidden>
                                <input type="text" name="email" class="form-control w-full"
                                       value="{{ $item->email }}" hidden>
                                <input type="text" class="form-control w-full" placeholder="Input text"
                                       value="{{ $item->total_price }}" name="price" disabled hidden>
                                <input type="text" class="form-control w-full" placeholder="Input text"
                                       value="{{ $item->amount_paid }}" name="amount_paid" disabled hidden>
                                <input type="text" class="form-control w-full" placeholder="Input text"
                                       value="{{ $item->payment }}" name="payment" disabled hidden>
                                <input name="schedule_time" type="text" class="form-control w-full"
                                       placeholder="Input text" value="{{ $item->time }} {{ $item->day }}"
                                       disabled hidden>
                                <input name="created_at" type="text" class="form-control w-full"
                                       placeholder="Input text" value="{{ $item->created_at }}" disabled hidden>
                                <select class="statusSelect form-select w-full" data-id="{{ $item->id }}"
                                        data-current-status="{{ $item->status }}" style="border-color: #1E283B">
                                    @if ($item->status == 'pending')
                                        <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>
                                            Chưa
                                            xác
                                            nhận
                                        </option>
                                        <option value="confirmed">Đã xác nhận</option>
                                        <option value="canceled">Hủy đơn</option>
                                    @elseif ($item->status == 'confirmed')
                                        <option value="confirmed"
                                            {{ $item->status == 'confirmed' ? 'selected' : '' }}>
                                            Đã
                                            xác nhận
                                        </option>
                                        <option value="waiting">Đang cắt</option>
                                        <option value="canceled">Hủy đơn</option>
                                    @elseif ($item->status == 'waiting')
                                        <option value="waiting" {{ $item->status == 'waiting' ? 'selected' : '' }}>
                                            Đang cắt
                                        </option>
                                        <option value="success">Đã hoàn thành</option>
                                    @elseif ($item->status == 'success')
                                        <option value="success" {{ $item->status == 'success' ? 'selected' : '' }}>Đã
                                            hoàn
                                            thành
                                        </option>
                                    @elseif ($item->status == 'canceled')
                                        <option value="canceled" {{ $item->status == 'canceled' ? 'selected' : '' }}>
                                            Hủy đơn
                                        </option>
                                    @endif
                                </select>
                            </form>
                        </td>
                        <td class="text-center">
                            @if (auth('admin')->user()->can('admin.scheduleManagement.edit'))
                            @if ($item->status !== 'success' && $item->status !== 'canceled')
                                <a style="color: #312E81" class="flex items-center mr-3" id="editBtn{{ $item->id }}"
                                   href="{{ route('admin.scheduleManagement.edit', $item->id) }}"> <i
                                        data-lucide="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                            @endif
                            @endif
                            @if(auth('admin')->user()->can('admin.scheduleManagement.scheduleDetails.index'))
                            <a class="flex items-center mr-auto mt-3 text-lime-500
                                "
                               href="{{ route('admin.scheduleManagement.scheduleDetails.index', $item->id) }}">
                                <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                Chi tiết dịch vụ</a>
                                @endif
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
    <script>
        $(document).ready(function () {
            $(".statusSelect").on("change", function () {
                var selectElement = $(this);
                var newStatus = selectElement.val();
                var editId = selectElement.data("id");
                var checkid = $(this).closest('form');
                const hideEdit = $(this).closest('td').next().find('a').first();
                Swal.fire({
                    title: 'Chuyển trạng thái?',
                    text: `Bạn có chắc muốn chuyển trạng thái thành ${getStatusNameInVietnamese(newStatus)}?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Hủy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formData = new FormData();
                        formData.append("status", newStatus);
                        formData.append('name', checkid.find('input[name="name"]').val());
                        formData.append('name_staff', checkid.find('input[name="name_staff"]')
                            .val());
                        formData.append('user_id', checkid.find('input[name="user_id"]').val());
                        formData.append('admin_id', checkid.find('input[name="admin_id"]').val());
                        formData.append('phone', checkid.find('input[name="phone"]').val());
                        formData.append('promo_id', checkid.find('input[name="promo_id"]').val());
                        formData.append('email', checkid.find('input[name="email"]').val());
                        formData.append('price', checkid.find('input[name="price"]').val());
                        formData.append('amount_paid', checkid.find('input[name="amount_paid"]').val());
                        formData.append('schedule_time', checkid.find('input[name="schedule_time"]')
                            .val());
                        formData.append('created_at', checkid.find('input[name="created_at"]')
                            .val());

                        var url =
                            "{{ route('admin.scheduleManagement.updateStatus', ':editId') }}";
                        url = url.replace(':editId', editId);

                        sendAjaxRequest(url, 'POST', formData,
                            function (response) {
                                if (response.success) {
                                    toastr.success(response.success);
                                    // Cập nhật trạng thái hiện tại của select box
                                    selectElement.data("current-status", newStatus);
                                    // Thực hiện logic cập nhật trạng thái dựa trên kết quả trả về
                                    updateSelectOptions(selectElement, newStatus, hideEdit);
                                }
                            },
                            function (error) {
                                showErrors(error);
                            }
                        );
                    } else {
                        var currentStatus = selectElement.data("current-status");
                        selectElement.val(currentStatus);
                    }
                });
            });

            // Hàm cập nhật tùy chọn của select box dựa trên trạng thái mới
            function updateSelectOptions(selectElement, newStatus, hideEdit) {
                switch (newStatus) {
                    case 'pending':
                        selectElement.html('<option value="confirmed">Đã xác nhận</option>' +
                            '<option value="canceled">Hủy đơn</option>' +
                            '<option value="pending" selected>Chưa xác nhận</option>');
                        break;
                    case 'confirmed':
                        selectElement.html('<option value="confirmed" selected>Đã xác nhận</option>' +
                            '<option value="waiting">Đang cắt</option>' +
                            '<option value="canceled">Hủy đơn</option>');
                        break;
                    case 'waiting':
                        selectElement.html('<option value="waiting" selected>Đang cắt</option>' +
                            '<option value="success">Đã hoàn thành</option>');
                        break;
                    case 'canceled':
                        selectElement.html('<option value="canceled" selected>Hủy đơn</option>');
                        hideEdit.hide();
                        break;
                    case 'success':
                        selectElement.html('<option value="success" selected>Đã hoàn thành</option>');
                        hideEdit.hide();
                        break;
                    default:
                        // Thêm logic xử lý cho trường hợp khác nếu cần
                        break;
                }
            }

            // Hàm để lấy tên trạng thái bằng tiếng Việt
            function getStatusNameInVietnamese(status) {
                switch (status) {
                    case 'pending':
                        return 'Chưa xác nhận';
                    case 'confirmed':
                        return 'Đã xác nhận';
                    case 'waiting':
                        return 'Đang cắt';
                    case 'canceled':
                        return 'Hủy đơn';
                    case 'success':
                        return 'Đã hoàn thành';
                    default:
                        return status; // Trả về trạng thái nguyên thủy nếu không khớp với các trường hợp trên
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            var filterSelect = document.getElementById('filterSelect');
            var urlParams = new URLSearchParams(window.location.search);
            var filterValue = urlParams.get('filter');
            var selectedValue = filterValue !== null ? filterValue : "";
            filterSelect.value = selectedValue;
        });

        function submitForm() {
            document.getElementById('filterForm').submit();
        }
    </script>
@endsection
