<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\UpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $id = auth()->guard('admin')->user()->id;
        $data = Admin::where('id', $id)->first();
        $roleName = DB::table('roles')->where('id', $id)->value('name');
        return view('admin.Profile.index', compact('data', 'roleName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request)
    {
        try {
            $data = Admin::findOrFail(auth()->guard('admin')->user()->id);
            $params = $request->validated();
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $file = $request->file('avatar');
                $avatarName = upload_file('admin/avatar', $file);
                $params['avatar'] = $avatarName;
                delete_file($data->avatar);
            }
            $data->update($params);
            return response()->json([
                "success" => "Cập nhật thành công ",
                "status" => 200
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => 'Cập nhật thất bại'
            ]);
        }
    }
}
