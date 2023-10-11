<?php

namespace App\Http\Controllers\Admin\WorkScheduleManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WorkSchedule\StoreRequest;
use App\Http\Requests\Admin\WorkSchedule\UpdateRequest;
use App\Models\Admin;
use App\Models\Time;
use App\Models\WorkSchedule;
use App\Models\WorkScheduleDetail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Throwable;

class WorkScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $employeeId = $request->query('id');
            $employee = Admin::query()->findOrFail($employeeId);

            $workSchedules = WorkSchedule::query()
                ->with('times')
                ->where('admin_id', $employeeId)
                ->latest()
                ->paginate(10);

            return view('admin.WorkSchedule.index', compact('workSchedules', 'employee'));
        } catch (\Throwable $th) {
            if ($th instanceof ModelNotFoundException) {
                return response(['message' => 'Không tìm thấy nhân viên'], 404);
            }

            return response(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            $times = Time::all();
            $employeeId = $request->query('id');
            $employee = Admin::findOrFail($employeeId);
            return view('admin.WorkSchedule.create', compact('times', 'employee'));
        } catch (Throwable $th) {
            if ($th instanceof ModelNotFoundException) {
                return response(['message' => 'Không tìm thấy nhân viên'], 404);
            }
            return response(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $workSchedule = WorkSchedule::create($request->all());
            $workSchedule->times()->sync($request->times);
            return redirect()->route('admin.work-schedule.index',['id' => $workSchedule->admin_id])->with('success', 'Lịch làm việc đã được thêm thành công');
        } catch (Throwable $th) {
            return response(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        try {
            $timeId = $request->query('time_id');
            $time = Time::query()->findOrFail($timeId);
            $workSchedule = WorkSchedule::query()->findOrFail($id);
            $workScheduleDetail = WorkScheduleDetail::where('work_schedules_id', $id)->where('time_id', $timeId)->first();
            return view('admin.WorkSchedule.show', compact('workScheduleDetail', 'workSchedule', 'time'));
        } catch (Throwable $th) {
            if ($th instanceof ModelNotFoundException) {
                return response(['message' => 'Kh@mail t®,m thocht không tồn tại'], 404);
            }
            return response(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        try {
            $workSchedule = WorkSchedule::with('times')->findOrFail($id);
            $times = Time::all();
            $employeeId = $request->query('id');
            $employee = Admin::query()->findOrFail($employeeId);
            return view('admin.WorkSchedule.edit', compact('workSchedule', 'times', 'employee'));
        } catch (Throwable $th) {
            if ($th instanceof ModelNotFoundException) {
                return response(['message' => 'Không tìm thấy nhân viên'], 404);
            }
            return response(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            $workSchedule = WorkSchedule::findOrFail($id);
            $workSchedule->update($request->all());
            $workSchedule->times()->sync($request->times);
            return to_route('admin.work-schedule.index', ['id' => $workSchedule->admin_id])->with('success', 'Lịch làm việc của nhân viên đã được cập nhật thành công');
        } catch (Throwable $th) {
            return response(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $workSchedule = WorkSchedule::findOrFail($id);
            $workSchedule->times()->detach();
            $workSchedule->delete();
            return response(['message' => 'Xóa lịch làm việc thành công', 'status' => 200], 200);
        } catch (Throwable $th) {
            return response(['message' => $th->getMessage()], 500);
        }
    }
}
