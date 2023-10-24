<?php

namespace App\Http\Controllers\Admin\EmployeeManagement;

use Exception;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Employee\StoreRequest;
use App\Http\Requests\Admin\Employee\UpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $employees = Admin::latest()->paginate(10);
            return view('admin.employee.index', compact('employees'));

        } catch (\Throwable $th) {
            return response()->json($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.employee.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $requestData = $request->all();

            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $file = $request->file('avatar');
                $avatarName = upload_file('admin/avatar', $file);
                $requestData['avatar'] = $avatarName;
            }

            $employee = Admin::create($requestData);
            $employee->assignRole($request->input('roles'));
            return redirect()->route('admin.employee.index')->with('success', 'Thêm mới nhân viên thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
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
        try {
            $employee = Admin::findOrFail($id);
            $roles = Role::pluck('name', 'name')->all();
            $employeeRole = $employee->roles->pluck('name', 'name')->all();
            return view('admin.employee.edit', compact('employee', 'roles', 'employeeRole'));
        } catch (ModelNotFoundException $exception) {
            return response(['message' => 'Not found employee'], 404);
        } catch (\Throwable $exception) {
            return response(['message' => $exception->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            $employee = Admin::findOrFail($id);
            $params = $request->all();

            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $file = $request->file('avatar');
                $avatarName = upload_file('admin/avatar', $file);
                $params['avatar'] = $avatarName;
                delete_file($employee->avatar);
            }

            $employee->update($params);
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $employee->assignRole($request->input('roles'));

            return redirect()->route('admin.employee.index')->with('success', 'Updated successfully');
        } catch (ModelNotFoundException $e) {
            return response(['message' => 'Not found employee'], 404);
        } catch (Exception $e) {
            return response(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $admin = Admin::findOrFail($id);
            $admin->delete();
            return response()->json(['status' => 'success', 'message' => 'Deleted successfully']);
        } catch (\Throwable $exception) {
            return response()->json(['status' => 'error', 'message' => $exception->getMessage()]);
        }
    }
}
