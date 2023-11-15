<?php

namespace App\Http\Controllers\Admin\Auth;


use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordEmail;
use App\Models\AdminPasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendForgotPasswordEmail;

class ForgotPasswordController extends Controller
{

    public function showLinkRequestForm()
    {
        return view('admin.Auth.forget-password');
    }

    public function ForgetPasswordStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);

        $token = Str::random(64);
        $email = $request->email;
        // Lưu token vào cơ sở dữ liệu
        AdminPasswordReset::create([
            'email' => $request->email,
            'token' => $token,
        ]);
        SendForgotPasswordEmail::dispatch( $token, $email );
        
        return back()->with('success', 'Chúng tôi đã gửi email để đặt lại mật khẩu của bạn.');
    }


    public function ResetPassword($token, $email)
    {
        return view('admin.Auth.forget-password-link', ['token' => $token, 'email' => $email]);
    }

    public function ResetPasswordStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

         $checkEmailToken = AdminPasswordReset::where(['email' => $request->email, 'token' => $request->token])->first();

        if (!$checkEmailToken) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        Admin::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        AdminPasswordReset::where(['email' => $request->email])->delete();

        return redirect()->route('admin.login')->with('success', 'Your password has been successfully changed!');
    }
}
