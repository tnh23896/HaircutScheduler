@extends('admin.templates.app')
@section('title', 'Thêm mới tin tức')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm mới tin tức
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="ajaxForm" enctype="multipart/form-data">
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Tiêu đề</label>
                        <input type="text" name="title" id="name" class="clearable form-control w-full"
                            placeholder="Tiêu đề">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Danh mục</label>
                        <div class="mt-2">
                            <select name="category_blog_id" id="category_blog_id"
                                data-placeholder="Select your favorite actors" class="tom-select w-full">
                                @foreach ($category_blog as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
											<label for="crud-form-3" class="form-label mt-3">Hình ảnh</label>
											<div class="w-full mt-2 xl:mt-0 flex-1 border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4" style="width: 300px">
													<div class="grid grid-cols-10 gap-5 pl-4 pr-5">
															<div class="col-span-5 md:col-span-2 h-auto relative cursor-pointer zoom-in" style="width: 200px">
																	<img class="rounded-md" id="previewImage">
															</div>
													</div>
													<div class="px-4 pb-4 mt-5 flex items-center justify-center cursor-pointer relative">
															<i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1">
																	Tải ảnh lên
															<input id="crud-form-1" type="file" name="image" class="w-full h-full top-0 left-0 absolute opacity-0">
													</div>
											</div>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Mô tả</label>
                        <textarea class="clearable form-control" name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('admin.blogManagement.blog.index') }}" type="button"
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
                var url = "{{ route('admin.blogManagement.blog.create') }}";
                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            toastr.success(response.success);
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
@section('js_footer_custom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
@endsection
