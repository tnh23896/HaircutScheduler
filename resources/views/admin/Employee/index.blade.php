@extends('admin.templates.app')
@section('title', 'Danh sách nhân viên')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách nhân viên
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            @if(auth('admin')->user()->can('admin.employee.create'))
                <a href="{{ route('admin.employee.create') }}" class="btn btn-primary shadow-md mr-2">Thêm nhân viên
                    mới</a>
            @endif
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <form action="{{ route('admin.employee.search') }}" method="GET" class="mr-3">
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
                    <th class="whitespace-nowrap">Mã nhân viên</th>
                    <th class="whitespace-nowrap">Ảnh đại diện</th>
                    <th class="text-center whitespace-nowrap">Tên</th>
                    <th class="text-center whitespace-nowrap">Số điện thoại</th>
                    <th class="text-center whitespace-nowrap">Vai trò</th>
                    <th class="text-center whitespace-nowrap">Thời gian tạo</th>
                    @if(auth('admin')->user()->can('admin.employee.edit') ||
                        auth('admin')->user()->can('admin.employee.delete') ||
                        auth('admin')->user()->can('admin.work-schedule.index'))
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    @endif
                </tr>
                </thead>
                <tbody id="dataContainer">
                @php $count = 1 @endphp
                @foreach ($employees as $item)
                    <tr class="intro-x">
                        <td class="w-10">
                            <div class="text-center">{{ $item->id < 10 ? 'NV-0' . $item->id : 'NV-' . $item->id }}</div>
                        </td>
                        <td class="!py-3.5">
                            <div class="flex items-center">
                                <div class="w-24 h-24 image-fit zoom-in">
                                    <img alt="ảnh" data-action="zoom" class="rounded-lg border-white shadow-md"
                                         src="{{ $item->avatar === '' ? asset('dist/images/default.jpg') : asset($item->avatar) }}">
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="">
                                <a href="#" class="font-medium whitespace-nowrap">{{ $item->username }}</a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    {{ $item->email }}</div>
                            </div>
                        </td>
                        <td class="text-center capitalize">{{ $item->phone }}</td>
                        <td class="text-center">
                            @if (!empty($item->getRoleNames()))
                                @foreach ($item->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td class="text-center">{{ $item->created_at }}</td>
                        @if(auth('admin')->user()->can('admin.employee.edit') ||
                        auth('admin')->user()->can('admin.employee.delete') ||
                        auth('admin')->user()->can('admin.work-schedule.index'))
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @if(auth('admin')->user()->can('admin.work-schedule.index'))
                                        <a class="flex items-center mr-3"
                                           href="{{ route('admin.work-schedule.index', ['id' => $item->id]) }}"> <i
                                                data-lucide="calendar" class="w-4 h-4 mr-1"></i> Lịch </a>
                                    @endif
                                    @if(auth('admin')->user()->can('admin.employee.edit'))
                                        <a class="flex items-center mr-3"
                                           href="{{ route('admin.employee.edit', $item) }}">
                                            <i
                                                data-lucide="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                                    @endif
                                    @if(auth('admin')->user()->can('admin.employee.destroy'))
                                        <button class="flex items-center text-danger delete-form"
                                                data-id="{{ $item->id }}">
                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xoá
                                        </button>
                                    @endif
                                </div>
                            </td>
                        @endif
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
        </div>
        <!-- END: Pagination -->
    </div>
@endsection

@section('js_footer_custom')
    <script>
        $('.delete-form').on('click', function (e) {
            e.preventDefault();
            var form = $(this);
            var urlToDelete = "{{ route('admin.employee.destroy', 'ID') }}";
            urlToDelete = urlToDelete.replace('ID', $(this).data('id'));
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
@endsection
