@extends('admin.templates.app')
@section('title', 'Danh mục thời gian làm việc')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh mục thời gian làm việc
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.TimeManagement.create') }}"><button class="btn btn-primary shadow-md mr-2">Thêm mới thời
                    làm việc
                    gian</button></a>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <form action="{{route('admin.TimeManagement.search')}}" method="GET" class="mr-3">
                    <div class="w-full relative text-slate-500 flex items-center">
                        <input type="time" name="time" class="form-control w-40 sm:w-auto box pr-10"
                               placeholder="Tìm kiếm..."
                               value="{{ request('time') }}">
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
                        <th class="whitespace-nowrap text-center">Thời gian</th>
                        <th class="whitespace-nowrap text-center">Ca</th>
                        <th class="text-center whitespace-nowrap ">Hành động</th>
                    </tr>
                </thead>
                @foreach ($data as $key => $item)
                    <tbody>
                        <tr class="intro-x">
                            <td class="text-center capitalize">{{ $loop->iteration }}</td>
                            <td class="text-center capitalize"> {{ \Carbon\Carbon::parse($item->time)->format('H:i') }}</td>
                            <td class="text-center capitalize"> {{ $item->shift->name }}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('admin.TimeManagement.edit', $item->id) }}"
                                        class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square"
                                            class="w-4 h-4 mr-1"></i> Sửa </a>
                                    <form class="delete-form" action="{{ route('admin.TimeManagement.delete', $item->id) }}"
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
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $data->links('pagination::bootstrap-4') }}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
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
                            form.closest('tr').remove();
                        }
                    }, function(error) {
                        showErrors(error);
                    });
                }
            });
        });
    </script>
@endsection
