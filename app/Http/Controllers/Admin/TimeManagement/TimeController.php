<?php

namespace App\Http\Controllers\Admin\TimeManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TimeManagenent\Time\StoreRequest;
use App\Http\Requests\Admin\TimeManagenent\Time\UpdateRequest;
use App\Models\Shift;
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

    public function search(Request $request)
    {
        try {
            $time = $request->input('time');
            $ampm = $request->input('ampm'); // SA, CH, AM, PM

            $hour = $minute = null;

            if ($time) {
                list($hour, $minute) = explode(':', $time);
                $hour = (int)$hour;
                $minute = (int)$minute;
            }

            // Kiểm tra kiểu thời gian và điều chỉnh giờ dựa trên giá trị của $ampm
            if ($ampm === 'SA' && $hour >= 12) {
                $hour -= 12;
            } elseif ($ampm === 'CH' && $hour < 12) {
                $hour += 12;
            } elseif ($ampm === 'AM' && $hour == 12) {
                $hour = 0;
            } elseif ($ampm === 'PM' && $hour != 12) {
                $hour += 12;
            }

            if ($hour !== null && $minute !== null) {
                $time = sprintf('%02d:%02d', $hour, $minute);
            }

            $query = Time::orderBy('time', 'asc');

            if (!empty($time)) {
                $query->whereRaw('TIME(time) LIKE ?', ["$time%"]);
            }

            $search_time = $query->paginate(10)->withQueryString();

            if (empty($search_time)) {
                return view('admin.TimeManagement.index', ['data' => $search_time]);
            } else {
                $search_time->count() > 0;
                return view('admin.TimeManagement.index', ['data' => $search_time]);
            }
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
        $shift = Shift::all();
        return view('admin.TimeManagement.create',compact('shift'));
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
        } catch (\Exception $exception) {
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
        $shift = Shift::all();
        return view('admin.TimeManagement.edit', compact('data', 'shift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {

            Time::where('id', $id)->update($request->validated());
            return response()->json([
                "success" => "Cập nhật thời gian thành công",
                "status" => 200
            ]);
        } catch (\Exception $exception) {
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
                "success" => "Xóa thời gian làm việc thành công",
                "status" => 200
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => 'Xóa thời gian thất bại'
            ]);
        }
    }
}
