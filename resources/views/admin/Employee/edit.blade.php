@extends('admin.templates.app')
@section ('title','Cập nhật nhân viên')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cập nhật nhân viên mới
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="crud-form" action="" method="POST" enctype="multipart/form-data" class="intro-y box p-5">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $employee->id }}">
                <div>
                    <label for="crud-form-1" class="form-label">Tên nhân viên</label>
                    <input id="crud-form-1" name="username" value="{{ $employee->username }}" type="text" class="form-control w-full" placeholder="Tên nhân viên">
                </div>
                <div class="mt-3">
                    <img src="{{ asset($employee->avatar) }}" width="100" alt="">
                </div>
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Ảnh đại diện</label>
                    <input id="crud-form-2" name="avatar" type="file" class="form-control" accept=".jpg, .jpeg, .png, .gif">
                </div>
                <div class="mt-3">
                    <label for="crud-form-5" class="form-label">Số điện thoại</label>
                    <input id="crud-form-5" name="phone" value="{{ $employee->phone }}" type="tel" class="form-control" placeholder="Số điện thoại">
                </div>
                <div class="mt-3">
                    <label for="crud-form-6" class="form-label">Email</label>
                    <input id="crud-form-6" name="email" value="{{ $employee->email }}" type="email" class="form-control" placeholder="Email">
                </div>
                <div class="mt-3">
                    <label for="crud-form-7" class="form-label">Mật khẩu</label>
                    <input id="crud-form-7" name="password" value="{{ $employee->password }}" type="password" class="form-control" placeholder="Mật khẩu">
                </div>
                <div class="mt-3">
                    <label for="crud-form-8" class="form-label">Mô tả</label>
                    <textarea id="crud-form-8" name="description" class="form-control" placeholder="Mô tả">{{ $employee->description }}</textarea>
                </div>
                <div id="basic-select">
                    <div class="preview">
                        <!-- BEGIN: Basic Select -->
                        <div>
                            <label>Vai trò</label>
                            <div class="mt-2">
                                <select name="roles[]" id="roles" data-placeholder="Tìm kiếm" class="tom-select w-full">
                                    <option value="0">Chọn vai trò</option>
                                    @foreach ($roles as $roleId => $roleName)
                                    <option value="{{ $roleId }}" {{ in_array($roleId, $employeeRole) ? 'selected' : '' }}>{{ $roleName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- END: Basic Select -->
                    </div>
                </div>
                <div class="text-right mt-5">
                    <a href="{{ route('admin.employee.index') }}" class="btn btn-outline-secondary w-24 mr-1">Danh sách</a>
                    <button type="button" id="saveBtn" class="btn btn-primary w-24">Lưu</button>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
    <script>
        $(function() {
            var employeeId = {{ $employee->id }};
            console.log(employeeId);
            $('#saveBtn').on('click', function() {
                var formData = new FormData($('#crud-form')[0]);
                var url = "{{ route('admin.employee.update', ['employee' => ':employeeId']) }}";
                url = url.replace(':employeeId', employeeId);

                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            $("#errorDiv").hide();
                            window.location.href ="{{ route('admin.employee.index') }}";
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
