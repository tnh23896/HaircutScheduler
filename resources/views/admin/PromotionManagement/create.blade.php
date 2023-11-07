@extends('admin.templates.app')
@section('title', 'Thêm mới mã giảm giá')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm mã giảm giá mới
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="ajaxForm" enctype="multipart/form-data">
                <div class="intro-y box p-5">
                    <div class="mb-4">
                        <label for="crud-form-1" class="form-label">Mã giảm giá</label>
                        <input type="text" name="promocode" id="promocode" class="clearable form-control w-full"
                               placeholder="Mã giảm giá">
                    </div>

                    <div class="mb-4">
                        <label for="crud-form-1" class="form-label">Số tiền giảm giá</label>
                        <input type="text" name="discount" id="discount" class="clearable form-control w-full"
                               placeholder="Số tiền giảm">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Mô tả</label>
                        <textarea class="clearable form-control" name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="crud-form-1" class="form-label">Ngày kết thúc</label>
                        <input type="date" name="expire_date" id="expire_date" class="clearable form-control w-full"
                               placeholder="Ngày kết thúc">
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('admin.PromotionManagement.index') }}" type="button"
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
                var url = "{{ route('admin.PromotionManagement.store') }}";

                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            $('.clearable').val('');
                            $('#errorDiv').hide();
                        }
                        {{--window.location.href = "{{ route('admin.RoleManagement.index') }}";--}}
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

