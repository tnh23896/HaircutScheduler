@extends('admin.templates.app')
@section ('title','Edit User')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit Time
        </h2>
    </div>
    <form id="ajaxForm" >

    <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">BLACK STATUS</label>
                    <select class="form-select w-full" name="black_status">
                        <option value="0"
                            {{$data->black_status==0? 'selected' : ''}}>
                            Active
                        </option>
                        <option value="1"
                            {{$data->black_status==1? 'selected' : ''}}>
                            Inactive
                        </option>
                    </select>
                </div>
                <div class="text-right mt-5">
                   <a href="{{route('admin.UserManagement.index')}}"> <button type="button" class="btn btn-outline-secondary w-24 mr-1">List</button></a>
                    <button type="button" id="saveBtn" class="btn btn-primary w-24">Save</button>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
</form>

    <script>
        $(function() {
            var editId = {{$data->id}};
            $('#saveBtn').on('click', function() {
                var formData = new FormData($('#ajaxForm')[0]);
                var url = "{{ route('admin.UserManagement.update', ['id' => ':editId']) }}";
                url = url.replace(':editId', editId);

                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Successfully',
                                text: response.success,
                                icon: 'success',
                            }).then(() => {
                                window.location.href = "{{ route('admin.UserManagement.index') }}";
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

