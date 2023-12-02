@extends('admin.templates.app')
@section('title', 'Thêm mới vai trò')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm vai trò mới
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="ajaxForm" enctype="multipart/form-data">
                <div class="intro-y box p-5">
                    <div class="mb-4">
                        <label for="crud-form-1" class="form-label">Tên vai trò <span style="color: red">*</span></label>
                        <input type="text" name="name" id="name" class="clearable form-control w-full"
                            placeholder="Tên vai trò">
                    </div>
                    <div class="mb-4">
                        <label for="crud-form-1" class="form-label">Phân quyền cho <span style="color: red">*</span></label>
                        <select name="guard_name" id="guard_name" class="clearable form-control w-full">
                            <option value="admin">Quản trị viên</option>
                        </select>
                    </div>
                    <label for="crud-form-1" class="form-label">Quyền <span style="color: red">*</span></label>
                    <div class="intro-y box">
                        <div id="checkbox-switch" class="p-3">
                            <div class="preview">
                                <div class="mt-3">
                                    <div>
                                        <label class="form-label mr-2 font-bold text-lg" for="selectAll">Chọn tất cả</label>
                                        <input type="checkbox" style="border-color: #312E81" class="form-check-input mb-1" id="selectAll">
                                    </div>
                                    <div class="grid grid-cols-4 sm:grid-cols-2 gap-2">
                                        @foreach (config('permissions') as $key => $permission)
                                            <div>
                                                <label class="font-bold text-lg">Quản lí {{ $key }}</label>
                                                @foreach ($permission as $keys => $value)
                                                    <div class="form-check mt-2">
                                                        <input id="checkbox-switch-1 {{ $keys }}"
                                                            name="permissions[]" style="border-color: #312E81" class="jqr-checkbox form-check-input"
                                                            type="checkbox" value="{{ $keys }}">
                                                        <label class="form-check-label"
                                                            for="checkbox-switch-1 {{ $keys }}">{{ $value }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('admin.RoleManagement.index') }}" type="button"
                            class="btn btn-outline-secondary w-24 mr-1">Danh sách</a>
                        <button type="button" id="saveBtn" class="btn btn-primary w-24">Lưu</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
    <script>
        $(function() {
            $('#saveBtn').on('click', function() {
                var formData = new FormData($('#ajaxForm')[0]);
                var url = "{{ route('admin.RoleManagement.store') }}";

                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            $('.clearable').val('');
                            $('#errorDiv').hide();
                        }
                    },
                    function(error) {
                        showErrors(error);
                    }
                );
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var selectAllCheckbox = document.getElementById("selectAll");
            var checkboxes = document.querySelectorAll(".jqr-checkbox");
            selectAllCheckbox.addEventListener("change", function() {
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });
        });
    </script>

@endsection
