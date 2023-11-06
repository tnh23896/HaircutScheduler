@extends('admin.templates.app')
@section('title', 'Danh sách dịch vụ')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh mục dịch vụ
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.serviceManagement.service.create') }}" class="btn btn-primary">Thêm mới dịch vụ</a>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <form action="{{route('admin.serviceManagement.service.search')}}" method="GET">
                    <div class="w-56 relative text-slate-500 flex items-center">
                        <input type="text" name="search" class="form-control w-56 box pr-10" placeholder="Tìm kiếm..."
                               value="{{ request('search') }}">
                        <button type="submit">
                            <i class="w-5 h-5 absolute my-auto inset-y-0 mr-3 right-0 top-0"
                               data-lucide="search"></i>
                        </button>
                    </div>
                </form>
                <form id="categoryFilter" action="{{ route('admin.serviceManagement.service.filter') }}" method="GET">
                    <select id="filterCategorySelect" name="filter" class="tom-select w-56 xl:w-auto box ml-2" style="width: 150px" onchange="submitForm()">
                        <option selected>Danh mục</option>
                        @foreach($categoryService as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
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
                    <th class="whitespace-nowrap">
                        <input class="form-check-input" type="checkbox">
                    </th>
                    <th class="whitespace-nowrap">Hình ảnh</th>
                    <th class="text-center whitespace-nowrap">Tên</th>
                    <th class="text-center whitespace-nowrap">Giá</th>
                    <th class="text-center whitespace-nowrap">Mô tả</th>
                    <th class="text-center whitespace-nowrap">Danh mục</th>
                    <th class="text-center whitespace-nowrap">Giảm giá</th>
                    <th class="text-center whitespace-nowrap">Hành động</th>
                </tr>
                </thead>
                @foreach ($services as $service)
                    <tbody>
                    <tr class="intro-x">
                        <td class="w-10">
                            <input class="form-check-input" type="checkbox">
                        </td>
                        <td class="!py-3.5">
                            <img alt="Image service" class="w-20 h-auto rounded" src="{{ asset($service->image) }}"
                                 title="{{ $service->created_at }}">
                        </td>
                        <td class="text-center">
                            <a class="flex items-center justify-center" href="">{{ $service->name }}</a>
                        </td>
                        <td class="text-center capitalize">{{ $service->price }}</td>
                        <td class="text-center capitalize">{{ $service->description }}</td>
                        <td class="text-center capitalize">{{ $service->category_services->name ?? '' }}</td>
                        <td class="text-center capitalize">{{ $service->percentage_discount }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3"
                                   href="{{ route('admin.serviceManagement.service.edit', $service->id) }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                    Sửa </a>
                                <form class="delete-form"
                                      action="{{ route('admin.serviceManagement.service.delete', $service->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2 xl:col-span-1">
                                        <button type="submit" class="flex items-center text-danger"
                                                data-id="{{ $service->id }}">
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
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var filterCategorySelect = document.getElementById('filterCategorySelect');
                var urlParams = new URLSearchParams(window.location.search);
                var filterValue = urlParams.get('filter');
                var selectedValue = filterValue !== null ? filterValue : "";
                filterCategorySelect.value = selectedValue;
            });


            function submitForm() {
                document.getElementById('categoryFilter').submit();
            }
        </script>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $services->links('pagination::bootstrap-4') }}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
@section('js_footer_custom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
@endsection
