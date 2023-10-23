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
    @include('client.templates.navbar')
    @yield('content')
    @include('client.templates.footer')
    @include('client.templates.link_footer')
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyDpy2TAIj9-BtVnZu_CWtolm3WowSDgwJk",
            authDomain: "laravel-otp-sms-7ee42.firebaseapp.com",
            databaseURL: "https://laravel-otp-sms-7ee42-default-rtdb.firebaseio.com",
            projectId: "laravel-otp-sms-7ee42",
            storageBucket: "laravel-otp-sms-7ee42.appspot.com",
            messagingSenderId: "130352275706",
            appId: "1:130352275706:web:12f4f4a111394a14f92943",
            measurementId: "G-Y9GJQRNXR1"
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

        function sendOTP() {
            var number = $("#number").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                const html = `
                <div class="mb-5 mt-5">
                        <h3>Add verification code</h3>
                        <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                        <form>
                            <input type="text" id="verification" class="form-control"
                                placeholder="Verification code">
                            <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
                        </form>
                    </div>
                `
                $("#modal-body").html(html);
                $("#successAuth").show();
            }).catch(function(error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }

        function verify() {
            var code = $("#verification").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            coderesult.confirm(code).then(function(result) {
                var user = result.user;
                console.log(user);
                console.log(user.phoneNumber);
                const formData = new FormData();
                formData.append('phone', user.phoneNumber);
                const url = "{{ route('loginOtp') }}";
                sendAjaxRequest(url, 'post', formData, function(response) {
                        console.log(response);
                        $("#exampleModalCenter").hide();
                    },
                    function(error) {
                        console.log(error);
                    }
                )
            }).catch(function(error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
        
        
    </script>
    @yield('js_footer_custom')
</body>

</html>
