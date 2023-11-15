@extends('admin.templates.app')
@section('title', 'Danh sách danh mục dịch vụ')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách danh mục dịch vụ
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.serviceManagement.category.create') }}" class="btn btn-primary">Thêm danh mục dịch vụ</a>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <form action="{{route('admin.serviceManagement.category.search')}}" method="GET">
                <div class="w-56 relative text-slate-500 flex items-center">
                    <input type="text" name="search" class="form-control w-56 box pr-10" placeholder="Tìm kiếm..." value="{{ request('search') }}">
                    <button type="submit">
                        <i class="w-5 h-5 absolute my-auto inset-y-0 mr-3 right-0 top-0"
                           data-lucide="search"></i>
                    </button>
                </div>
            </form>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">Hình ảnh</th>
                        <th class="whitespace-nowrap">Tên</th>
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    </tr>
                </thead>
                @foreach ($category_service as $category)
                    <tbody>
                        <tr class="intro-x">
                            <td class="!py-3.5">
                                <img alt="Image Category" class="w-24 h-20 rounded" src="{{ asset($category->image) }}"
                                    title="{{ $category->created_at }}">
                            </td>
                            <td class=""><a class=""
                                    href="">{{ $category->name }}</a></td>

                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3"
                                       href="{{ route('admin.serviceManagement.category.edit', $category->id) }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                        Sửa </a>

                                    <form class="delete-form"
                                          action="{{ route('admin.serviceManagement.category.delete', $category->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2 xl:col-span-1">
                                            <button type="submit" class="flex items-center text-danger"
                                                    data-id="{{ $category->id }}">
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
                    title: 'Xoá?',
                    text: 'Bạn chắc chắn muốn xoá?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Hủy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Nếu xác nhận xoá, thực hiện Ajax request bằng hàm sendAjaxRequest
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
        </script>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $category_service->links('pagination::bootstrap-4') }}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
