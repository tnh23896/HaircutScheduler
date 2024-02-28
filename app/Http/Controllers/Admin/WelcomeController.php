<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Shift;
use App\Models\Time;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        try {
            $employeeId = auth()->guard('admin')->id();
            $employee = Admin::find($employeeId);
            $timeSlots = Time::all();
            $shifts = Shift::all();
            $workSchedules = WorkSchedule::with('times')
            ->where('admin_id', $employeeId)
            ->whereDate('day', now())
            ->get();
            $bookings = Booking::where('bookings.admin_id', $employeeId)
                ->latest()
                ->join('booking_details', 'bookings.id', '=', 'booking_details.booking_id')
                ->join('services', 'booking_details.service_id', '=', 'services.id')
                ->select('bookings.*', 'services.name as service_name')
                ->get();
            return view('admin.welcome', compact('workSchedules', 'employee', 'bookings', 'timeSlots', 'shifts'));
        } catch (\Exception $e) {
            return redirect()->route('admin.welcome')->with('error', 'Có lỗi xảy ra khi lấy dữ liệu.');
        }
    }
}
