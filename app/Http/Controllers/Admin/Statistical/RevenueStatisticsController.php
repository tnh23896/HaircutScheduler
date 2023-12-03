<?php

namespace App\Http\Controllers\Admin\Statistical;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RevenueStatisticsController extends Controller
{
	public function index()
	{
		$totalRevenue = $this->calculateBillRevenue();
		$lastMonthrevenue = $this->revenue();
		$revenue = $this->currentMonthRevenue();
		return view(
			'admin.Statistical.revenueStatistics',
			compact('totalRevenue', 'lastMonthrevenue', 'revenue')
		);
	}

	private function revenue()
	{
		// Lấy ngày hiện tại
		$today = Carbon::now();

		// Lấy ngày đầu tiên của tháng trước
		$firstDayOfLastMonth = $today->subMonth()->firstOfMonth();

		// Lấy tháng và năm của tháng trước
		$lastMonth = $firstDayOfLastMonth->format('n');
		$currentYear = $firstDayOfLastMonth->format('Y');

		$query = Bill::selectRaw('MONTH(day) as month, COUNT(*) as totalBills')
			->selectRaw('SUM(total_price) as totalRevenues')
			->when($lastMonth, function ($query) use ($lastMonth) {
				return $query->whereMonth('day', $lastMonth);
			})
			->when($currentYear, function ($query) use ($currentYear) {
				return $query->whereYear('day', $currentYear);
			})
			->groupBy('month')
			->orderBy('month')
			->get();

		$data = $query->isEmpty() ? 0 : $query[0]->totalRevenues;

		return $data;
	}

	private function currentMonthRevenue()
	{
		// Lấy ngày hiện tại
		$today = Carbon::now();

		// Lấy ngày đầu tiên của tháng hiện tại
		$firstDayOfCurrentMonth = $today->firstOfMonth();

		// Lấy tháng và năm của tháng hiện tại
		$currentMonth = $firstDayOfCurrentMonth->format('n');
		$currentYear = $firstDayOfCurrentMonth->format('Y');

		$query = Bill::selectRaw('MONTH(day) as month, COUNT(*) as totalBills')
			->selectRaw('SUM(total_price) as totalRevenues')
			->when($currentMonth, function ($query) use ($currentMonth) {
				return $query->whereMonth('day', $currentMonth);
			})
			->when($currentYear, function ($query) use ($currentYear) {
				return $query->whereYear('day', $currentYear);
			})
			->groupBy('month')
			->orderBy('month')
			->get();

		$data = $query->isEmpty() ? 0 : $query[0]->totalRevenues;

		return $data;
	}

	public function revenueSetbyTime(Request $request)
	{
		$totalRevenue = $this->baRevenueSetbyTime($request);
		return response()->json(['totalRevenue' => $totalRevenue]);
	}

	// Tổng hợp dữ liệu của doanh thu của bill
	private function calculateBillRevenue()
	{
		// Lấy ngày hiện tại
		$today = Carbon::now();

		// Lấy ngày đầu tiên của tháng hiện tại
		$firstDayOfCurrentMonth = $today->firstOfMonth();

		// Lấy tháng và năm của tháng hiện tại
		$currentMonth = $firstDayOfCurrentMonth->format('n');
		$currentYear = $firstDayOfCurrentMonth->format('Y');

		$query = Bill::selectRaw('MONTH(day) as month, COUNT(*) as totalBills')
			->selectRaw('SUM(total_price) as totalRevenues') // chỉ tính tổng tiền mà không tính giảm giá
			->selectRaw('SUM(CASE WHEN shifts.id = 1 THEN bills.total_price ELSE 0 END) as ca1') // Tính tổng doanh thu cho ca có shift_id = 1
			->selectRaw('SUM(CASE WHEN shifts.id = 2 THEN bills.total_price ELSE 0 END) as ca2') // Tính tổng doanh thu cho ca có shift_id = 1
			->selectRaw('SUM(CASE WHEN shifts.id = 3 THEN bills.total_price ELSE 0 END) as ca3') // Tính tổng doanh thu cho ca có shift_id = 1
			->join('times', 'bills.time', '=', 'times.time')
			->join('shifts', 'times.shift_id', '=', 'shifts.id')
			->when($currentYear, function ($query) use ($currentYear) {
				return $query->whereYear('day', $currentYear);
			})
			->groupBy('month')
			->orderBy('month', 'asc');

		$filteredData = $query->get();

		$totalRevenue = [];

		foreach ($filteredData as $row) {
			$totalRevenue[$row->month] = [
				'totalRevenues' => $row->totalRevenues,
				'totalBills' => $row->totalBills,
				'ca1' => $row->ca1,
				'ca2' => $row->ca2,
				'ca3' => $row->ca3
			];
		}

		$allMonths = range(1, 12);

		foreach ($allMonths as $month) {
			if (!isset($totalRevenue[$month])) {
				$totalRevenue[$month] = [
					'totalRevenues' => 0,
					'totalBills' => 0,
					'ca1' => 0,
					'ca2' => 0,
					'ca3' => 0
				];
			}
		}

		return $totalRevenue;
	}
	private function baRevenueSetbyTime(Request $request)
	{
		$month = $request->month;
		$year = $request->year;

		$query = Bill::selectRaw('MONTH(day) as month, COUNT(*) as totalBills')
			->selectRaw('SUM(total_price) as totalRevenues') // chỉ tính tổng tiền mà không tính giảm giá
			->selectRaw('SUM(CASE WHEN shifts.id = 1 THEN bills.total_price ELSE 0 END) as ca1') // Tính tổng doanh thu cho ca có shift_id = 1
			->selectRaw('SUM(CASE WHEN shifts.id = 2 THEN bills.total_price ELSE 0 END) as ca2') // Tính tổng doanh thu cho ca có shift_id = 1
			->selectRaw('SUM(CASE WHEN shifts.id = 3 THEN bills.total_price ELSE 0 END) as ca3') // Tính tổng doanh thu cho ca có shift_id = 1
			->join('times', 'bills.time', '=', 'times.time')
			->join('shifts', 'times.shift_id', '=', 'shifts.id')
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
				'totalBills' => $row->totalBills,
				'ca1' => $row->ca1,
				'ca2' => $row->ca2,
				'ca3' => $row->ca3,
			];
		}

		$allMonths = range(1, 12);

		foreach ($allMonths as $month) {
			if (!isset($totalRevenue[$month])) {
				$totalRevenue[$month] = [
					'totalRevenues' => 0,
					'totalBills' => 0,
					'ca1' => 0,
					'ca2' => 0,
					'ca3' => 0,
				];
			}
		}

		return $totalRevenue;
	}
}
