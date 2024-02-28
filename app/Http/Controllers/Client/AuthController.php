<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $user = User::where('phone', $request->phone)->first();
            if ($user) {
                Auth::login($user);
                return response()->json(['status' => 'success', 'data' => $user]);
            } else {
                $new = new User();
                $new->phone = $request->phone;
                $new->save();
                Auth::login($new);
                return response()->json(['status' => 'success', 'data' => $new]);
            }
        } catch (\Throwable $th) {
            return response()->json($th);
            toastr()->error('Đăng nhập thất bại');
        }
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        toastr()->success('Đăng xuất thành công');
        return redirect()->route('home.index');
    }
}
