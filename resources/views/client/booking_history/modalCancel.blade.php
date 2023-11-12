<div id="modaldelete{{$booking->id}}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-content">

        <div class="content">
            <div class="modal-body" id="modal-body">
                <div class="container" style="max-width: 550px">
                    <div class="alert alert-danger error" id="" style="display: none;"></div>
                    <h3>Xác thực số điện thoại</h3>
                    <div class="alert alert-success successAuth" id="" style="display: none;"></div>
                    <form class="formSendOtp" data-id="{{$booking->id}}">
                        <input type="text" name="booking_id" value="{{$booking->id}}" hidden>
                        <label>Số điện thoại:</label>
                        <input type="text" name="phoneOtpNumberInput"  class="form-control " placeholder="+84********">
                        <div id="recaptcha-container" class="mt-3"></div>
                        <button  class="btn btn-primary mt-3">Gửi OTP</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>