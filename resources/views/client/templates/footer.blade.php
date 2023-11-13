<footer class="footer-area py-120 position-relative">
    <div class="container">
        <div class="wiget">
            <div class="row">
                <div class="col-lg-4  col-md-12 col-sm-12">
                    <div class="widget">
                        <div class="wiget-content">
                            <div>
                                <a href="javascript:void(0)"><img src="{{ asset('dist/images/logo.png') }}" width="115px"
                                        alt="blog-image"></a>
                                <P class="wiget-description mb-1">Trải nghiệm đặt lịch nhanh chóng và nhiều tiện ích
                                    khác với ứng dụng DTBarber.</P>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 pl-3">
                    <div class="widget">
                        <div class="text-white wiget-title">
                            Hỗ trợ
                        </div>
                        <div>

                            <ul class="text-white wiget-link wiget-hover">
                                <li><a href="javascript:void(0)"><span><i class="fas fa-angle-right"></i></span>Giúp
                                        đỡ</a>
                                </li>
                                <li><a href="javascript:void(0)"><span><i class="fas fa-angle-right"></i></span>Giới
                                        thiệu</a></li>
                                <li><a href="javascript:void(0)"><span><i class="fas fa-angle-right"></i></span>Chính
                                        sách</a></li>
                                <li><a href="javascript:void(0)"><span><i class="fas fa-angle-right"></i></span>Chi
                                        tiết</a></li>
                                <li><a href="javascript:void(0)"><span><i class="fas fa-angle-right"></i></span>Liên hệ</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="widget">
                        <div class="wiget-title text-white">
                            Liên hệ với chúng tôi
                        </div>
                        <div class="wiget-contact d-flex">
                            <ul class="list-unstyled">
                                <li><span class="text-color">SĐT:</span>0123456789</li>
                                <li><span class="text-color">Hỗ trợ:</span>0123456789</li>
                                <li><span class="text-color">Email:</span><a
                                        href="https://html.webinane.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="254c4b434a654850565144464d40440b464a48">Email@fpt.edu.vn</a>
                                </li>
                            </ul>
                        </div>
                        <p class="c-gray">© 2023 DTBarber</p>
                        <button id="scrollTop" class="scrollTopStick"><svg viewBox="0 0 490.523 490.523" fill="#fff"
                                height="15">
                                <path style="fill:#FFC107;"
                                    d="M487.411,355.047L252.744,120.38c-4.165-4.164-10.917-4.164-15.083,0L2.994,355.047 c-4.093,4.237-3.976,10.99,0.262,15.083c4.134,3.993,10.687,3.993,14.821,0l227.115-227.115l227.115,227.136 c4.237,4.093,10.99,3.976,15.083-0.261c3.993-4.134,3.993-10.688,0-14.821L487.411,355.047z" />
                                <path
                                    d="M479.859,373.266c-2.831,0.005-5.548-1.115-7.552-3.115L245.192,143.015L18.077,370.151 c-4.237,4.093-10.99,3.976-15.083-0.262c-3.993-4.134-3.993-10.687,0-14.821l234.667-234.667c4.165-4.164,10.917-4.164,15.083,0 l234.667,234.667c4.159,4.172,4.148,10.926-0.024,15.085C485.388,372.146,482.681,373.265,479.859,373.266z" />
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                            </svg></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade popup-top" id="modalAuth" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <div class="container" style="max-width: 550px">
                    <div class="alert alert-danger error" id="" style="display: none;"></div>
                    <h3>Đăng nhập</h3>
                    <div class="alert alert-success successAuth" id="" style="display: none;"></div>
                    <form class="formSendOtp">
                        <label>Phone Number:</label>
                        <input type="text" name="phoneOtpNumberInput" class="form-control "
                            placeholder="+84********">
                        <div id="recaptcha-container" class="mt-3"></div>
                        <button class="btn btn-primary mt-3">Send OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
