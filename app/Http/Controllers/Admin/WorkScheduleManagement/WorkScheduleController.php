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
    public function index(Request $request)
    {
        try {
            $employeeId = $request->query('id');
            $employee = Admin::findOrFail($employeeId);

            $workSchedules = WorkSchedule::with('times')
                ->where('admin_id', $employeeId)
                ->latest()
                ->paginate(10);

            $times = Time::all();

            return view('admin.WorkSchedule.index', compact('workSchedules', 'employee', 'times'));
        } catch (ModelNotFoundException $exception) {
            return view('admin.errors.404');;
        } catch (\Throwable $exception) {
            return response(['message' => $exception->getMessage()], 500);
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

            return response()->json(
                [
                    'success' => 'Tạo lịch làm việc thành công',
                ],
                200
            );
        } catch (Throwable $th) {
            return response([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        try {
            $timeId = $request->query('time_id');
            $time = Time::findOrFail($timeId);
            $workSchedule = WorkSchedule::findOrFail($id);
            $workScheduleDetail = WorkScheduleDetail::where('work_schedules_id', $id)
                ->where('time_id', $timeId)
                ->first();
            return view('admin.WorkSchedule.show', compact('workScheduleDetail', 'workSchedule', 'time'));
        } catch (ModelNotFoundException $exception) {
            return view('admin.errors.404');
        } catch (Throwable $exception) {
            return response(['message' => $exception->getMessage()], 500);
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
            return response([
                'success' => 'Cập nhật thành công',
            ], 200);
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
            return response(['success' => 'Xoá thành công']);
        } catch (ModelNotFoundException $exception) {
            return view('admin.errors.404');
        } catch (Throwable $exception) {
            return response(['message' => $exception->getMessage()], 500);
        }
    }
}
