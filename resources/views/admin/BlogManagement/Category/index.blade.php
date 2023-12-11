@extends('admin.templates.app')
@section('title', 'Dánh sách danh mục tin tức')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách danh mục tin tức
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.blogManagement.category.create') }}" class="btn btn-primary">Thêm mới danh mục</a>
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
        @foreach ($list_blog_category as $key => $category)
            <div class="intro-y col-span-12 md:col-span-6 category_blog">
                <div class="box">
                    <div class="flex flex-col lg:flex-row items-center p-5">
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="#" class="font-medium">{{ $category->title }}</a>
                        </div>
                        <div class="flex mt-4 lg:mt-0">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3"
                                    href="{{ route('admin.blogManagement.category.edit', $category->id) }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                    Sửa </a>

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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $list_blog_category->links('pagination::bootstrap-4') }}
            </nav>
        </div>
        <!-- END: Pagination -->
        <script>
            // Sử dụng hàm sendAjaxRequest để xác nhận và xoá phần tử
            $('.delete-form').on('submit', function(e) {
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
                        }, function(response) {
                            if (response.success) {
                                toastr.success(response.success);
                                form.closest('.category_blog').remove();
                            }
                        }, function(error) {
                            showErrors(error);
                        });
                    }
                });
            });
        </script>
    </div>
@endsection
@section('js_footer_custom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
@endsection
