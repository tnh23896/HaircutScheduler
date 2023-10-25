<div id="modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-content">

        <div class="content">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-12 2xl:col-span-9">
                    <!-- BEGIN: Change Password -->
                    <div class="intro-y box lg:mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Change Password
                            </h2>
                        </div>
                        <div class="p-5">
                            <form action="{{route('admin.auth.ResetPasswordPost')}}" method="post">
                                @csrf
                            <div>
                                <label for="change-password-form-1" class="form-label">Old Password</label>
                                <input id="change-password-form-1" type="password" name="current_password" class="form-control" placeholder="Input text" required>
                            </div>
                            <div class="mt-3">
                                <label for="change-password-form-2" class="form-label">New Password</label>
                                <input id="change-password-form-2" type="password" name="new_password" class="form-control" placeholder="Input text" required>
                            </div>
                            <div class="mt-3">
                                <label for="change-password-form-3" class="form-label">Confirm New Password</label>
                                <input id="change-password-form-3" type="password" class="form-control" name="new_password_confirmation" placeholder="Input text" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Change Password</button>
                        </form>
                        </div>
                    </div>
                    <!-- END: Change Password -->
                </div>
            </div>


        </div>

    </div>
</div>

