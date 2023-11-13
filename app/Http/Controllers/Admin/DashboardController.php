<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function index(Request $request)
	{
		$data = $this->baseScheduleSetbyTime($request);
		$totalRevenue = $this->calculateBillRevenue($request);
		return view('admin.dashboard', compact('data', 'totalRevenue'));
	}

	public function revenueSetbyTime(Request $request)
	{
		$totalRevenue = $this->baRevenueSetbyTime($request);
		return response()->json(['totalRevenue' => $totalRevenue]);
	}

	public function ScheduleSetbyTime(Request $request)
	{
		$data = $this->baScheduleSetbyTime($request);
		return response()->json(['data' => $data]);
	}
	// Tổng hợp dữ liệu của doanh thu của bill
	private function calculateBillRevenue()
	{
		$query = Bill::selectRaw('MONTH(day) as month, COUNT(*) as totalBills')
			->selectRaw('SUM(CASE WHEN promo_id IS NOT NULL THEN total_price - promotions.discount ELSE total_price END) as totalRevenues')
			->join('promotions', 'bills.promo_id', '=', 'promotions.id')
			->groupBy('month')
			->orderBy('month', 'asc');

		$filteredData = $query->get();

		$totalRevenue = [];
		foreach ($filteredData as $item) {
			$month = $item->month;

			$totalRevenue[$month] = [
				'totalRevenues' => $item->totalRevenues,
				'totalBills' => $item->totalBills
			];
		}

		return $totalRevenue;
	}
	private function baRevenueSetbyTime(Request $request)
	{
		$month = $request->month;
		$year = $request->year;

		$query = Bill::selectRaw('MONTH(day) as month, COUNT(*) as totalBills')
			->selectRaw('SUM(CASE WHEN promo_id IS NOT NULL THEN total_price - promotions.discount ELSE total_price END) as totalRevenues')
			->join('promotions', 'bills.promo_id', '=', 'promotions.id')
			->when($month, function ($query, $month) {
				return $query->whereMonth('day', $month);
			})
			->when($year, function ($query, $year) {
				return $query->whereYear('day', $year);
			})
			->groupBy('month')
			->orderBy('month');

		$result = $query->get();

		$totalRevenue = [];
		foreach ($result as $row) {
			$totalRevenue[$row->month] = [
				'totalRevenues' => $row->totalRevenues,
				'totalBills' => $row->totalBills
			];
		}

		$allMonths = range(1, 12);
		foreach ($allMonths as $month) {
			if (!isset($totalRevenue[$month])) {
				$totalRevenue[$month] = [
					'totalRevenues' => 0,
					'totalBills' => 0,
				];
			}
		}

		return $totalRevenue;
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
}
