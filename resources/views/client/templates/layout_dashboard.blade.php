<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    @include('client.templates.link_header')
    @yield('css_header_custom')
</head>

<body>
    @include('client.templates.navbar2')
    <section class="position-relative footer-area">
        <div class="container bg-text-area">
            <h2>@yield('title_page')</h2>
            <span>Free Shave Towel with orders $30 or more</span>
        </div>
    </section>
    <section>
        <div class="block less-spacing gap  gray-bg top-padding30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="dashboard-tabs-wrapper">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-3">
                                        <div class="profile-sidebar brd-rd5 wow fadeIn" data-wow-delay="0.2s">
                                            @include('client.templates.sidebar')
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-9">
                                        <div class="tab-content">
                                            @yield('content')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Section Box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('client.templates.footer')
    @include('client.templates.link_footer')
    <script>
        const firebaseConfig = {
            apiKey: "AIzaSyAPZ866PDueBJ2lQtNclrC6Ek6qycU3low",
            authDomain: "push-notification-9fc82.firebaseapp.com",
            projectId: "push-notification-9fc82",
            storageBucket: "push-notification-9fc82.appspot.com",
            messagingSenderId: "880794073299",
            appId: "1:880794073299:web:ad4d96a242f826d3113c26",
            measurementId: "G-F1K4K9S19S"
        };
        firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript">
        window.onload = function() {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }
        $('.formSendOtp').submit(function(e) {
            e.preventDefault();
            sendOTP(this);

        })

        function sendOTP(form) {
            const id = $(form).data("id");
            var number = $(form).find('input[name="phoneOtpNumberInput"]').val();
            if (number.startsWith("0")) {
                number = "+84" + number.substring(1);
            }
            const containForm = $(form).parent();

            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                const html = `
                        <h3>Mã code xác minh</h3>
                        <div class="alert alert-success successOtpAuth" id="" style="display: none;"></div>
                        <div class="alert alert-danger error" id="" style="display: none;"></div>
                        <form class="formVerifyOtp" data-id="${id}">

                            <input type="text" name="verification" class="form-control"
                                placeholder="Verification code">
                            <button type="submit" class="btn btn-danger mt-3">Xác minh</button>
                        </form>
                `
                $(containForm).html(html);
                $('.formVerifyOtp').submit(function(e) {
                    e.preventDefault();
                    verify(this);
                })
                $(containForm).find(".successAuth").show();
            }).catch(function(error) {
                $(containForm).find(".error").text(error.message);
                $(containForm).find(".error").show();
            });
        }
        function verify(form) {
            const id = $(form).data("id");
            var code = $(form).find('input[name="verification"]').val();
            coderesult.confirm(code).then(function(result) {
                var user = result.user;
                const formData = new FormData();
                formData.append('phone', user.phoneNumber);
                let url = "{{ route('booking-history.delete', ['id' => ':id']) }}";
                url = url.replace(':id', id);
                console.log(user);
                sendAjaxRequest(url, 'post', formData, function(response) {
                        console.log(response);
                        if ($(form).closest(`#modaldelete${id}`).length) {
                            toastr.success("Xác thực thành công");
                            $(`#modaldelete${id}`).modal('hide');
                            location.reload();  
                        }
                    },
                    function(error) {
                        console.log(error);
                    }
                )
            }).catch(function(error) {
                $(form).find(".error").text(error.message);
                $(form).find(".error").show();
            });
        }
    </script>
    @yield('js_footer_custom')
</body>

</html>
