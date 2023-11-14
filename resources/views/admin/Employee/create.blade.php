@extends('admin.templates.app')
@section ('title','Đăng ký nhân viên')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Đăng ký nhân viên mới
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="crud-form" method="POST" enctype="multipart/form-data" class="intro-y box p-5">
                @csrf
                <div>
                    <label for="crud-form-1" class="form-label">Tên nhân viên</label>
                    <input id="crud-form-1" name="username" value="{{ old('username') }}" type="text" class="form-control clearable w-full" placeholder="Tên nhân viên">
                </div>
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Ảnh đại diện</label>
                    <input id="crud-form-2" name="avatar" type="file" class="form-control clearable" accept=".jpg, .jpeg, .png, .gif">
                </div>
                <div class="mt-3">
                    <label for="crud-form-5" class="form-label">Số điện thoại</label>
                    <input id="crud-form-5" name="phone" value="{{ old('phone') }}" type="tel" class="form-control clearable" placeholder="Số điện thoại">
                </div>
                <div class="mt-3">
                    <label for="crud-form-6" class="form-label">Email</label>
                    <input id="crud-form-6" name="email" value="{{ old('email') }}" type="email" class="form-control clearable" placeholder="Email">
                </div>
                <div class="mt-3">
                    <label for="crud-form-7" class="form-label">Mật khẩu</label>
                    <input id="crud-form-7" name="password" value="{{ old('password') }}" type="password" class="form-control clearable" placeholder="Mật khẩu">
                </div>
                <div class="mt-3">
                    <label for="crud-form-8" class="form-label">Mô tả</label>
                    <textarea id="crud-form-8" name="description" value="{{ old('description') }}" class="form-control clearable" placeholder="Mô tả"></textarea>
                </div>
                <div id="basic-select">
                    <div class="preview">
                        <!-- BEGIN: Basic Select -->
                        <div>
                            <label>Vai trò</label>
                            <div class="mt-2">
                                <select name="roles[]" id="roles" data-placeholder="Tìm kiếm" class="tom-select w-full">
                                    <option value="0">Chọn vai trò</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
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
            $('#saveBtn').on('click', function() {
                var formData = new FormData($('#crud-form')[0]);
                var url = "{{ route('admin.employee.store') }}";

                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            $('.clearable').val('');
                            $("#errorDiv").hide();
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
