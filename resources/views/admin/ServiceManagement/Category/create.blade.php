@extends('admin.templates.app')
@section('title', 'Thêm danh mục dịch vụ')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm danh mục dịch vụ
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="ajaxForm" enctype="multipart/form-data">
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label mt-3">Tiêu đề <span style="color: red">*</span></label>
                        <input type="text" name="name" id="name" class="clearable form-control w-full"
                            placeholder="Tiêu đề">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label mt-3">Loại danh mục dịch vụ <span style="color: red">*</span></label>
                        <select class="form-select w-full" name="can_choose" id="">
                            <option value="" selected>Chọn số lượng</option>
                            <option value="one">Chọn một dịch vụ</option>
                            <option value="many">Chọn nhiều dịch vụ</option>
                        </select>
                    </div>
                    <label for="crud-form-3" class="form-label mt-3">Hình ảnh <span style="color: red">*</span></label>
                    <div class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4"
                        style="width: 300px">
                        <div class="grid grid-cols-10 gap-5 pl-4 pr-5">
                            <div class="col-span-5 md:col-span-2 h-auto relative cursor-pointer zoom-in"
                                style="width: 200px">
                                <img class="rounded-md" id="previewImage">
                            </div>
                        </div>
                        <div class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
                            <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1">
                                Tải ảnh lên
                                <input id="crud-form-1" type="file" name="image"
                                    class="w-full h-full top-0 left-0 absolute opacity-0">
                        </div>
                    </div>

                </div>
                <div class="text-right mt-5">
                    <a href="{{ route('admin.serviceManagement.category.index') }}" type="button"
                        class="btn btn-outline-secondary w-24 mr-1">Danh sách</a>
                    <button type="button" id="saveBtn" class="btn btn-primary w-24">Lưu</button>
                </div>
        </div>
        </form>
    </div>
    </div>
    <script>
        $(function() {
            $('#saveBtn').on('click', function() {
                var formData = new FormData($('#ajaxForm')[0]);
                var url = "{{ route('admin.serviceManagement.category.store') }}";

                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            $('#crud-form-1').val('');
                            $('#previewImage').attr('src', '');
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
    </script>
@endsection
