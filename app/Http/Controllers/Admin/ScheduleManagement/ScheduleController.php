<?php

namespace App\Http\Controllers\Admin\ScheduleManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScheduleManagement\UpdateRequest;
use App\Models\Booking;
use App\Models\BookingDetail;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Booking::all();
        return view('admin.scheduleManagement.index', compact('data'));
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

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
//        $data = Booking::query()->findOrFail($id);
//        return view('admin.scheduleManagement.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            $data = Booking::query()->findOrFail($id);
            $data->status = $request->status;
            $data->save();
            return response()->json([
                'status' => 200,
                'success' => 'Cập nhật thành công'
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'success' => 'Cập nhật thất bại'
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
