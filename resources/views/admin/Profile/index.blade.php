@extends('admin.templates.app')
@section('title', 'Thông tin cá nhân')
@section('content')
    <div class="content">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Thông tin cá nhân
            </h2>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
                <div class="intro-y box mt-5 lg:mt-0">
                    <div class="relative flex items-center p-5">
                        <div class="w-12 h-12 image-fit">
                            <img id="profileImage" alt="{{ $data->username }}" class="rounded-full"
                                src="{{ asset($data->avatar) }}">
                        </div>
                        <div class="ml-4 mr-auto">
                            <div class="font-medium text-base">{{ $data->username }}</div>
                            @foreach ($data->getRoleNames() as $v)
                            <div class="text-slate-500">{{ $v }}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                        <a class="flex items-center p-3 hover:bg-white/5 rounded hover:rounded-3xl"  href="#" data-tw-toggle="modal" data-tw-target="#modal"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i>
                            Thay đổi mật khẩu </a>
                        <a class="flex items-center mt-5 p-3 hover:bg-white/5 rounded hover:rounded-3xl" href="{{ route('admin.ScheduleEmployee.index') }}"> <i
                                data-lucide="calendar" class="w-4 h-4 mr-2"></i> Xem lịch làm việc </a>
                    </div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                <form id="ajaxForm" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="intro-y box p-5">
                        <div class="mb-5" style="display: flex; justify-content: center; align-items: center;">
                            <div class="profile-info text-center">
                                <div class="profile-thumb brd-rd50">
                                    <label>Ảnh đại diện</label>
                                    <img id="previewImage" class="m-5" src="{{ asset($data->avatar) }}"
                                        style="border-radius: 50%; width:200px; height:200px; object-fit:cover;">
                                </div>
                                <div class="profile-img-upload-btn">
                                    <label class="fileContainer brd-rd5 yellow-bg theme-btn-2">
                                        <input id="crud-form-1" name="avatar" type="file" class="form-control" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label>Email</label>
                            <div class="input-group mt-2">
                                <div class="input-group-text"><i class="w-4 h-4" data-lucide="mail"></i></div>
                                <input type="text" class="form-control" placeholder="Email" aria-label="email"
                                    name="email" value="{{ $data->email }}" disabled>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label>Họ và tên</label>
                            <div class="input-group mt-2">
                                <div class="input-group-text"><i class="w-4 h-4" data-lucide="edit-2"></i></div>
                                <input type="text" class="form-control" placeholder="Họ và tên" aria-label="username"
                                    name="username" value="{{ $data->username }}">
                            </div>
                            <div id="usernameError" class="text-sm text-danger font-medium leading-none mt-3"></div>
                        </div>
                        <div class="mb-2">
                            <label>Số điện thoại</label>
                            <div class="input-group mt-2">
                                <div class="input-group-text"><i class="w-4 h-4" data-lucide="phone"></i></div>
                                <input type="text" class="form-control" placeholder="Số điện thoại" aria-label="phone"
                                    name="phone" value="{{ $data->phone }}">
                            </div>
                            <div id="phoneError" class="text-sm text-danger font-medium leading-none mt-3"></div>
                        </div>
                        <div class="mb-2">
                            <label>Vai trò</label>
                            <div class="input-group mt-2">
                                <div class="input-group-text"><i class="w-4 h-4" data-lucide="user"></i></div>
                                @foreach ($data->getRoleNames() as $v)
                                    <input type="text" class="form-control" placeholder="Vai trò" aria-label="role"
                                    name="role" value="{{ $v }}" disabled>
                                    @endforeach
                            </div>
                        </div>
                        <div class="text-right mt-5">
                            <button type="button" class="btn btn-primary w-24" id="saveBtn">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script>
        $(function() {
            $('#crud-form-1').on('change', function(e) {
                var input = e.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewImage').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
            var editId = {{ $data->id }};
            $('#saveBtn').on('click', function() {
                var formData = new FormData($('#ajaxForm')[0]);
                var url = "{{ route('admin.profile.update') }}";
                url = url.replace(':editId', editId);
                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            $('#usernameError').text('');
                            $('#phoneError').text('');
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
