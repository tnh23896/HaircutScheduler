@extends('admin.templates.app')
@section('title', 'Banner')
@section('content')
    <!-- END: Top Bar -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Danh sách banner
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            @if(auth('admin')->user()->can('admin.banners.create'))
                <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('admin.banners.create') }}">Thêm mới
                        banner</a></button>
            @endif
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">Hình ảnh</th>
                    <th class=" whitespace-nowrap">Đường dẫn</th>
                    <th class=" whitespace-nowrap">Trạng thái</th>
                    @if(auth('admin')->user()->can('admin.banners.edit') || auth('admin')->user()->can('admin.banners.delete'))
                        <th class="text-center whitespace-nowrap">Hành động</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach ($banners as $banner)
                    <tr class="intro-x">
                        <td class="!py-3.5">
                            <img alt="Image" data-action="zoom"
                                 class="rounded-lg border-white shadow-md tooltip w-24 h-20 rounded"
                                 src="{{ asset($banner->image) }}" title="{{ $banner->updated_at }}">
                        </td>
                        <td class="!py-3.5">
                            {{ $banner->link }}
                        </td>
                        <td class="!py-3.5 status-text" data-banner-id="{{ $banner->id }}"
                            data-status="{{ $banner->status === 'active' ? 'inactive' : 'active' }}">
                            @if ($banner->status === 'active')
                                <div class="flex items-center text-success"><i data-lucide="check-square"
                                                                               class="w-4 h-4 mr-2"></i> Hoạt động
                                </div>
                            @else
                                <div class="flex items-center text-danger"><i data-lucide="x-circle"
                                                                              class="mr-2 w-4 h-4 mr-2 text-red-500"></i>
                                    Không hoạt động
                                </div>
                            @endif
                        </td>
                        @if(auth('admin')->user()->can('admin.banners.edit') || auth('admin')->user()->can('admin.banners.delete'))
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @if(auth('admin')->user()->can('admin.banners.edit'))
                                        <a class="flex items-center mr-3"
                                           href="{{ route('admin.banners.edit', $banner->id) }}">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                                    @endif
                                    @if(auth('admin')->user()->can('admin.banners.delete'))
                                        <form class="delete-form"
                                              action="{{ route('admin.banners.delete', $banner->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2 xl:col-span-1">
                                                <button type="submit" class="flex items-center text-danger"
                                                        data-id="{{ $banner->id }}">
                                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $banners->links('pagination::bootstrap-4') }}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>

    <script>
        $('.delete-form').on('submit', function (e) {
            e.preventDefault();
            var form = $(this);
            var urlToDelete = form.attr('action');

            Swal.fire({
                title: 'Xoá?',
                text: 'Bạn chắc chắn muốn xoá?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy',
            }).then((result) => {
                if (result.isConfirmed) {
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
