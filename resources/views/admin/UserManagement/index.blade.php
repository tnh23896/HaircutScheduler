@extends('admin.templates.app')
@section('title', 'Danh sách người dùng')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách người dùng
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <form action="{{route('admin.UserManagement.search')}}" method="GET" class="mr-3">
                    <div class="w-full relative text-slate-500 flex items-center">
                        <input type="text" name="search" class="form-control w-40 sm:w-auto box pr-10"
                               placeholder="Tìm kiếm..."
                               value="{{ request('search') }}">
                        <button type="submit">
                            <i class="w-5 h-5 absolute my-auto inset-y-0 mr-3 right-0 top-0" data-lucide="search"></i>
                        </button>
                    </div>
                </form>

                <form id="filterForm" action="{{route('admin.UserManagement.filter')}}" method="GET">
                    <select id="filterSelect" name="filter" class="w-40 sm:w-auto form-select box" onchange="submitForm()">
                        <option value="">Tất cả</option>
                        <option value="0">Kích hoạt</option>
                        <option value="1">Không kích hoạt</option>
                    </select>
                </form>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap text-center">Tên người dùng</th>
                    <th class="whitespace-nowrap text-center">Điện thoại</th>
                    <th class="whitespace-nowrap text-center">Email</th>
                    <th class="whitespace-nowrap text-center">Trạng thái tài khoản</th>

                </tr>
                </thead>
                @foreach ($data as $key => $item)
                    <tbody>
                    <tr class="intro-x">
                        <td class="text-center capitalize">{{ $item->username }}</td>
                        <td class="text-center capitalize">{{ $item->phone }}</td>
                        <td class="text-center capitalize">{{ $item->email }}</td>
                        <td class="text-center capitalize">
                            <select class="statusSelect form-select w-full text-center w-40 sm:w-auto" data-id="{{ $item->id }}"
                                data-current-status="{{ $item->black_status }}">
                                <option value="0" {{ $item->black_status == 0 ? 'selected' : '' }}>
                                    Kích hoạt
                                </option>
                                <option value="1" {{ $item->black_status == 1 ? 'selected' : '' }}>
                                    Không kích hoạt
                                </option>
                            </select>
                        </td>
                        {{-- <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a href="{{ route('admin.UserManagement.edit', $item->id) }}"
                                   class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square"
                                                                                          class="w-4 h-4 mr-1"></i> Sửa
                                </a>
                            </div>
                        </td> --}}
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
                        formData.append("black_status", newStatus);
                        var url =
                            "{{ route('admin.UserManagement.update', ':editId') }}";
                            url = url.replace(':editId', editId);

                        sendAjaxRequest(url, 'POST', formData,
                            function(response) {
                                if (response.success) {
                                    toastr.success(response.success);
                                    // Cập nhật trạng thái hiện tại của select box
                                    selectElement.data("current-status", newStatus);
                                    // Thực hiện logic cập nhật trạng thái dựa trên kết quả trả về
                                    updateSelectOptions(selectElement, newStatus);
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
            function updateSelectOptions(selectElement, newStatus) {
                switch (newStatus) {
                    case '0':
                        selectElement.html('<option value="0">Kích hoạt</option>' +
                            '<option value="1">Không kích hoạt</option>' );
                        break;
                    case '1':
                        selectElement.html('<option value="1" selected>Không kích hoạt</option>' +
                            '<option value="0">Kích hoạt</option>');
                        break;
                    default:
                        // Thêm logic xử lý cho trường hợp khác nếu cần
                        break;
                }
            }

            // Hàm để lấy tên trạng thái bằng tiếng Việt
            function getStatusNameInVietnamese(status) {
                switch (status) {
                    case '0':
                        return 'Kích hoạt';
                    case '1':
                        return 'Không kích hoạt';
                    default:
                        return status; // Trả về trạng thái nguyên thủy nếu không khớp với các trường hợp trên
                }
            }
        });
    </script>

    <script>
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
