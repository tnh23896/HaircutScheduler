<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRequest;
use App\Http\Requests\Admin\Role\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::query()->orderByDesc('id')->paginate(10);
        return view('admin.RoleManagement.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.RoleManagement.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $role = new Role();
            $role->fill($request->all());
            $role->save();
            $role->syncPermissions($request->permissions);
            return response()->json(['success' => 'Thêm mới thành công']);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Thêm mới thất bại'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=",
            "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return view('admin.RoleManagement.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::query()->findOrFail($id);
        $permissions = $role->permissions->pluck('name')->toArray();
        return view('admin.RoleManagement.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            $role = Role::query()->findOrFail($id);
            $role->fill($request->all());
            $role->save();
            $role->syncPermissions($request->permissions);
            return response()->json(['success' => 'Cập nhật thành công']);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Cập nhật thất bại'], 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::table("roles")->where('id', $id)->delete();
            return response()->json(['success' => 'Xóa thành công']);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Xóa thất bại'], 500);
        }
    }
}
