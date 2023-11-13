<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index(Request $request)
	{
		$topBooker = $this->basetopBooker();
		$data = $this->baseScheduleSetbyTime($request);
		return view('admin.dashboard', compact('data','topBooker'));
	}

	public function ScheduleSetbyTime(Request $request)
	{
		$data = $this->baScheduleSetbyTime($request);
		return response()->json(['data' => $data]);
	}

	public function topBooker(Request $request)
	{
		$bookerData = $this->basefilterTopBooker($request);
		return response()->json(['bookerData' => $bookerData]);
	}

	// Tổng hợp dữ liệu của tất cả
	private function baseScheduleSetbyTime()
	{
		$query = Booking::selectRaw('MONTH(day) as month, COUNT(*) as totalBookings')
			->selectRaw('SUM(CASE WHEN status = "success" THEN 1 ELSE 0 END) as successfulBookings')
			->selectRaw('SUM(CASE WHEN status = "canceled" THEN 1 ELSE 0 END) as cancelledBookings')
			->groupBy('month')
			->orderBy('month', 'asc');

		$filteredData = $query->get();

		$data = [];
		foreach ($filteredData as $item) {
			$month = $item->month;

			$data[$month] = [
				'totalBookings' => $item->totalBookings,
				'successfulBookings' => $item->successfulBookings,
				'cancelledBookings' => $item->cancelledBookings,
			];
		}

		return $data;
	}
	// Lọc theo tháng và năm
	private function baScheduleSetbyTime(Request $request)
	{
		$month = $request->month;
		$year = $request->year;

		$query = Booking::selectRaw('
            MONTH(day) as month,
            COUNT(*) as totalBookings,
            SUM(CASE WHEN status = "success" THEN 1 ELSE 0 END) as successfulBookings,
            SUM(CASE WHEN status = "canceled" THEN 1 ELSE 0 END) as cancelledBookings
        ')
			->when($month, function ($query, $month) {
				return $query->whereMonth('day', $month);
			})
			->when($year, function ($query, $year) {
				return $query->whereYear('day', $year);
			})
			->groupBy('month')
			->orderBy('month');

		$result = $query->get();

		$data = [];
		foreach ($result as $row) {
			$data[$row->month] = [
				'totalBookings' => $row->totalBookings,
				'successfulBookings' => $row->successfulBookings,
				'cancelledBookings' => $row->cancelledBookings,
			];
		}

		$allMonths = range(1, 12);
		foreach ($allMonths as $month) {
			if (!isset($data[$month])) {
				$data[$month] = [
					'totalBookings' => 0,
					'successfulBookings' => 0,
					'cancelledBookings' => 0,
				];
			}
		}

		return $data;
	}

	private function basetopBooker(){
		$query = Booking::select('users.username','users.avatar')
		 	->selectRaw('count(bookings.id) as totalBookings')
			->selectRaw('SUM(bookings.total_price) as totalPrice')
			->where('bookings.status','success')
			->join('users', 'bookings.user_id', '=', 'users.id')
			->groupBy('users.username','users.avatar')
			->orderBy('totalBookings', 'desc')
			->take(5)
			->get();

		return $query;	
	}

	private function basefilterTopBooker(Request $request)
	{
		$month = $request->month;
		$year = $request->year;

		$query = Booking::join('users', 'users.id', '=', 'bookings.user_id')
			->select('users.username','users.avatar','bookings.user_id')
			->selectRaw('SUM(bookings.total_price) as totalPrice')
			->selectRaw('COUNT(*) as totalBookings')
			->where('bookings.status','success')
			->groupBy('bookings.user_id', 'users.username','users.avatar')
			->orderByDesc('totalBookings');
		if ($month) {
			$query->whereMonth('day', $month);
		}

		if ($year) {
			$query->whereYear('day', $year);
		}

		$bookerData = $query->get();

		return $bookerData;
	}
}
