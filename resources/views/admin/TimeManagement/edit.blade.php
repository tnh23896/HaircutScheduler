@extends('admin.templates.app')
@section('title', 'Cập nhật thời gian làm việc')
@section('content')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cập nhật thời gian làm việc
        </h2>
    </div>
    <form id="ajaxForm">
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Thời gian làm việc</label>
                        <input id="crud-form-1" name="time" type="time" class="form-control w-full"
                            placeholder="Input time" value="{{ $data->time }}">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Chọn ca</label>
                        <select name="shift_id" class="form-control w-full ">
                            <option value="{{ $data->shift_id }}">{{ $data->shift->name }}</option>
                            @foreach ($shift as $item)
                                @if ($item->id != $data->shift_id)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('admin.TimeManagement.index') }}"> <button type="button"
                                class="btn btn-outline-secondary w-24 mr-1">Danh sách</button></a>
                        <button type="button" id="saveBtn" class="btn btn-primary w-24">Lưu</button>
                    </div>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    </form>
    <script>
        $(function() {
            var editId = {{ $data->id }};
            $('#saveBtn').on('click', function() {
                var formData = new FormData($('#ajaxForm')[0]);
                var url = "{{ route('admin.TimeManagement.update', ['id' => ':editId']) }}";
                url = url.replace(':editId', editId);
                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            window.location.href =
                                "{{ route('admin.TimeManagement.index') }}";
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
