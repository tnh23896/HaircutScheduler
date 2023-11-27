<?php

namespace App\Http\Controllers\Admin\Statistical;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Booking;
use Illuminate\Http\Request;

class EmployeeAndCustomerStatisticsController extends Controller
{
    public function index()
    {
        $topBooker = $this->basetopBooker();
        $topEmployeesData = $this->baseTopEmployees();
        return view('admin.Statistical.employeeAndCustomerStatistics', compact('topBooker', 'topEmployeesData'));
    }

    public function topBooker(Request $request)
    {
        $bookerData = $this->basefilterTopBooker($request);
        return response()->json(['bookerData' => $bookerData]);
    }

    private function basetopBooker()
    {
        $query = Bill::select('bills.name', 'users.avatar')
            ->selectRaw('count(bills.id) as totalBookings')
            ->selectRaw('SUM(bills.total_price) as totalPrice')
            ->join('users', 'bills.user_id', '=', 'users.id')
            ->groupBy('bills.name', 'users.avatar')
            ->orderBy('totalBookings', 'desc')
            ->orderBy('totalPrice', 'desc')
            ->take(5)
            ->get();
        return $query;
    }

    private function basefilterTopBooker(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        $query = Bill::join('users', 'users.id', '=', 'bills.user_id')
            ->select('bills.name', 'users.avatar', 'bills.user_id')
            ->selectRaw('SUM(bills.total_price) as totalPrice')
            ->selectRaw('COUNT(*) as totalBookings')
            ->groupBy('bills.user_id', 'bills.name', 'users.avatar')
            ->orderByDesc('totalBookings');
        if ($month) {
            $query->whereMonth('day', $month);
        }

        if ($year) {
            $query->whereYear('day', $year);
        }

        $bookerData = $query->take(5)->get();
        return $bookerData;
    }

    private function baseTopEmployees()
    {
        $query = Booking::selectRaw('admins.username, admins.avatar, COUNT(DISTINCT bookings.id) as totalBookings')
            ->selectRaw('COUNT(DISTINCT reviews.id) as totalRatings')
            ->selectRaw('IFNULL(AVG(reviews.star), 0) as avgRating')
            ->join('admins', 'admins.id', '=', 'bookings.admin_id')
            ->leftJoin('reviews', function ($join) {
                $join->on('admins.id', '=', 'reviews.admin_id');
            })
            ->groupBy('admins.id', 'admins.username', 'admins.avatar');

        $data = $query->orderByDesc('totalBookings')
            ->take(5)
            ->get();

        return $data;
    }

    // Top 5 nhân viên nhiều lịch đặt
    public function topEmployee(Request $request)
    {
        $topEmployeesData = $this->basefilterTopEmployee($request);
        return response()->json(['topEmployeesData' => $topEmployeesData]);
    }

    private function basefilterTopEmployee(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        $query = Booking::selectRaw('admins.id, admins.username, admins.avatar')
            ->selectRaw('COUNT(DISTINCT bookings.id) as totalBookings')
            ->selectRaw('COUNT(DISTINCT reviews.id) as totalRatings')
            ->selectRaw('IFNULL(AVG(reviews.star), 0) as avgRating')
            ->join('admins', 'admins.id', '=', 'bookings.admin_id')
            ->leftJoin('reviews', function ($join) {
                $join->on('admins.id', '=', 'reviews.admin_id');
            })
            ->groupBy('admins.id', 'admins.username', 'admins.avatar');

        if ($month) {
            $query->whereMonth('bookings.day', $month);
        }

        if ($year) {
            $query->whereYear('bookings.day', $year);
        }

        $topEmployeesData = $query->orderByDesc('totalBookings')->take(5)->get();
        return $topEmployeesData;
    }
}
