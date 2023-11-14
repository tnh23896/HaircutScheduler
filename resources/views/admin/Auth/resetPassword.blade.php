<div id="modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-content">

        <div class="content" style="max-height: 300px !important">
            <!-- BEGIN: Top Bar -->

            <!-- END: Top Bar -->
            


            <div class="p-5" >
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Đổi mật khẩu
                    </h2>
    
                </div>
                <form action="{{ route('admin.auth.ResetPasswordPost1') }}" method="post">
                    @csrf
                    <div>
                        <label for="change-password-form-1" class="form-label">Mật khẩu cũ</label>
                        <input id="change-password-form-1" type="password" name="current_password" class="form-control"
                            placeholder="Input text" >
                    </div>
                    <div class="mt-3">
                        <label for="change-password-form-2" class="form-label">Mật khẩu mới</label>
                        <input id="change-password-form-2" type="password" name="new_password" class="form-control"
                            placeholder="Input text" >
                    </div>
                    <div class="mt-3">
                        <label for="change-password-form-3" class="form-label">Nhập lại mật khẩu mới</label>
                        <input id="change-password-form-3" type="password" class="form-control"
                            name="new_password_confirmation" placeholder="Input text" >
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Sửa mật khẩu</button>
                </form>
            </div>



        </div>

    </div>
</div>
