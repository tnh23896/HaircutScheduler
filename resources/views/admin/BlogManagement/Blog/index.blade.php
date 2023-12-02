@extends('admin.templates.app')
@section('title', 'Danh sách tin tức')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách tin tức
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.blogManagement.blog.create') }}" class="btn btn-primary">Thêm mới tin tức</a>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <form action="{{ route('admin.blogManagement.blog.search') }}" method="GET" class="mr-3">
                    <div class="w-full relative text-slate-500 flex items-center">
                        <input type="text" name="search" class="form-control w-40 sm:w-auto box pr-10"
                            placeholder="Tìm kiếm..." value="{{ request('search') }}" style="border-color: #312E81">
                        <button type="submit">
                            <i class="w-5 h-5 absolute my-auto inset-y-0 mr-3 right-0 top-0" data-lucide="search"></i>
                        </button>
                    </div>
                </form>
                <form id="filterForm" action="{{ route('admin.blogManagement.blog.filter') }}" method="GET">
                    <select id="filterSelect" name="filter" class="w-40 sm:w-auto form-select box" onchange="submitForm()" style="border-color: #312E81">
                        <option value="">Tất cả</option>
                        @foreach ($categoryBlog as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        @foreach ($blogs as $blog)
        <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-4">
                <div class="mr-auto">
                    Danh mục: <a href="#" class="font-medium">{{ $blog->category_blog->title ?? '' }}</a>
                </div>
                <div class="dropdown ml-3">
                    <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-4 h-4"></i> </a>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li>
                                <a class="flex items-center mr-3 p-2"
                                href="{{ route('admin.blogManagement.blog.edit', $blog->id) }}">
                                <i data-lucide="edit-2" class="w-4 h-4 mr-1"></i>
                                Sửa </a>
                            </li>
                            <li>
                                <form class="delete-form p-2"
                                        action="{{ route('admin.blogManagement.blog.delete', $blog->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2 xl:col-span-1">
                                            <button type="submit" class="flex items-center text-danger"
                                                data-id="{{ $blog->id }}">
                                                <i data-lucide="trash-2" class="w-4 h-4 mr-2"></i> Xóa
                                            </button>
                                        </div>
                                    </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <div class="h-40 2xl:h-56 image-fit">
                    <img alt="image" class="rounded-md" src="{{ asset($blog->image) }}">
                </div>
                <a href="#" class="block font-medium text-base mt-5">{{ $blog->title }}</a>
                <div class="text-slate-600 dark:text-slate-500 mt-2">{{ $blog->description }}</div>
            </div>
        </div>
        @endforeach
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
                        // Nếu xác nhận xoá, thực hiện Ajax request bằng hàm sendAjaxRequest
                        sendAjaxRequest(urlToDelete, 'DELETE', {
                            _method: 'DELETE'
                        }, function(response) {
                            if (response.success) {
                                toastr.success(response.success);
                                form.closest('.box').remove();
                            }
                        }, function(error) {
                            showErrors(error);
                        });
                    }
                });
            });

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
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $blogs->links('pagination::bootstrap-4') }}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
@section('js_footer_custom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
@endsection
