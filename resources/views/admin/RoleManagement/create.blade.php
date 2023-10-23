@extends('admin.templates.app')
@section('title', 'Create Role')
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
                        <label for="crud-form-1" class="form-label">Tên vai trò</label>
                        <input type="text" name="name" id="name" class="clearable form-control w-full"
                            placeholder="Tên vai trò">
                    </div>


                    <div class="mb-4">
                        <label for="crud-form-1" class="form-label">Phân quyền cho</label>
                        <input type="text" name="guard_name" id="guard_name" class="clearable form-control w-full"
                               placeholder="Tên guard">
                    </div>

                    <div class="mb-4">
                        <label for="crud-form-1" class="form-label">Quyền</label>
                        <br>
                        <div class="grid grid-cols-4 gap-4 sm:grid">
                        @foreach(config('permissions') as $key => $value)
                            <div>
                            <input type="checkbox"
                                   name="permissions[]"
                                   value="{{ $key }}"
                                   id="{{ $key }}">
                            <label for="{{ $key }}">{{ $value }}</label>
                            </div>
                        @endforeach
                        </div>
                    </div>

                    <div class="text-right mt-5">
                        <a href="{{route('admin.RoleManagement.index')}}" type="button" class="btn btn-outline-secondary w-24 mr-1">Danh sách</a>
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
                            Swal.fire({
                                title: 'Successfully',
                                text: response.success,
                                icon: 'success',
                            }).then(() => {
                                // Xoá thông tin trong form sau khi thêm mới
                                $('.clearable').val('');
                                $('#errorDiv').hide(); // ẩn thông báo lỗi
                            });
                        }
                    },

                    function(error) {
                        if (error.responseJSON && error.responseJSON.errors) {
                            // Xử lý lỗi
                            var errorMessages = [];

                            if (error.responseJSON.errors.name) {
                                errorMessages.push(error.responseJSON.errors.name);
                            }


                            if (errorMessages.length > 0) {
                                var errorDiv = $('#errorDiv');
                                errorDiv.html("<p>Có lỗi xảy ra:</p><ul>");
                                var errorList = errorDiv.find("ul");
                                for (var i = 0; i < errorMessages.length; i++) {
                                    errorList.append("<li>" + " - " + errorMessages[i] +
                                        "</li>");
                                }
                                errorDiv.show();
                            }
                        }
                    }
                );
            });
        });
    </script>
@endsection
@section('js_footer_custom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
@endsection
