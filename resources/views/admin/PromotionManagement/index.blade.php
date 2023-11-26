@extends('admin.templates.app')
@section('title', 'Quản lý mã giảm giá')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách mã giảm giá
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.PromotionManagement.create') }}" class="btn btn-primary">Thêm mới mã giảm giá</a>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <form id="filterForm" action="{{ route('admin.PromotionManagement.filter') }}" method="GET">
                    <select class="w-56 xl:w-auto form-select box ml-2" name="filter" id="filterSelect"
                        onchange="submitForm()">
                        <option value="">Trạng thái</option>
                        <option value="active">Còn hạn</option>
                        <option value="inactive">Hết hạn</option>
                    </select>
                </form>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">Mã khuyến mãi</th>
                        <th class="text-center whitespace-nowrap">Giá trị</th>
                        <th class="text-center whitespace-nowrap">Ngày bắt đầu</th>
                        <th class="text-center whitespace-nowrap">Ngày kết thúc</th>
                        <th class="text-center whitespace-nowrap">Mô tả</th>
                        <th class="text-center whitespace-nowrap">Trạng thái</th>
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    </tr>
                </thead>
                @foreach ($data as $item)
                    <tbody>
                        <tr class="intro-x">
                            <td class="text-center"><a class="flex items-center justify-center"
                                    href="">{{ $item->promocode }}</a></td>
                            <td class="text-center whitespace-nowrap">{{ number_format($item->discount) }} VND</td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                            </td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($item->expire_date)->format('d/m/Y') }}
                            </td>
                            <td class="text-center capitalize">{{ $item->description }}</td>
                            <td class="text-center">
                                @if (\Carbon\Carbon::parse($item->expire_date) >= \Carbon\Carbon::today())
                                    <span class="badge badge-warning text-success">Còn hạn</span>
                                @else
                                    <span class="badge badge-info text-danger">Hết hạn</span>
                                @endif
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3"
                                        href="{{ route('admin.PromotionManagement.edit', $item->id) }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                        Sửa </a>

                                    <form class="delete-form"
                                        action="{{ route('admin.PromotionManagement.delete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2 xl:col-span-1">
                                            <button type="submit" class="flex items-center text-danger"
                                                data-id="{{ $item->id }}">
                                                <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <script>
            // Sử dụng hàm sendAjaxRequest để xác nhận và xoá phần tử
            $('.delete-form').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var urlToDelete = form.attr('action');
                // Hiển thị hộp thoại xác nhận
                Swal.fire({
                    title: 'Xóa?',
                    text: 'Bạn chắc chắc muốn xoá?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Hủy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        sendAjaxRequest(urlToDelete, 'DELETE', {
                            _method: 'DELETE'
                        }, function(response) {
                            if (response.success) {
                                toastr.success(response.success);
                                form.closest('tr').remove();
                            }
                        }, function(error) {
                            showErrors(error);
                        });
                    }
                });
            });
            //Lọc theo trạng thái
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
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $data->links('pagination::bootstrap-4') }}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
