<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('dist/images/logonew2.png')}}" rel="shortcut icon">
    <meta charset="utf-8">
    @include('client.templates.link_header')
    @yield('css_header_custom')
</head>

<body>
    @yield('content')
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
                        <form class="formVerifyOtp">
                            <div class="alert alert-success successOtpAuth" id="" style="display: none;"></div>
                            <div class="alert alert-danger error" id="" style="display: none;"></div>
                            <input type="text" name="verification" class="form-control"
                                placeholder="Nhập mã xác minh " style="height: 50px">
                                <button class="theme-btn-2" style=" width: 30%;padding: 20px 15px;height: 10px;margin: 10px 0 ;">
                            <h6 style="color: white; transform: translateY(-10px)">Xác nhận</h6>
                        </button>
                        </form>
                `
                $(containForm).html(html);
                $('.formVerifyOtp').submit(function(e) {
                    e.preventDefault();
                    verify(this);
                })
                $(containForm).find(".successAuth").show();
            }).catch(function(error) {
                $(containForm).find(".error").text("Sai số điện thoại");
                $(containForm).find(".error").show();
            });
        }

        function verify(form) {
            var code = $(form).find('input[name="verification"]').val();
            coderesult.confirm(code).then(function(result) {
                var user = result.user;
                const formData = new FormData();
                formData.append('phone', user.phoneNumber);
                const url = "{{ route('loginOtp') }}";
                sendAjaxRequest(url, 'post', formData, function(response) {
                        console.log(response);
                        console.log($(form).closest('#modalAuth').eq(1));
                        if ($(form).closest('#modalAuth').length) {
                            toastr.success("Xác thực thành công");
                            location.reload();  
                            
                        } else {
                            toastr.success("Xác thực thành công");
                            const user = response.data;
                            location.reload();  
                            $(form).parent().html(html);
                        }
                    },
                    function(error) {
                        console.log(error);
                    }
                )
            }).catch(function(error) {
                $(form).find(".error").text("Mã code sai");
                $(form).find(".error").show();
            });
        }
    </script>
    @yield('js_footer_custom')
</body>

</html>
