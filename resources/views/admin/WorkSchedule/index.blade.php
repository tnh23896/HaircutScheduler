<style>
    ::-webkit-scrollbar {
        width: 10px;
        height: 4px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
@extends('admin.templates.app')
@section('title', 'Lịch làm việc của nhân viên')
@section('content')
    <!-- END: Top Bar -->

    <div class="grid grid-cols-12 gap-6 mt-5">
        {{-- BEGIN: form create --}}
        <div class="intro-y col-span-12 lg:col-span-12">
            <h2 class="intro-y text-lg font-medium mt-10 mb-5">Thêm lịch làm việc cho nhân viên</h2>
            <!-- BEGIN: Form Layout -->
            <form id="crud-form" enctype="multipart/form-data" class="intro-y box p-5">
                <input type="hidden" name="admin_id" value="{{ $employee->id }}">
                <li
                    class="inline-block mb-5 relative pr-8 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-3 before:-translate-y-1/2 before:w-1 before:h-1 before:bg-gray-300 before:rounded-full dark:text-gray-400 dark:before:bg-gray-600">
                    <input type="date" class="form-control form-control-lg" name="day">
                </li>
                <ul class="text-sm text-gray-600">
                    @foreach ($times as $time)
                        <li
                            class="mb-2 mr-6 p-4 border-info inline-block relative pr-8 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-3 before:-translate-y-1/2 before:w-1 before:h-1 before:bg-gray-300 before:rounded-full dark:text-gray-400 dark:before:bg-gray-600">
                            <input type="checkbox" class="form-check-input w-6 h-6" style="border-color: #312E81" name="times[]"
                                value="{{ $time->id }}">
                            <span class="">{{ \Carbon\Carbon::parse($time->time)->format('H:i') }}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="text-left mt-5">

                    <button type="submit" class="btn btn-primary w-24">Lưu</button>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
        {{-- END: form create --}}
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Nhân viên
                {{ $employee->username }}:</h2>
            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                <li>
                    Email: {{ $employee->email }}
                </li>
                <li>
                    Số điện thoại: {{ $employee->phone }}
                </li>
            </ul>
            <div class="text-center">
                <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white mr-2">Chú thích:
                </h3>
                <div class="mt-3 flex w-40 mx-auto">
                    <div class="w-20 bg-success text-white text-center border-0">Rảnh</div>
                    <div class="w-20 bg-danger text-white text-center border-0">Bận</div>
                </div>
            </div>
            <div style="overflow-x: auto">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="text-center whitespace-nowrap">Ngày làm việc</th>
                            <th colspan="888" class="whitespace-nowrap" style="padding-left: 350px">Các khoảng thời gian
                                làm việc</th>
                        </tr>
                    </thead>
                    <tbody id="dataContainer">
                        @foreach ($workSchedules as $item)
                            <tr class="intro-x" data-id="{{ $item->id }}">
                                <td class="text-center border-r">{{ \Carbon\Carbon::parse($item->day)->format('d-m-Y') }}
                                </td>
                                @foreach ($item->times as $detail)
                                    <td class="text-center"><a
                                            href="{{ route('admin.work-schedule.show', ['work_schedule' => $item->id, 'time_id' => $detail->id]) }}"
                                            class="text-center {{ $detail->pivot->status == 'available' ? 'text-success' : 'text-danger' }}">
                                            {{ \Carbon\Carbon::parse($detail->time)->format('H:i') }} </a>
                                    </td>
                                @endforeach
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center gap-2">
                                        <div class="flex justify-center items-center">
                                            <a data-tw-toggle="modal" data-tw-target="#modal{{ $item->id }}"
                                                class="flex items-center text-success cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-check-square">
                                                    <polyline points="9 11 12 14 22 4" />
                                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
                                                </svg>
                                                Sửa </a>
                                        </div>
                                        <button class="flex items-center text-danger delete-form"
                                            data-id="{{ $item->id }}"> <svg xmlns="http://www.w3.org/2000/svg"
                                                width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-trash-2">
                                                <path d="M3 6h18" />
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                <line x1="10" x2="10" y1="11" y2="17" />
                                                <line x1="14" x2="14" y1="11" y2="17" />
                                            </svg>
                                            Xóa </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                <nav class="w-full sm:w-auto sm:mr-auto">
                    {{ $workSchedules->appends(['id' => $employee->id])->links('pagination::bootstrap-4') }}
                </nav>
            </div>
            <!-- END: Pagination -->
        </div>
        @foreach ($workSchedules as $item)
            @include('admin.WorkSchedule.modal')
        @endforeach
        <script>
            $(document).ready(function() {
                $('.delete-form').on('click', function(e) {
                    e.preventDefault();

                    var deleteForm = $(this);
                    var deleteUrl = "{{ route('admin.work-schedule.destroy', 'ID') }}";
                    deleteUrl = deleteUrl.replace('ID', $(this).data('id'));

                    Swal.fire({
                        title: 'Xóa?',
                        text: 'Bạn chắc chắc muốn xoá?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            sendAjaxRequest(deleteUrl, 'DELETE', {}, function(response) {
                                if (response.success) {
                                    toastr.success(response.success);
                                    deleteForm.closest('tr').remove();
                                }
                            }, function(error) {
                                showErrors(error);
                            });
                        }
                    });
                });
                $('#crud-form').on('submit', function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var url = "{{ route('admin.work-schedule.store') }}";
                    var method = "POST";
                    const formData = new FormData(this);
                    sendAjaxRequest(url, "POST", formData, function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            location.reload();
                        }
                    }, function(error) {
                        showErrors(error);
                    })
                })
                $('#crud-form-edit').on('submit', function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var url =
                        "{{ route('admin.work-schedule.update1', ['work_schedule' => 'workSchedule_id', 'id' => 'employee_id']) }}";
                    url = url.replace('workSchedule_id', $(this).data('id'));
                    url = url.replace('employee_id', "{{ $employee->id }}");
                    var method = "POST";
                    const formData = new FormData(this);
                    sendAjaxRequest(url, method, formData, function(response) {
                            if (response.success) {
                                toastr.success(response.success);
                                location.reload();
                            }
                        },
                        function(error) {
                            showErrors(error, "error-work-schedule-edit");
                        })
                })
            });
        </script>
    @endsection
