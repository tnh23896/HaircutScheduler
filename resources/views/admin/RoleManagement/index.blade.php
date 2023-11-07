@extends('admin.templates.app')
@section('title', 'Quản lý vai trò')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách vai trò quản trị viên
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.RoleManagement.create') }}" class="btn btn-primary">Thêm mới</a>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">Tên Vai Trò</th>
                        <th class="text-center whitespace-nowrap">Hành Động</th>
                    </tr>
                </thead>
                @foreach ($roles as $item)
                    <tbody>
                        <tr class="intro-x">
                            <td class="text-center"><a class="flex items-center justify-center"
                                    href="">{{ $item->name }}</a></td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3"
                                        href="{{ route('admin.RoleManagement.edit', $item->id) }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                        Sửa </a>

                                    <form class="delete-form" action="{{ route('admin.RoleManagement.delete', $item->id) }}"
                                        method="POST">
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
                    title: 'Bạn có muốn xóa?',
                    text: 'Nếu xóa sẽ mất vĩnh viễn?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Đúng!',
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
        </script>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $roles->links('pagination::bootstrap-4') }}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection

