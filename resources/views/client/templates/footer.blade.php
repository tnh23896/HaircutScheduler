<a href="#" id="back-to-top"></a>
<!-- footer begin -->
<footer>
    <div class="container">
        <div class="row g-4">

            <div class="col-lg-4 text-lg-start text-center">
                <div class="social-icons">
                    <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                    <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                    <a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                    <a href="#"><i class="fa fa-pinterest fa-lg"></i></a>
                    <a href="#"><i class="fa fa-rss fa-lg"></i></a>
                </div>
            </div>
            <div class="col-lg-4 text-lg-center text-center">
                <img src="{{ asset('client/images/logo.png')}}" class="" alt="">
            </div>
            <div class="col-lg-4 text-lg-end text-center">
                Copyright 2023 - Blaxcut by Designesia
            </div>
        </div>
    </div>
</footer>
<!-- footer close -->
<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="text-center" id="modalTitleId">Nhập số điện thoại</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id='name_error' class='error'>Please enter your name.</div>
                <div class="mb25">
                    <input type='text' name='Name' id='name' class="form-control" placeholder="Số điện thoại"
                        required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">chuyển</button>
            </div>
        </div>
    </div>
</div>
<!-- Optional: Place to the bottom of scripts -->
</div>
