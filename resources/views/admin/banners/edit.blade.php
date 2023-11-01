@extends('admin.templates.app')
@section('title', 'Cập nhật Banner')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cập nhật Banner
        </h2>
    </div>
    <div id="errorDiv" class="alert alert-danger" style="display: none;"></div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="ajaxForm" enctype="multipart/form-data" method="POST">
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Hình ảnh</label>
                        <img id="previewImage" src="{{ asset($one_banner->image) }}" style="height:auto;width: 100px;">
                        <input id="crud-form-1" type="file" class="form-control w-full p-2" name="image"
                            id="image">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-4" class="form-label">Đường dẫn</label>
                        <div class="input-group">
                            <input id="crud-form-4" type="text" name="link" id="link" class="form-control"
                                placeholder="http://www.example.com/" aria-describedby="input-group-2"
                                value="{{ $one_banner->link }}">
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <button type="button" class="btn btn-primary w-24" id="saveBtn">Cập nhật</button>
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-outline-secondary w-24 mr-1">Danh
                            sách</a>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
    <script>
        $(function() {
            $('#crud-form-1').on('change', function(e) {
                var input = e.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
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
