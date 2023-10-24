<?php

namespace App\Http\Controllers\Admin\TimeManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TimeManagenent\Time\StoreRequest;
use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Time::orderBy('time', 'asc')->paginate(10);
        return view('admin.TimeManagement.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.TimeManagement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {

            Time::create($request->validated());
            return response()->json([
                "success" => "Thêm mới thời gian thành công",
                "status" => 200
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => 'Thêm mới thời gian thất bại'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Time::find($id);
        return view('admin.TimeManagement.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        try {

            Time::where('id', $id)->update($request->validated());
            return response()->json([
                "success" => "Cập nhật thời gian thành công",
                "status" => 200
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => 'Cập nhật thời gian thất bại'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Time::where('id', $id)->delete();
            return response()->json([
                "success" => "Xóa thời gian thành công",
                "status" => 200
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => 'Xóa thời gian thất bài'
            ]);
        }
    }
}
