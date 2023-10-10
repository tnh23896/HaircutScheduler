@extends('admin.templates.app')
@section ('title','Edit Schedule Management')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit Information
        </h2>
    </div>
    <div id="errorDiv" class="alert alert-danger" style="display: none;"></div>
    <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form id="ajaxForm"  enctype="multipart/form-data">
            <div class="intro-y box p-5">
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Customer Name</label>
                    <input id="name" name="name" type="text" class="form-control w-full" placeholder="Input text"
                           value="{{$data->name}}" disabled>
                </div>
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Name Staff</label>
                    <input id="name_staff" type="text" name="name_staff" class="form-control w-full" placeholder="Input text"
                           value="{{$data->admin->username}}" disabled>
                </div>
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Price</label>
                    <input id="price" type="text" class="form-control w-full" placeholder="Input text"
                           value="{{$data->price}}" name="price" disabled>
                </div>
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Schedule Time</label>
                    <input id="schedule_time" name="schedule_time" type="text" class="form-control w-full" placeholder="Input text"
                           value="{{$data->work_schedule_detail->time->time }} {{$data->day}}" disabled>
                </div>
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Created At</label>
                    <input id="created_at" name="created_at" type="text" class="form-control w-full" placeholder="Input text"
                           value="{{$data->created_at}}" disabled>
                </div>
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Status</label>
                    <select data-placeholder="Select your favorite actors" name="status" class="tom-select w-full" id="crud-form-2" multiple>
                        <option value="1" @if($data->status == "pending") selected @endif>Pending</option>
                        <option value="2" @if($data->status == "success") selected @endif>Success</option>
                        <option value="3" @if($data->status == "canceled") selected @endif>Canceled</option>
                    </select>
                </div>

                <div class="text-right mt-5">
                    <a href="{{route('admin.scheduleManagement.index')}}" class="btn btn-primary w-32 mr-1">List Schedule</a>
                    <button type="button" id="saveBtn" class="btn btn-success w-24 text-white">Save</button>
                </div>
            </div>
            <!-- END: Form Layout -->
            </form>
        </div>

    </div>


    <script>
            var editId = {{$data->id}};
            $('#saveBtn').on('click', function() {
                var formData = new FormData($('#ajaxForm')[0]);
                var url = "{{ route('admin.scheduleManagement.update', ['id' => ':editId']) }}";
                url = url.replace(':editId', editId);

                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Successfully',
                                text: response.success,
                                icon: 'success',
                            }).then(() => {
                                {{--window.location.href = "{{ route('admin.scheduleManagement.edit') }}";--}}
                            });
                        }
                    },

                    function(error) {
                        if (error.responseJSON && error.responseJSON.errors) {
                            // Xử lý lỗi
                            var errorMessages = [];

                            if (error.responseJSON.errors.name) {
                                errorMessages.push(error.responseJSON.errors.name);
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

    </script>


@endsection

