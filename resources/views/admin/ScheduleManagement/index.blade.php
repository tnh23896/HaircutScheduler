@extends('admin.templates.app')
@section('title', 'Danh sách lịch đặt')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách lịch đặt
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.scheduleManagement.create') }}"><button class="btn btn-primary shadow-md mr-2">Thêm lịch
                    đặt</button></a>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex flex-wrap items-center mt-3 xl:mt-0">
                {{-- Form tìm kiếm theo ngày và giờ --}}
                <form action="{{ route('admin.scheduleManagement.searchDateTime') }}" method="GET" class="mr-3">
                    <div class="w-full relative text-slate-500 flex items-center">
                        <input type="date" name="day" class="form-control box w-40 sm:w-auto mr-2"
                            value="{{ request('day') }}">
                        <input type="time" name="time" class="form-control w-40 sm:w-auto box pr-10"
                            value="{{ request('time') }}">
                        <button type="submit">
                            <i class="w-5 h-5 absolute my-auto inset-y-0 mr-3 right-0 top-0" data-lucide="search"></i>
                        </button>
                    </div>
                </form>
                {{-- Form tìm kiếm theo tên và số điện thoại --}}
                <form action="{{ route('admin.scheduleManagement.search') }}" method="GET" class="mr-2">
                    <div class="w-full relative text-slate-500 flex items-center">
                        <input type="text" name="search" class="form-control w-40 sm:w-auto box pr-10"
                            placeholder="Tìm kiếm..." value="{{ request('search') }}">
                        <button type="submit">
                            <i class="w-5 h-5 absolute my-auto inset-y-0 mr-3 right-0 top-0" data-lucide="search"></i>
                        </button>
                    </div>
                </form>
                {{-- Form lọc theo trạng thái --}}
                <form id="filterForm" action="{{ route('admin.scheduleManagement.filter') }}" method="GET">
                    <select id="filterSelect" name="filter" class="w-40 sm:w-auto form-select box" onchange="submitForm()">
                        <option value="">Tất cả</option>
                        <option value="pending">Chưa xác nhận</option>
                        <option value="confirmed">Đã xác nhận</option>
                        <option value="waiting">Đang chờ cắt</option>
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
                        <th class="text-center whitespace-nowrap">Giá gốc</th>
                        <th class="text-center whitespace-nowrap">Số tiền thanh toán</th>
                        <th class="text-center whitespace-nowrap">Lịch đặt</th>
                        <th class="text-center whitespace-nowrap">Thời gian tạo đơn</th>
                        <th class="text-center whitespace-nowrap">Trạng thái</th>
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
                                    href="javascript:;">{{ $item->admin->username ?? '' }}</a></td>
                            <td class="text-center whitespace-nowrap">{{ number_format($item->total_price) }} vnd</td>
                            <td class="text-center whitespace-nowrap">
                                {{ number_format($item->total_price - ($item->promotion->discount ?? 0)) }} vnd</td>
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
                            <td class="text-center">
                                <form class="ajaxForm{{ $item->id }}" enctype="multipart/form-data">
                                    <input  name="name" type="text" class="form-control w-full"
                                        placeholder="Input text" value="{{ $item->name }}" disabled hidden>
                                    <input id="" type="text" name="name_staff" class="name_staff form-control w-full"
                                        placeholder="Input text" value="{{ $item->admin->username ?? '' }}" disabled
                                        hidden>
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
                                    <input  type="text" class="form-control w-full"
                                        placeholder="Input text" value="{{ $item->total_price }}" name="price"
                                        disabled hidden>
                                    <input name="schedule_time" type="text"
                                        class="form-control w-full" placeholder="Input text"
                                        value="{{ $item->time }} {{ $item->day }}" disabled hidden>
                                    <input name="created_at" type="text" class="form-control w-full"
                                        placeholder="Input text" value="{{ $item->created_at }}" disabled hidden>
                                    <select class="statusSelect form-select w-full" data-id="{{ $item->id }}"
                                        data-current-status="{{ $item->status }}">
                                        @if ($item->status == 'pending')
                                            <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>
                                                Chưa
                                                xác
                                                nhận</option>
                                            <option value="confirmed">Đã xác nhận</option>
                                            <option value="canceled">Đã hủy</option>
                                        @elseif ($item->status == 'confirmed')
                                            <option value="confirmed"
                                                {{ $item->status == 'confirmed' ? 'selected' : '' }}>
                                                Đã
                                                xác nhận</option>
                                            <option value="waiting">Đang chờ cắt</option>
                                        @elseif ($item->status == 'waiting')
                                            <option value="waiting" {{ $item->status == 'waiting' ? 'selected' : '' }}>
                                                Đang
                                                chờ
                                                cắt</option>
                                            <option value="success">Đã hoàn thành</option>
                                            <option value="canceled">Đã hủy</option>
                                        @elseif ($item->status == 'success')
                                            <option value="success" {{ $item->status == 'success' ? 'selected' : '' }}>Đã
                                                hoàn
                                                thành</option>
                                        @elseif ($item->status == 'canceled')
                                            <option value="canceled" {{ $item->status == 'canceled' ? 'selected' : '' }}>
                                                Đã
                                                hủy
                                            </option>
                                        @endif
                                    </select>
                                </form>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @if ($item->status !== 'success' && $item->status !== 'canceled')
                                        <a class="flex items-center text-warning mr-3" id="editBtn{{ $item->id }}"
                                            href="{{ route('admin.scheduleManagement.edit', $item->id) }}"> <i
                                                data-lucide="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                                    @endif
                                    <a href="{{ route('admin.scheduleManagement.scheduleDetails', $item->id) }}"
                                        class="flex items-center text-success cursor-pointer">
                                        <svg viewBox="0 0 24 24" class="w-6 h-6 mr-1" fill="#ffffff"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
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
    <script>
        $(document).ready(function() {
            $(".statusSelect").on("change", function() {
                var selectElement = $(this);
                var newStatus = selectElement.val();
                var editId = selectElement.data("id");
                var checkid =$(this).closest('form');
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
                        formData.append('name_staff', checkid.find('input[name="name_staff"]').val());
                        formData.append('user_id', checkid.find('input[name="user_id"]').val());
                        formData.append('admin_id', checkid.find('input[name="admin_id"]').val());
                        formData.append('phone', checkid.find('input[name="phone"]').val());
                        formData.append('promo_id', checkid.find('input[name="promo_id"]').val());
                        formData.append('email', checkid.find('input[name="email"]').val());
                        formData.append('price', checkid.find('input[name="price"]').val());
                        formData.append('schedule_time', checkid.find('input[name="schedule_time"]').val());
                        formData.append('created_at', checkid.find('input[name="created_at"]').val());

                        var url =
                            "{{ route('admin.scheduleManagement.updateStatus', ':editId') }}";
                        url = url.replace(':editId', editId);

                        sendAjaxRequest(url, 'POST', formData,
                            function(response) {
                                if (response.success) {
                                    toastr.success(response.success);

                                    // Cập nhật trạng thái hiện tại của select box
                                    selectElement.data("current-status", newStatus);

                                    // Thực hiện logic cập nhật trạng thái dựa trên kết quả trả về
                                    updateSelectOptions(selectElement, newStatus, hideEdit);

                                    console.log(response);
                                }
                            },
                            function(error) {
                                showErrors(error);
                                console.log(error);
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
                            '<option value="canceled">Đã hủy</option>' +
                            '<option value="pending" selected>Chưa xác nhận</option>');
                        break;
                    case 'confirmed':
                        selectElement.html('<option value="confirmed" selected>Đã xác nhận</option>' +
                            '<option value="waiting">Đang chờ cắt</option>');
                        break;
                    case 'waiting':
                        selectElement.html('<option value="waiting" selected>Đang chờ cắt</option>' +
                            '<option value="success">Đã hoàn thành</option>' +
                            '<option value="canceled">Đã hủy</option>');
                        break;
                    case 'canceled':
                        selectElement.html('<option value="canceled" selected>Đã hủy</option>');
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
                        return 'Đang chờ cắt';
                    case 'canceled':
                        return 'Đã hủy';
                    case 'success':
                        return 'Đã hoàn thành';
                    default:
                        return status; // Trả về trạng thái nguyên thủy nếu không khớp với các trường hợp trên
                }
            }




        });
    </script>

    {{-- Modal --}}
    <!-- BEGIN: Modal Toggle -->
    <!-- END: Modal Toggle --> <!-- BEGIN: Modal Content -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
