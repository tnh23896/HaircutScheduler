@extends('client.templates.layout_dashboard')
@section('title', 'Tài Khoản của tôi')
@section('title_page', 'Dashboard')
@section('content')
    <div class="tab-pane fade" id="account-settings">
        <div class="tabs-wrp account-settings brd-rd5">
            <h4 itemprop="headline">Cài đặt tài khoản</h4>
            <div class="account-settings-inner">
               <form id="ajaxForm" class="profile-info-form">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-lg-4">
                        <div class="profile-info text-center">
                            <div class="profile-thumb brd-rd50">
                                <img id="previewImage" src="{{$data->avatar === null ? asset('client/assets/images/profile-img1.jpg') : asset($data->avatar)}}"
                                    alt="profile-img1.jpg" itemprop="image">
                            </div>
                            <div class="profile-img-upload-btn">
                                <label class="fileContainer brd-rd5 yellow-bg theme-btn-2">
                                    Tải hình ảnh lên
                                    <input id="crud-form-1" name="avatar" type="file" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-lg-8">
                        <div class="profile-info-form-wrap">
                                <div class="row mrg20">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <div class="profile-form">
                                            <label>Họ và Tên <sup>*</sup></label>
                                            <input class="brd-rd3" type="text " name="username"
                                                placeholder="Họ và tên ..." value="{{ $data->username }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <label>Email <sup>*</sup></label>
                                        <input class="brd-rd3" type="email" name="email" placeholder="Email ..."
                                            value="{{ $data->email }}">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <label>Số Điện Thoại <sup>*</sup></label>
                                        <input class="brd-rd3" type="text" value="{{ $data->phone }}" disabled>
                                    </div>
                                    <button type="button" id="saveBtn"
                                        class="fileContainer brd-rd5 yellow-bg theme-btn-2">Lưu Thông Tin</button>
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
    </div>
    <script>
        $(function() {
         $('#crud-form-1').on('change', function (e) {
            var input = e.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
            var editId = {{ $data->id }};
            $('#saveBtn').on('click', function() {
                var formData = new FormData($('#ajaxForm')[0]);
                var url = "{{ route('profile.update', ['id' => ':editId']) }}";
                url = url.replace(':editId', editId);
                sendAjaxRequest(url, 'POST', formData,
                    function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Successfully',
                                text: response.success,
                                icon: 'success',
                            }).then(() => {
                                // window.location.href = "{{ route('admin.UserManagement.index') }}";
                            });
                        }
                    },
                );
            });
        });
    </script>
@endsection
