<?php

namespace App\Http\Controllers\Admin\EmployeeManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Employee\StoreRequest;
use App\Http\Requests\Admin\Employee\UpdateRequest;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            
        }catch (\Throwable $th) {
            return response()->json($th);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $params = $request->all();
            if($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $file = $request->file('avatar');
               $name= upload_file('admin/avatar',$file);
                $params['avatar'] = $name;
            }
            $employee = Admin::create($params);
            return to_route('admin.employee.index')->with('success', 'Thêm mới thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
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
            return view('admin.employee.edit', compact('employee'));
        } catch (\Throwable $th) {
            return response()->json($th);
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
            if($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $file = $request->file('avatar');
               $name= upload_file('admin/avatar',$file);
               $params['avatar'] = $name;
               delete_file($employee->avatar);
            }
            $employee->update($params);
            return to_route('admin.employee.index')->with('success', 'Cập nhật thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $employee = Admin::findOrFail($id);
            $employee->delete();
            return response()->json(['status' => 'success', 'message' => 'Xoá thành công']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
