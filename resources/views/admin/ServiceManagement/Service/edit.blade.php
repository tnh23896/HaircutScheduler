@extends('admin.templates.app')
@section('title', 'Edit Service Services')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit Service
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="ajaxForm" enctype="multipart/form-data">
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Service Name</label>
                        <input type="text" name="name" id="name" class="clearable form-control w-full"
                            value="{{ $one_service->name }}" placeholder="Service Name">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Price</label>
                        <input type="text" name="price" id="price" class="clearable form-control w-full"
                            value="{{ $one_service->price }}" placeholder="Price">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Category</label>
                        <div class="mt-2">
                            <select name="category_services_id" id="category_services_id"
                                data-placeholder="Select your favorite actors" class="tom-select w-full">
                                @foreach ($category_service as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $one_service->category_services_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-3" class="form-label">Old Image</label>
                        <div class="input-group">
                            <img src="{{ asset($one_service->image) }}" alt="" class="w-24 h-18">
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
                        <textarea class="clearable form-control" name="description" id="description" cols="30" rows="10">{{ $one_service->description }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Percentage_discount</label>
                        <input type="text" name="percentage_discount" id="percentage_discount"
                            class="clearable form-control w-full" value="{{ $one_service->percentage_discount }}"
                            placeholder="Percentage_discount">
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('admin.serviceManagement.service.index') }}" type="button"
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
            var serviceId = {{ $one_service->id }};
            $('#saveBtn').on('click', function() {
                var formData = new FormData($('#ajaxForm')[0]);
                var url = "{{ route('admin.serviceManagement.service.edit', ['id' => ':serviceId']) }}";
                url = url.replace(':serviceId', serviceId);

                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            $("#errorDiv").hide();
                            window.location.href =
                                "{{ route('admin.serviceManagement.service.index') }}";
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
