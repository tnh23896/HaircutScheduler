@extends('admin.templates.app')
@section ('title','Create Category Services')
@section('content')
<!-- END: Top Bar -->
<h2 class="intro-y text-lg font-medium mt-10">
    Danh sách nhân viên
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
        <a href="{{ route('admin.employee.create') }}" class="btn btn-primary shadow-md mr-2">Thêm nhân viên mới</a>
        <div class="dropdown">
            <button class="dropdown-toggle btn px-2 box" aria-expanded="false"
                data-tw-toggle="dropdown">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
                        data-lucide="plus"></i> </span>
            </button>
            <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li>
                        <a href="#" class="dropdown-item"> <i data-lucide="printer"
                                class="w-4 h-4 mr-2"></i> Print </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item"> <i data-lucide="file-text"
                                class="w-4 h-4 mr-2"></i> Export to Excel </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-item"> <i data-lucide="file-text"
                                class="w-4 h-4 mr-2"></i> Export to PDF </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="hidden xl:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
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
                    <th class="whitespace-nowrap">Avatar</th>
                    <th class="text-center whitespace-nowrap">Tên</th>
                    <th class="text-center whitespace-nowrap">Số điện thoại</th>
                    <th class="text-center whitespace-nowrap">Thời gian tạo</th>
                    <th class="text-center whitespace-nowrap">Hành động</th>
                </tr>
            </thead>
            <tbody id="dataContainer">
                @forEach($employees as $item)
                <tr class="intro-x">
                    <td class="w-10">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td class="!py-3.5">
                        <div class="flex items-center">
                            <div class="w-9 h-9 image-fit zoom-in">
                                <img alt="Midone - HTML Admin Template"
                                    class="rounded-lg border-white shadow-md tooltip"
                                    src="{{asset($item->avatar)}}"
                                    title="Uploaded at 29 May 2022">
                            </div>

                        </div>
                    </td>
                    <td class="text-center">
                        <div class="">
                            <a href="#"
                                class="font-medium whitespace-nowrap">{{$item->username}}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                {{$item->email}}</div>
                        </div>
                    </td>
                    <td class="text-center capitalize">{{$item->phone}}</td>
                    <td class="text-center">{{$item->created_at}}</td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3"
                                href="{{route('admin.work-schedule.index', ['id' => $item->id])}}"> <i
                                    data-lucide="calendar" class="w-4 h-4 mr-1"></i> Lịch </a>
                            <a class="flex items-center mr-3"
                                href="{{route('admin.employee.edit', $item)}}"> <i
                                    data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <button class="flex items-center text-danger delete-form"
                                data-id="{{$item->id}}"> <i data-lucide="trash-2"
                                    class="w-4 h-4 mr-1"></i> Delete </button>
                        </div>
                    </td>
                </tr>
                @endforEach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <nav class="w-full sm:w-auto sm:mr-auto">
            {{ $employees->links('pagination::bootstrap-4') }}
        </nav>
        <select class="w-20 form-select box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
</div>
@endsection

@section('js_footer_custom')
<script>
         $('.delete-form').on('click', function(e) {
            e.preventDefault();
            var form = $(this);
            var urlToDelete = "{{route('admin.employee.destroy', 'ID')}}";
            urlToDelete = urlToDelete.replace('ID', $(this).data('id'));
            
            // Hiển thị hộp thoại xác nhận
            Swal.fire({
                title: 'Bạn chắc chắn muốn xoá?',
                text: 'Chỉ khi nhân viên nghỉ làm rồi hãy xoá?',
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
                        if (response.status) {
                            Swal.fire({
                                title: 'Successfully',
                                text: response.message,
                                icon: response.status,
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
@endsection