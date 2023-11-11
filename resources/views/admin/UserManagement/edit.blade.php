@extends('admin.templates.app')
@section('title', 'Chỉnh sửa người dùng')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Chỉnh sửa người dùng
        </h2>
    </div>
    <form id="ajaxForm">

        <div class="grid grid-cols-12 gap-6 mt-5">

            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Danh sách đen</label>
                        <select class="form-select w-full" name="black_status">
                            <option value="0" {{ $data->black_status == 0 ? 'selected' : '' }}>
                                Kích hoạt
                            </option>
                            <option value="1" {{ $data->black_status == 1 ? 'selected' : '' }}>
                                Không kích hoạt
                            </option>
                        </select>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('admin.UserManagement.index') }}"> <button type="button"
                                class="btn btn-outline-secondary w-24 mr-1">Danh sách</button></a>
                        <button type="button" id="saveBtn" class="btn btn-primary w-24">Lưu</button>
                    </div>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    </form>

    <script>
        $(function() {
            var editId = {{ $data->id }};
            $('#saveBtn').on('click', function() {
                var formData = new FormData($('#ajaxForm')[0]);
                var url = "{{ route('admin.UserManagement.update', ['id' => ':editId']) }}";
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
        });
    </script>
@endsection
