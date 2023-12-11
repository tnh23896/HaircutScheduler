@extends('admin.templates.app')
@section('title', 'Dánh sách danh mục tin tức')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách danh mục tin tức
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            @if(auth('admin')->user()->can('admin.blogManagement.category.create'))
                <a href="{{ route('admin.blogManagement.category.create') }}" class="btn btn-primary">Thêm mới danh
                    mục</a>
            @endif
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <form action="{{ route('admin.blogManagement.category.search') }}" method="GET" class="mr-3">
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
                    <th class="whitespace-nowrap text-center">#</th>
                    <th class="text-center whitespace-nowrap">Tiêu đề</th>
                    @if(auth('admin')->user()->can('admin.blogManagement.category.edit') || auth('admin')->user()->can('admin.blogManagement.category.delete'))
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    @endif
                </tr>
                </thead>
                @foreach ($list_blog_category as $key => $category)
                    <tbody>
                    <tr class="intro-x">
                        <td class="text-center capitalize">{{ $loop->iteration }}</td>
                        <td class=""><a class="flex items-center justify-center"
                                        href="">{{ $category->title }}</a></td>
                        @if(auth('admin')->user()->can('admin.blogManagement.category.edit') || auth('admin')->user()->can('admin.blogManagement.category.delete'))
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @if(auth('admin')->user()->can('admin.blogManagement.category.edit'))
                                        <a class="flex items-center mr-3"
                                           href="{{ route('admin.blogManagement.category.edit', $category->id) }}">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                            Sửa </a>
                                    @endif
                                    @if(auth('admin')->user()->can('admin.blogManagement.category.delete'))
                                        <form class="delete-form"
                                              action="{{ route('admin.blogManagement.category.delete', $category->id) }}"
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
                                    @endif
                                </div>
                            </td>
                        @endif
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <script>
            // Sử dụng hàm sendAjaxRequest để xác nhận và xoá phần tử
            $('.delete-form').on('submit', function (e) {
                e.preventDefault();
                var form = $(this);
                var urlToDelete = form.attr('action');

                Swal.fire({
                    title: 'Xóa?',
                    text: 'Bạn chắc chắc muốn xoá?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Hủy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Nếu xác nhận xoá, thực hiện Ajax request bằng hàm sendAjaxRequest
                        sendAjaxRequest(urlToDelete, 'DELETE', {
                            _method: 'DELETE'
                        }, function (response) {
                            if (response.success) {
                                form.closest('tr').remove();
                                toastr.success(response.success);
                            }
                        }, function (error) {
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
                {{ $list_blog_category->links('pagination::bootstrap-4') }}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
@section('js_footer_custom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
@endsection
