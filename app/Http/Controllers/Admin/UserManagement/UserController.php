<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.UserManagement.index',compact('data'));
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
        $data=User::find($id);
        return view('admin.UserManagement.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $param = $request->except('_token');
            User::where('id', $id)->update($param);
            return response()->json([
                "success" => "Cập nhật người dùng thành công",
                "status" => 200
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => 'Cập nhật người dùng thất bại'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
