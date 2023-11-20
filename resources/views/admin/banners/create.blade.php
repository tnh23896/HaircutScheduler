@extends('admin.templates.app')
@section('title', 'Thêm mới Banner')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm Banner
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="ajaxForm" enctype="multipart/form-data">
                <div class="intro-y box p-5">
									<div class="">
										<label for="crud-form-3" class="form-label ">Hình ảnh</label>
										<div class="w-full mt-3 xl:mt-0 flex-1 border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4" style="width: 300px">
												<div class="grid grid-cols-10 gap-5 pl-4 pr-5">
														<div class="col-span-5 md:col-span-2 h-auto relative cursor-pointer zoom-in" style="width: 200px">
																<img class="rounded-md" id="previewImage">
														</div>
												</div>
												<div class="px-4 pb-4 mt-2 flex items-center justify-center cursor-pointer relative">
														<i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1">
																Tải ảnh lên
														<input id="crud-form-1" type="file" name="image" class="w-full h-full top-0 left-0 absolute opacity-0">
												</div>
										</div>
									</div>
                    <div class="mt-3">
                        <label for="crud-form-4" class="form-label">Dường dẫn</label>
                        <div class="input-group">
                            <input id="crud-form-4" type="text" name="link" id="link" class="form-control"
                                placeholder="http://www.example.com/" aria-describedby="input-group-2">
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <button type="button" class="btn btn-primary w-24" id="saveBtn">Thêm</button>
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
            $('#saveBtn').on('click', function() {
                var formData = new FormData($('#ajaxForm')[0]);
                sendAjaxRequest('/admin/banner/create', 'POST', formData,
                    function(response) {
                        if (response.success) {
                        toastr.success(response.success);
                        $('#crud-form-1').val('');
                        $('#crud-form-4').val('');
                        $('#previewImage').attr('src', '');
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
