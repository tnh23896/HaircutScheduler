<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\RessetPasswordRequests;
use Illuminate\Http\Request;

class RessetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function resetPassword(RessetPasswordRequests $request)
    {
        // Lấy người dùng hiện tại thông qua Guard 'admin'
        $user = Auth::guard('admin')->user();

        // Kiểm tra mật khẩu cũ
        if (!(Hash::check($request->input('current_password'), $user->password))) {
            return back()->with("error", "Mật khẩu cũ không đúng.");
        }

        // Kiểm tra mật khẩu mới và xác nhận mật khẩu mới
        $newPassword = $request->input('new_password');
        $passwordConfirmation = $request->input('new_password_confirmation');

        if (strlen($newPassword) < 8) {
            return back()->with("error", "Mật khẩu mới phải có ít nhất 8 ký tự.");
        }

        if ($newPassword !== $passwordConfirmation) {
            return back()->with("error", "Mật khẩu mới và xác nhận mật khẩu không khớp.");
        }

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($newPassword);
        $user->save();

        return back()->with("success", "Mật khẩu đã được cập nhật thành công.");
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
