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
        $employeeId = auth()->guard('admin')->id();
        $employee = Admin::find($employeeId);
        $workSchedules = WorkSchedule::with('times')
        ->where('admin_id', $employeeId)
        ->latest()
        ->paginate(10);

        $bookings = Booking::where('bookings.admin_id', $employeeId)
        ->latest()
        ->join('booking_details', 'bookings.id', '=', 'booking_details.booking_id')
        ->join('services', 'booking_details.service_id', '=', 'services.id')
        ->select('bookings.*', 'services.name as service_name')
        ->get();
        return view('admin.ScheduleEmployee.index',  compact('workSchedules', 'employee', 'bookings'));
    }


}
