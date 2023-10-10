@extends('admin.templates.app')
@section ('title','Edit Banner')
@section('content')
<!-- END: Top Bar -->
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Edit Banner
    </h2>
</div>
<div id="errorDiv" class="alert alert-danger" style="display: none;"></div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <!-- BEGIN: Form Layout -->
        <form id="ajaxForm" enctype="multipart/form-data" method="POST"> 
            <div class="intro-y box p-5">
                <div>
                <label for="crud-form-1" class="form-label">Image Banner</label>
                    <img id="previewImage" src="{{ asset($one_banner->image) }}" style="height:auto;width: 100px;">
                    <input id="crud-form-1" type="file" class="form-control w-full p-2" name="image" id="image">
                </div>
                <div class="mt-3">
                    <label for="crud-form-4" class="form-label">Link</label>
                    <div class="input-group">
                        <input id="crud-form-4" type="text" name="link" id="link" class="form-control" placeholder="http://www.example.com/" aria-describedby="input-group-2" value="{{ $one_banner->link }}">
                    </div>
                </div>
                <div class="text-right mt-5">
                    <button type="button" class="btn btn-primary w-24" id="saveBtn">Save</button>
                    <a href="{{route('admin.banners.index')}}" class="btn btn-outline-secondary w-24 mr-1">List</a>
                </div>
            </div>
        </form>
        <!-- END: Form Layout -->
    </div>
</div>
<script>
    $(function() {
        $('#crud-form-1').on('change', function (e) {
            var input = e.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
        $('#saveBtn').on('click', function() {
            var formData = new FormData($('#ajaxForm')[0]);

            sendAjaxRequest('/admin/banner/update/{{ $one_banner->id }}', 'POST', formData,
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
                            errorMessages.push(error.responseJSON.errors.image);
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