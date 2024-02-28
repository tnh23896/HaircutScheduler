<?php

namespace App\Http\Controllers\Admin\ScheduleEmployee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployeeWorkSchedule\StoreRequest;
use App\Http\Requests\Admin\EmployeeWorkSchedule\UpdateRequest;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Shift;
use App\Models\Time;
use App\Models\WorkSchedule;
use App\Models\WorkScheduleDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ScheduleEmployeeController extends Controller
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
                ->orderByRaw("day = CURDATE() DESC, STR_TO_DATE(day, '%d/%m/%Y') DESC")
                ->orderBy('day', 'DESC')
                ->paginate(7);
            $bookings = Booking::where('bookings.admin_id', $employeeId)
                ->latest()
                ->join('booking_details', 'bookings.id', '=', 'booking_details.booking_id')
                ->join('services', 'booking_details.service_id', '=', 'services.id')
                ->select('bookings.*', 'services.name as service_name')
                ->get();
            return view('admin.ScheduleEmployee.index', compact('workSchedules', 'employee', 'bookings', 'timeSlots', 'shifts'));
        } catch (\Exception $e) {
            return redirect()->route('admin.ScheduleEmployee.index')->with('error', 'Có lỗi xảy ra khi lấy dữ liệu.');
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            // Lấy dữ liệu từ request
            $chooseType = $request->input('formType');
            $employeeId = auth()->guard('admin')->id();
            $selectedTimeSlots = $request->input('timeSlots');
            if ($chooseType === 'week' && Carbon::now()->greaterThan(Carbon::parse($request->input('week'))->startOfWeek())) {
                return redirect()->route('admin.ScheduleEmployee.index')->with('error', 'Không thể đăng ký lịch cho thời gian đã qua.');
            }

            if ($chooseType === 'date') {
                // Xử lý theo ngày
                $selectedDate = $request->input('date');
                $this->processByDate($employeeId, $selectedDate, $selectedTimeSlots);
            } elseif ($chooseType === 'week') {
                // Xử lý theo tuần
                $selectedWeekStart = Carbon::parse($request->input('week'))->startOfWeek()->format('Y-m-d');
                $selectedWeekEnd = Carbon::parse($request->input('week'))->endOfWeek()->format('Y-m-d');
                $this->processByWeek($employeeId, $selectedWeekStart, $selectedWeekEnd, $selectedTimeSlots);
            }

            return redirect()->route('admin.ScheduleEmployee.index')->with('success', 'Đăng ký lịch làm việc thành công');
        } catch (\Exception $e) {
            // Handle the exception, you can log it or redirect with an error message
            return redirect()->route('admin.ScheduleEmployee.index')->with('error', 'Đã xảy ra lỗi.');
        }
    }

    private function processByDate($employeeId, $selectedDate, $selectedTimeSlots)
    {
        try {
            $currentDate = Carbon::now()->format('Y-m-d');
            $workSchedule = WorkSchedule::create([
                'admin_id' => $employeeId,
                'day' => $selectedDate,
            ]);
            // dd($selectedTimeSlots);
            foreach ($selectedTimeSlots as $timeSlotId) {
                $times = Time::where('shift_id', $timeSlotId)->get();
                foreach ($times as $time) {
                    WorkScheduleDetail::create([
                        'time_id' => $time->id,
                        'work_schedules_id' => $workSchedule->id,
                        'status' => 'available',
                    ]);
                }

            }
        } catch (\Exception $e) {
            // Handle the exception, you can log it or redirect with an error message
            return redirect()->route('admin.ScheduleEmployee.index')->with('error', 'Đã xảy ra lỗi');
        }
    }

    private function processByWeek($employeeId, $selectedWeekStart, $selectedWeekEnd, $selectedTimeSlots)
    {
        try {
            $currentDate = Carbon::now()->format('Y-m-d');
            for ($date = $selectedWeekStart; $date <= $selectedWeekEnd; $date = Carbon::parse($date)->addDay()->format('Y-m-d')) {
                if (Carbon::parse($date)->lessThan($currentDate)) {
                    continue;
                }
                $workSchedule = WorkSchedule::create([
                    'admin_id' => $employeeId,
                    'day' => $date,
                ]);
                foreach ($selectedTimeSlots as $timeSlotId) {
                    $times = Time::where('shift_id', $timeSlotId)->get();
                    foreach ($times as $time) {
                        WorkScheduleDetail::create([
                            'time_id' => $time->id,
                            'work_schedules_id' => $workSchedule->id,
                            'status' => 'available',
                        ]);
                    }

                }
            }
        } catch (\Exception $e) {
            // Handle the exception, you can log it or redirect with an error message
            return redirect()->route('admin.ScheduleEmployee.index')->with('error', 'Đã xảy ra lỗi.');
        }
    }

    public function search(Request $request)
    {
        try {
            $employeeId = auth()->guard('admin')->id();
            $selectedDate = $request->input('search');
            $shifts = Shift::all();
            if ($selectedDate) {
                // Lọc danh sách lịch làm việc của nhân viên theo ngày
                $workSchedules = WorkSchedule::with('times')
                    ->where('admin_id', $employeeId)
                    ->whereDate('day', Carbon::parse($selectedDate)->format('Y-m-d'))
                    ->paginate(7);
            } else {
                // Fetch default results
                $workSchedules = WorkSchedule::with('times')
                    ->where('admin_id', $employeeId)
                    ->latest()
                    ->paginate(7);
            }

            // Fetch employee data
            $employee = Admin::find($employeeId);

            // Fetch time slots data
            $timeSlots = Time::all();

            // Fetch bookings data
            $bookings = Booking::where('bookings.admin_id', $employeeId)
                ->latest()
                ->join('booking_details', 'bookings.id', '=', 'booking_details.booking_id')
                ->join('services', 'booking_details.service_id', '=', 'services.id')
                ->select('bookings.*', 'services.name as service_name')
                ->get();

            return view('admin.ScheduleEmployee.index', compact('workSchedules', 'employee', 'timeSlots', 'bookings', 'selectedDate', 'shifts'));
        } catch (\Exception $e) {
            // Handle the exception, you can log it or redirect with an error message
            return redirect()->route('admin.ScheduleEmployee.index')->with('error', 'Đã xảy ra lỗi.');
        }
    }
    public function update(UpdateRequest $request, $id)
    {
        try {
            $workSchedule = WorkSchedule::findOrFail($id);
            $editTimeLimit = now()->subHours(24);
            if ($workSchedule->created_at < $editTimeLimit) {
                return redirect()->back()->with('error', 'Đã hết thời gian sửa lịch.');
            }
            $workSchedule->getConnection()->beginTransaction();
            $times = $request->input('times', []);
            if (count($times) < 1) {
                return redirect()->back()->with('error', 'Vui lòng chọn ít nhất một khoảng thời gian làm việc.');
            }
            $workSchedule->times()->sync($times);
            $workSchedule->save();
            $workSchedule->getConnection()->commit();

            return redirect()->route('admin.ScheduleEmployee.index')->with('success', 'Cập nhật thành công.');
        } catch (\Exception $e) {
            return redirect()->route('admin.ScheduleEmployee.index')->with('error', 'Có lỗi xảy ra khi cập nhật lịch.');
        }
    }
}
