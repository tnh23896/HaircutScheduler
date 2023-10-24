@extends('admin.templates.app')
@section('title', 'Edit Category Services')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Chỉnh sửa vai trò
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="ajaxForm" enctype="multipart/form-data">
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Tên vai trò</label>
                        <input type="text" name="name" id="name" class="clearable form-control w-full"
                               value="{{ $role->name }}" placeholder="Tên vai trò">
                    </div>

                    <div>
                        <label for="crud-form-1" class="form-label">Phân quyền cho</label>
                        <input type="text" name="guard_name" id="name" class="clearable form-control w-full"
                               value="{{ $role->guard_name }}" placeholder="Tên guard">
                    </div>


                    <div>
                        <label for="crud-form-1" class="form-label">Quyền</label>
                        <br>
                        <div class="grid grid-cols-4 gap-4 sm:grid">
                        @foreach(config('permissions') as $key => $value)
                            <div>
                            <input type="checkbox"
                                   name="permissions[]"
                                   value="{{ $key }}"
                                   @if(in_array($key, $permissions)) checked @endif
                                   id="{{ $key }}">
                            <label for="{{ $key }}">{{ $value }}</label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('admin.RoleManagement.index') }}" type="button"
                           class="btn btn-outline-secondary w-24 mr-1">Back</a>
                        <button type="button" id="saveBtn" class="btn btn-primary w-24">Save</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>

    <script>
        var editId = {{$role->id}};
        $('#saveBtn').on('click', function() {
            var formData = new FormData($('#ajaxForm')[0]);
            var url = "{{ route('admin.RoleManagement.update', ['id' => ':editId']) }}";
            url = url.replace(':editId', editId);

            sendAjaxRequest(url, 'POST', formData,
                function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Successfully',
                            text: response.success,
                            icon: 'success',
                        }).then(() => {
                            {{--window.location.href = "{{ route('admin.scheduleManagement.edit') }}";--}}
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

    </script>

@endsection
@section('js_footer_custom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
@endsection