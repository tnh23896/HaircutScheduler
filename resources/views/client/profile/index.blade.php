@extends('client.templates.layout_dashboard')
@section('title', 'Tài Khoản của tôi')
@section('title_page', 'Thông tin tài khoản')
@section('content')
    <div>
        <div class="tabs-wrp account-settings brd-rd5">
            <h4 itemprop="headline">Cài đặt tài khoản</h4>
            <div class="account-settings-inner">
                <form id="ajaxForm" class="profile-info-form">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <div class="profile-info text-center">
                                <div class="profile-thumb brd-rd50">
                                    <img id="previewImage"
                                        src="{{ $data->avatar === 'default.jpg' ? asset('dist/images/default.jpg') : asset($data->avatar) }}"
                                        alt="profile-img1.jpg" itemprop="image">
                                </div>
                                <div class="profile-img-upload-btn">
                                    
                                    <label class="fileContainer brd-rd5 yellow-bg theme-btn-2 rounded">
                                        Tải hình ảnh lên
                                        <input id="crud-form-1" name="avatar" type="file" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-lg-8">
                            <div class="profile-info-form-wrap">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <label>Họ và Tên <sup class="text-danger">*</sup></label>
                                    <input class="brd-rd3" type="text " name="username" placeholder="Họ và tên ..."
                                        value="{{ $data->username }}">
                                    <label id="username-error" class="text-danger"></label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <label>Email <sup class="text-danger">*</sup></label>
                                    <input class="brd-rd3" type="email" name="email" placeholder="Email ..."
                                        value="{{ $data->email }}">
                                    <label id="email-error" class="text-danger "></label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <label>Số Điện Thoại <sup class="text-danger">*</sup></label>
                                    <input class="brd-rd3" type="text" value="{{ $data->phone }}" disabled>
                                </div>
                                <button type="button" id="saveBtn"
                                    class="fileContainer brd-rd5 yellow-bg theme-btn-2 ml-3 mt-2 rounded">Lưu Thông
                                    Tin</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="loc-map2">
                            <div class="loc-map brd-rd3" id="loc-map"></div>
                        </div>
                    </div>
            </div>
            </form>
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
                var url = "{{ route('profile.update') }}";
                url = url.replace(':editId', editId);
                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        toastr.success('Cập nhật thành công .');
                        $("#username-error").text("");
                        $("#email-error").text("");
                    },
                    function showError(error) {
                        if (error.responseJSON && error.responseJSON.errors) {
                            // Xử lý lỗi

                            if (error.responseJSON.errors.username) {
                                $("#username-error").text(error.responseJSON.errors.username);
                            } else {
                                $("#username-error").text("");
                            }

                            if (error.responseJSON.errors.email) {
                                $("#email-error").text(error.responseJSON.errors.email);
                            } else {
                                $("#email-error").text("");
                            }
                            var errorDiv = $('#error-message');
                            errorDiv.html("<p>Có lỗi xảy ra:</p>");
                            errorDiv.hide();
                            if (error.responseJSON.errors.username || error.responseJSON.errors.email) {
                                errorDiv.show();
                            }
                        }
                    }

                );
            });

        });
    </script>
@endsection
