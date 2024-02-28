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
        $data = User::latest()->paginate(10);
        return view('admin.UserManagement.index', compact('data'));
    }

    public function search(Request $request)
    {
        try {
            $search = $request->input('search');
            $fields = ['username', 'email', 'phone'];
            $data = search(User::class, $search, $fields)
                ->latest()
                ->paginate(10)
                ->withQueryString();
            return view('admin.UserManagement.index', compact('data'));
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'Tìm kiếm thất bại'
            ], 500);
        }
    }

    public function filter(Request $request)
    {
        try {
            $status = $request->input('filter');
            if ($status == "") {
                $data = User::latest()->paginate(10);
            } else {
                $data = User::where('black_status', $status)
                    ->latest()
                    ->paginate(10);
            }
            return view('admin.UserManagement.index', compact('data'));
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'Tìm kiếm thất bại'
            ], 500);
        }
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
    public function update(Request $request, string $id)
    {
        try {
            $param = $request->except('_token');
            User::where('id', $id)->update($param);
            return response()->json([
                "success" => "Cập nhật thành công",
                "status" => 200
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => 'Cập nhật thất bại'
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
