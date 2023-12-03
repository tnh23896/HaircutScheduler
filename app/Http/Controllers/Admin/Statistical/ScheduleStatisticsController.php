<?php

namespace App\Http\Controllers\Admin\Statistical;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ScheduleStatisticsController extends Controller
{
    public function index()
    {
		$timeslots = $this->mostUsedTime();
        return view('admin.Statistical.scheduleStatistics',compact('timeslots'));
    }

	 public function search(Request $request)
    {
        $timeslots = $this->searchMostUsedTime($request);
        return response()->json(['timeslots' => $timeslots]);
    }

    private function mostUsedTime()
    {
        $timeslots = DB::table('times')
            ->leftJoin('bookings', function ($join) {
                $join->on('times.time', '=', 'bookings.time')
                    ->whereYear('bookings.day', now()->year)
                    ->whereMonth('bookings.day', now()->month);
            })
            ->select(
                'times.id',
                'times.time',
                DB::raw('COUNT(CASE WHEN bookings.status = "success" THEN 1 END) as successful_booking_count'),
                DB::raw('COUNT(CASE WHEN bookings.status = "canceled" THEN 1 END) as canceled_booking_count'),
                DB::raw('COUNT(bookings.id) as total_booking_count')
            )
            ->groupBy('times.id', 'times.time')
            ->get();

        return $timeslots;
    }
    private function searchMostUsedTime(Request $request)
    {
        $startDate = $request->start_date; 
        $endDate = $request->end_date;   
        $timeslots = DB::table('times')
            ->leftJoin('bookings', function ($join) use ($startDate, $endDate) {
                $join->on('times.time', '=', 'bookings.time');

                // Kiểm tra nếu cả hai ngày đều không rỗng thì sử dụng whereBetween
                if (!empty($startDate) && !empty($endDate)) {
                    $join->whereBetween('bookings.day', [$startDate, $endDate]);
                } else {
                    // Nếu có ít nhất một ngày rỗng, kiểm tra từng ngày để sử dụng whereDate
                    if (!empty($startDate)) {
                        $join->whereDate('bookings.day', $startDate);
                    } elseif (!empty($endDate)) {
                        $join->whereDate('bookings.day', $endDate);
                    }
                }
            })
            ->select(
                'times.id',
                'times.time',
                DB::raw('COUNT(CASE WHEN bookings.status = "success" THEN 1 END) as successful_booking_count'),
                DB::raw('COUNT(CASE WHEN bookings.status = "canceled" THEN 1 END) as canceled_booking_count'),
                DB::raw('COUNT(bookings.id) as total_booking_count')
            )
            ->groupBy('times.id', 'times.time')
            ->get();

        return $timeslots;
    }
}