@extends('admin.templates.app')
@section ('title','Cập nhật lịch đặt')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Chỉnh sửa thông tin lịch hẹn
        </h2>
    </div>
    <div id="errorDiv" class="alert alert-danger" style="display: none;"></div>
    <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="ajaxForm" enctype="multipart/form-data">
                <div class="intro-y box p-5">
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Tên Khách Hàng</label>
                        <input id="name" name="name" type="text" class="form-control w-full" placeholder="Input text"
                               value="{{$data->name}}" disabled>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Tên Nhân Viên</label>
                        <input id="name_staff" type="text" name="name_staff" class="form-control w-full"
                               placeholder="Input text"
                               value="{{$data->admin->username}}" disabled>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Tổng Tiền</label>
                        <input id="price" type="text" class="form-control w-full" placeholder="Input text"
                               value="{{$data->total_price}}" name="price" disabled>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label"> Lịch Đặt</label>
                        <input id="schedule_time" name="schedule_time" type="text" class="form-control w-full"
                               placeholder="Input text"
                               value="{{$data->time }} {{$data->day}}" disabled>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Thời gian tạo đơn</label>
                        <input id="created_at" name="created_at" type="text" class="form-control w-full"
                               placeholder="Input text"
                               value="{{$data->created_at}}" disabled>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-2" class="form-label">Trạng Thái</label>
                        <select data-placeholder="Select your favorite actors" name="status" class="tom-select w-full"
                                id="crud-form-2" @if($data->status == "success") disabled @endif>
                            @if($data->status == "pending")
                            <option
                                    value="pending"
                                    @if($data->status == "pending") selected
                                    @endif>
                                    Chưa xác nhận
                                </option>
                            @endif
                            @if($data->status == "pending" || $data->status == "confirmed")
                                <option
                                    value="confirmed"
                                    @if($data->status == "confirmed") selected
                                    @endif>
                                    Đã xác nhận
                                </option>
                            @endif



                            @if($data->status == "confirmed" || $data->status == "waiting")
                                <option
                                value="waiting"
                                    @if($data->status == "waiting") selected
                                    @endif>
                                Đang chờ cắt
                                </option>
                            @endif
                            @if($data->status == "waiting" || $data->status == "success")
                                <option value="success"
                                    @if($data->status == "success") selected
                                    @endif>
                                Đã hoàn thành
                                </option>
                            @endif
                            @if($data->status == "pending" || $data->status == "confirmed")
                                <option
                                value="canceled"
                                    @if($data->status == "canceled") selected
                                    @endif>
                                    Đã hủy
                                </option>
                            @endif
                        </select>
                    </div>

                    <div class="text-right mt-5">
                        <a href="{{route('admin.scheduleManagement.index')}}"
                           class="btn btn-outline-secondary w-32 mr-1">Quay Lại</a>
                        @if($data->status !== "success")
                            <button type="button" id="saveBtn" class="btn btn-primary w-32 text-white">Lưu thay đổi
                            </button>
                        @endif
                    </div>
                </div>
                <!-- END: Form Layout -->
            </form>
        </div>

    </div>

    <script>
        var editId = {{$data->id}};
        $('#saveBtn').on('click', function () {
            var formData = new FormData($('#ajaxForm')[0]);
            var url = "{{ route('admin.scheduleManagement.update', ['id' => ':editId']) }}";
                url = url.replace(':editId', editId);

                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                        }
                    },

                    function(error) {
                        showErrors(error);
                    }
                );
            });

    </script>

@endsection

