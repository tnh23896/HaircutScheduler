@extends('admin.templates.app')
@section('title', 'Create blogs')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add New blog
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="ajaxForm" enctype="multipart/form-data">
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Blog title</label>
                        <input type="text" name="title" id="name" class="clearable form-control w-full"
                            placeholder="Blog title">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Category</label>
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
                        <label for="crud-form-3" class="form-label">Image</label>
                        <div class="input-group">
                            <input type="file" name="image" id="image" class="clearable form-control"
                                placeholder="Image" aria-describedby="input-group-1">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Description</label>
                        <textarea class="clearable form-control" name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('admin.blogManagement.blog.index') }}" type="button"
                            class="btn btn-outline-secondary w-24 mr-1">List</a>
                        <button type="button" id="saveBtn" class="btn btn-primary w-24">Save</button>
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

                            if (error.responseJSON.errors.title) {
                                errorMessages.push(error.responseJSON.errors.title);
                            }
                            if (error.responseJSON.errors.image) {
                                errorMessages.push(error.responseJSON.errors.image);
                            }
                            if (error.responseJSON.errors.category_blog_id) {
                                errorMessages.push(error.responseJSON.errors.category_blog_id);
                            }
                            if (error.responseJSON.errors.description) {
                                errorMessages.push(error.responseJSON.errors.description);
                            }

                            if (errorMessages.length > 0) {
                                var errorDiv = $('#errorDiv');
                                errorDiv.html("<p>Error:</p><ul>");
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
