<footer class="footer-area py-120 position-relative">
    <div class="container">
        <div class="wiget">
            <div class="row">
                <div class="col-lg-4  col-md-12 col-sm-12">
                    <div class="widget">
                        <div class="wiget-content">
                            <div>
                                <a href="javascript:void(0)"><img src="{{ asset('client/assets/images/blacklogo.png') }}"
                                        width="115px" alt="blog-image"></a>
                                <P class="wiget-description mb-1">Etiam semper nibh orci, ac timcidunt mi
                                    consectetur a. In quis tortor ex. Morbi cursus sed neque quis dictum.</P>
                                <form class="footer-mail d-flex">
                                    <input type="text" name="email" placeholder="Enter Your Email address">
                                    <button class="bg-dark-color"><i class="far fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 pl-3">
                    <div class="widget">
                        <div class="text-white wiget-title">
                            USEFUL LINKS
                        </div>
                        <div>

                            <ul class="text-white wiget-link wiget-hover">
                                <li><a href="javascript:void(0)"><span><i class="fas fa-angle-right"></i></span>Help</a>
                                </li>
                                <li><a href="javascript:void(0)"><span><i
                                                class="fas fa-angle-right"></i></span>Information</a></li>
                                <li><a href="javascript:void(0)"><span><i class="fas fa-angle-right"></i></span>Privacy
                                        Policy</a></li>
                                <li><a href="javascript:void(0)"><span><i class="fas fa-angle-right"></i></span>Shipping
                                        Details</a></li>
                                <li><a href="javascript:void(0)"><span><i class="fas fa-angle-right"></i></span>About
                                        Us</a></li>
                                <li><a href="javascript:void(0)"><span><i
                                                class="fas fa-angle-right"></i></span>Careers</a></li>
                                <li><a href="javascript:void(0)"><span><i class="fas fa-angle-right"></i></span>Refunds
                                        & Returns</a></li>
                                <li><a href="javascript:void(0)"><span><i
                                                class="fas fa-angle-right"></i></span>Deliveries</a></li>
                                <li><a href="javascript:void(0)"><span><i class="fas fa-angle-right"></i></span>Help
                                        & Faq's</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="widget">
                        <div class="wiget-title text-white">
                            CONTACT US
                        </div>
                        <div class="wiget-contact d-flex">
                            <ul class="list-unstyled">
                                <li><span class="text-color">Phone:</span>+010 234 789234</li>
                                <li><span class="text-color">Fax:</span>+010 435 5798982</li>
                                <li><span class="text-color">Email:</span><a
                                        href="https://html.webinane.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="254c4b434a654850565144464d40440b464a48">[email&#160;protected]</a>
                                </li>
                            </ul>
                        </div>
                        <p class="c-gray">1394 Argonne Street, New Castle, USA</p>
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
<div class="modal fade popup-top" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <div class="container" style="max-width: 550px">
                    <div class="alert alert-danger" id="error" style="display: none;"></div>
                    <h3>Đăng nhập</h3>
                    <div class="alert alert-success" id="successAuth" style="display: none;"></div>
                    <form>
                        <label>Phone Number:</label>
                        <input type="text" id="number"  class="form-control " placeholder="+84********">
                        <div id="recaptcha-container" class="mt-3"></div>
                        <button type="button" class="btn btn-primary mt-3" onclick="sendOTP();">Send OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
