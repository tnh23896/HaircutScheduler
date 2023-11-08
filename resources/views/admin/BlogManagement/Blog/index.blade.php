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
                <form action="{{route('admin.blogManagement.blog.search')}}" method="GET" class="mr-3">
                    <div class="w-full relative text-slate-500 flex items-center">
                        <input type="text" name="search" class="form-control w-40 sm:w-auto box pr-10"
                               placeholder="Tìm kiếm..."
                               value="{{ request('search') }}">
                        <button type="submit">
                            <i class="w-5 h-5 absolute my-auto inset-y-0 mr-3 right-0 top-0" data-lucide="search"></i>
                        </button>
                    </div>
                </form>
                <form id="filterForm" action="{{route('admin.blogManagement.blog.filter')}}" method="GET">
                    <select id="filterSelect" name="filter" class="w-40 sm:w-auto form-select box"
                            onchange="submitForm()">
                        <option value="">Tất cả</option>
                        @foreach($categoryBlog as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">Hình ảnh</th>
                    <th class="text-center whitespace-nowrap">Tiêu đề</th>
                    <th class="text-center whitespace-nowrap">Mô tả</th>
                    <th class="text-center whitespace-nowrap">Danh mục</th>
                    <th class="text-center whitespace-nowrap">Hành động</th>
                </tr>
                </thead>
                @foreach ($blogs as $blog)
                    <tbody>
                    <tr class="intro-x">
                        <td class="!py-3.5">
                            <img alt="Image blog" class="w-24 h-20 rounded" src="{{ asset($blog->image) }}"
                                 title="{{ $blog->created_at }}">
                        </td>
                        <td class="text-center"><a class="flex items-center justify-center"
                                                   href="">{{ $blog->title }}</a></td>
                        <td class="text-center"><a class="flex items-center justify-center"
                                                   href="">{{ $blog->description }}</a></td>
                        <td class="text-center"><a class="flex items-center justify-center"
                                                   href="">{{ $blog->category_blog->title ?? '' }}</a></td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3"
                                   href="{{ route('admin.blogManagement.blog.edit', $blog->id) }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                    Sửa </a>
                                <form class="delete-form"
                                      action="{{ route('admin.blogManagement.blog.delete', $blog->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2 xl:col-span-1">
                                        <button type="submit" class="flex items-center text-danger"
                                                data-id="{{ $blog->id }}">
                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </td>
                        <td class=""></td>
                        <td class="">
                            <div class=""></div>
                        </td>
                        <td class=""></td>
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
                        // Nếu xác nhận xoá, thực hiện Ajax request bằng hàm sendAjaxRequest
                        sendAjaxRequest(urlToDelete, 'DELETE', {
                            _method: 'DELETE'
                        }, function (response) {
                            if (response.success) {
                                toastr.success(response.success);
                                form.closest('tr').remove();
                            }
                        }, function (error) {
                            showErrors(error);
                        });
                    }
                });
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
