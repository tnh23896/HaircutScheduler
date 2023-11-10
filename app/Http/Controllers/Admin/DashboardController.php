<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index(Request $request)
	{
		$data = $this->baseScheduleSetbyTime($request);
		return view('admin.dashboard', compact('data'));
	}

	public function ScheduleSetbyTime(Request $request)
	{
		$data = $this->baseScheduleSetbyTime($request);

		return response()->json(['data' => $data]);
	}

	private function baseScheduleSetbyTime(Request $request)
	{
		$month = $request->month;
		$year = $request->year;

		$query = Booking::selectRaw('MONTH(day) as month, COUNT(*) as totalBookings')
			->when($month, function ($query, $month) {
				return $query->whereMonth('day', $month);
			})
			->when($year, function ($query, $year) {
				return $query->whereYear('day', $year);
			})
			->groupBy('month')
			->orderBy('month');

		$filteredData = $query->pluck('totalBookings', 'month')->toArray();

		$allMonths = range(1, 12);
		$data = [];
		foreach ($allMonths as $month) {
			$data[$month] = $filteredData[$month] ?? 0;
		}

		return $data;
	}
}
