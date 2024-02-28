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

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Mật khẩu cũ không đúng']);
        }

        // Update the password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Mật khẩu đã được thay đổi thành công');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
