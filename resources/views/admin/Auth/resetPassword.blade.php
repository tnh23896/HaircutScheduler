<div id="modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body p-10">
                <div class="intro-y flex flex-col sm:flex-row items-center">
                    <h2 class="text-lg font-medium mb-2">
                        Đổi mật khẩu
                    </h2>
                </div>
                <form action="{{ route('admin.auth.ResetPasswordPost1') }}" method="post">
                    @csrf
                    <div>
                        <label for="change-password-form-1" class="form-label">Mật khẩu cũ <span
                                style="color: red">*</span></label>
                        <input id="change-password-form-1" type="password" name="current_password" class="form-control"
                            placeholder="Mật khẩu cũ">
                    </div>
                    <div class="mt-3">
                        <label for="change-password-form-2" class="form-label">Mật khẩu mới <span
                                style="color: red">*</span></label>
                        <input id="change-password-form-2" type="password" name="new_password" class="form-control"
                            placeholder="Mật khẩu mới">
                    </div>
                    <div class="mt-3">
                        <label for="change-password-form-3" class="form-label">Nhập lại mật khẩu mới <span
                                style="color: red">*</span></label>
                        <input id="change-password-form-3" type="password" class="form-control"
                            name="new_password_confirmation" placeholder="Nhập lại mật khẩu mới">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>
