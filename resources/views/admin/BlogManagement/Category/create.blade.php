@extends('admin.templates.app')
@section('title', 'Thêm mới danh mục tin tức')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm mới danh mục tin tức
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="ajaxForm">
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Tiêu đề <span style="color: red">*</span></label>
                        <input type="text" name="title" id="title" class="clearable form-control w-full"
                            placeholder="Tiêu đề">
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('admin.blogManagement.category.index') }}" type="button"
                            class="btn btn-outline-secondary w-24 mr-1">Danh sách</a>
                        <button type="button" id="saveBtn" class="btn btn-primary w-24">Thêm</button>
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
                var url = "{{ route('admin.blogManagement.category.store') }}";
                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            $('.clearable').val('');
                            $('#errorDiv').hide(); // ẩn thông báo lỗi
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
@section('js_footer_custom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
@endsection
