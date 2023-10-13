<?php

namespace App\Http\Controllers\Admin\ScheduleEmployee;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Time;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ScheduleEmployeeController extends Controller
{
    public function index()
    {
        // $employeeId = Auth::id();
        Session::put('id',2);
        $employeeId = Session::get('id');
        $employee = Admin::find($employeeId);
        $workSchedules = WorkSchedule::query()
        ->with('times')
        ->where('admin_id', $employeeId)
        ->latest()->paginate(10);

        $bookings = Booking::query()
        ->with('times')
        ->where('admin_id', $employeeId)
        ->latest()->paginate(10);

        return view('admin.ScheduleEmployee.index',  compact('workSchedules', 'employee', 'bookings'));
    }
}
