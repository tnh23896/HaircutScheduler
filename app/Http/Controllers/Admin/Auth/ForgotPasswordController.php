<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\Admin\Auth\ForgotPasswordRequests;

class ForgotPasswordController extends Controller
{
    // use SendsPasswordResetEmails;

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
        DB::table('admin_password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('admin.Auth.forget-password-email', ['token' => $token,'email'=>$request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have emailed your password reset link!');
    }

    public function ResetPassword(Request $request, $token, $email)
    {
        return view('admin.Auth.forget-password-link', ['token' => $token,'email'=>$email]);
    }

    public function ResetPasswordStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $update = DB::table('admin_password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();

        if (!$update) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = Admin::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        // Delete password_resets record
        DB::table('admin_password_resets')->where(['email' => $request->email])->delete();

        return redirect()->route('admin.login')->with('message', 'Your password has been successfully changed!');
    }
}
