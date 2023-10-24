@extends('admin.templates.app')
@section('title', 'Cập nhật tin tức')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cập nhật tin tức
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="ajaxForm" enctype="multipart/form-data">
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Tiêu đề</label>
                        <input type="text" name="title" id="title" class="clearable form-control w-full"
                            value="{{ $one_blog->title }}" placeholder="Tiêu đề">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Danh mục</label>
                        <div class="mt-2">
                            <select name="category_blog_id" id="category_blog_id"
                                data-placeholder="Select your favorite actors" class="tom-select w-full">
                                @foreach ($category_blog as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $one_blog->category_blog_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-3" class="form-label">Hình ảnh cũ</label>
                        <div class="input-group">
                            <img src="{{ asset($one_blog->image) }}" alt="" class="w-24 h-18">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-3" class="form-label">Hình ảnh</label>
                        <div class="input-group">
                            <input type="file" name="image" id="image" class="clearable form-control"
                                placeholder="Image" aria-describedby="input-group-1">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Mô tả</label>
                        <textarea class="clearable form-control" name="description" id="description" cols="30" rows="10">{{ $one_blog->description }}</textarea>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('admin.blogManagement.blog.index') }}" type="button"
                            class="btn btn-outline-secondary w-24 mr-1">Trở lại</a>
                        <button type="button" id="saveBtn" class="btn btn-primary w-24">Lưu</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
    <script>
        $(function() {
            var blogId = {{ $one_blog->id }};
            $('#saveBtn').on('click', function() {
                var formData = new FormData($('#ajaxForm')[0]);
                var url = "{{ route('admin.blogManagement.blog.edit', ['id' => ':blogId']) }}";
                url = url.replace(':blogId', blogId);
                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: response.success,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.href =
                                    "{{ route('admin.blogManagement.blog.index') }}";
                            });
                        }
                    },

                    function(error) {
                        if (error.responseJSON && error.responseJSON.errors) {
                            // Xử lý lỗi
                            var errorMessages = [];
                            if (error.responseJSON.errors.title) {
                                errorMessages.push(error.responseJSON.errors.title);
                            }
														if (error.responseJSON.errors.image) {
															errorMessages.push(error.responseJSON.errors.image);
														}
														if (error.responseJSON.errors.description) {
															errorMessages.push(error.responseJSON.errors.description);
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
