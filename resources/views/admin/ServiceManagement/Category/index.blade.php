@extends('admin.templates.app')
@section('title', 'Create Category Services')
@section('content')
    <!-- END: Top Bar -->
        <h2 class="intro-y text-lg font-medium mt-10">
            Category Service List
        </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.serviceManagement.category.create') }}" class="btn btn-primary">Add Category</a>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
                <select class="w-56 xl:w-auto form-select box ml-2">
                    <option>Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
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
                        <th class="whitespace-nowrap">Image</th>
                        <th class="text-center whitespace-nowrap">Name</th>
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                @foreach ($category_service as $category)
                    <tbody>
                        <tr class="intro-x">
                            <td class="w-10">
                                <input class="form-check-input" type="checkbox">
                            </td>
                            <td class="!py-3.5">
                                    <img alt="Image Category" class="w-24 h-20 rounded"
                                        src="{{ asset($category->image) }}" title="{{ $category->created_at }}">
                            </td>
                            <td class="text-center"><a class="flex items-center justify-center"
                                    href="">{{ $category->name }}</a></td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3"
                                        href="{{ route('admin.serviceManagement.category.edit', $category->id) }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                        Edit </a>

                                    <form class="delete-form"
                                        action="{{ route('admin.serviceManagement.category.delete', $category->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2 xl:col-span-1">
                                            <button type="submit" class="flex items-center text-danger"
                                                data-id="{{ $category->id }}">
                                                <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                            <td class="text-center capitalize"></td>
                            <td class="w-40">
                                <div class="flex items-center justify-center text-danger"></div>
                            </td>
                            <td class="text-center"></td>
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
                    title: 'Are you sure?',
                    text: 'Are you sure to delete this item?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Nếu xác nhận xoá, thực hiện Ajax request bằng hàm sendAjaxRequest
                        sendAjaxRequest(urlToDelete, 'DELETE', {
                            _method: 'DELETE'
                        }, function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Successfully',
                                    text: response.success,
                                    icon: 'success',
                                }).then(() => {
                                    // Xoá phần tử khỏi giao diện sau khi xoá thành công
                                    form.closest('tr').remove();
                                });
                            }
                        }, function(error) {
                            alert('Error deleting item.');
                        });
                    }
                });
            });
        </script>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <div style="display: flex;justify-content: center;width: 100%;">
                {{ $category_service->links() }}
            </div>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
@section('js_footer_custom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
@endsection
