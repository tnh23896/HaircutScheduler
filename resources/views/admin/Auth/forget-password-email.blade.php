<h1>Forget Password Email</h1>

You can reset password from bellow link:
<a href="{{ route('admin.ResetPasswordGet', ['token'=>$token,'email'=>$email]) }}">Reset Password</a>