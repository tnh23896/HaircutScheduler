<?php

namespace App\Http\Controllers\Admin\Statistical;

use Carbon\Carbon;
use App\Models\Bill;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RevuneStatistic;
use App\Http\Controllers\Controller;

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
		if ($request->month == 0) {
			$totalRevenue = $this->baRevenueSetbyTime($request);
			return response()->json(['totalRevenue' => $totalRevenue]);
		} else {
			$totalRevenue = $this->calculateBillDayRevenue($request);
			return response()->json(['totalRevenue' => $totalRevenue]);
		}
	}
	private function calculateBillDayRevenue(Request $request)
	{
		// Lấy ngày hiện tại
		$today = Carbon::now();

		// Lấy ngày đầu tiên của tháng hiện tại
		$firstDayOfCurrentMonth = $today->firstOfMonth();

		// Lấy tháng và năm của tháng hiện tại
		$currentYear = $firstDayOfCurrentMonth->format('Y');

		$month = $request->month;
		$year = $request->year;

		if ($request->year == 0) {
			$year = $currentYear;
		} else {
			$year = $request->year;
		}
		$daysInMonth = range(1, Carbon::now()->daysInMonth); // Tạo mảng chứa tất cả các ngày trong tháng
		$query = Bill::selectRaw('DAY(day) as day, SUM(total_price) as totalRevenue')
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
			->groupBy('day')
			->orderBy('day', 'asc');

		$result = $query->get();

		$totalRevenue = [];

		// Gộp kết quả từ cơ sở dữ liệu vào mảng chứa tất cả các ngày trong tháng
		foreach ($daysInMonth as $day) {
			$totalRevenue[$day] = [
				'day' => $day,
				'totalRevenue' => 0,
				'ca1'  => 0,
				'ca2'  => 0,
				'ca3'  => 0,
			];
		}

		foreach ($result as $row) {
			$totalRevenue[$row->day] = [
				'day' => $row->day,
				'totalRevenue' => $row->totalRevenue,
				'ca1'  => $row->ca1,
				'ca2'  => $row->ca2,
				'ca3'  => $row->ca3,
			];
		}
		return $totalRevenue;
	}
	// Tổng hợp dữ liệu của doanh thu của bill
	private function calculateBillRevenue()
	{
		// Lấy ngày hiện tại
		$today = Carbon::now();

		// Lấy ngày đầu tiên của tháng hiện tại
		$firstDayOfCurrentMonth = $today->firstOfMonth();

		// Lấy tháng và năm của tháng hiện tại
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
				'month' => $row->month,
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
					'month' => $month,
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
				'month' => $row->month,
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
					'month' => $month,
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
	public function export(Request $request)
	{
		// Lấy ngày hiện tại
		$today = Carbon::now();

		// Lấy ngày đầu tiên của tháng hiện tại
		$firstDayOfCurrentMonth = $today->firstOfMonth();

		// Lấy tháng và năm của tháng hiện tại
		$currentYear = $request->excelYear;

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
		$currentYear = ($currentYear == 0) ? now()->year : $currentYear;
		$totalRevenue = [];

		foreach ($filteredData as $row) {
			$totalRevenue[$row->month] = [
				'month' => Carbon::create($currentYear, $row->month, 1)->format('m/Y'), // Include the year in the month value
				'totalRevenues' => $row->totalRevenues,
			];
		}

		$allMonths = range(1, 12);

		foreach ($allMonths as $month) {
			if (!isset($totalRevenue[$month])) {
				$totalRevenue[$month] = [
					'month' => Carbon::create($currentYear, $month, 1)->format('m/Y'), // Include the year in the month value
					'totalRevenues' => 0,
				];
			}
		}

		ksort($totalRevenue);

		$totalRevenue = array_values($totalRevenue);

		$export = new RevuneStatistic($totalRevenue);

		return Excel::download($export, 'Thống kê doanh thu.xlsx');
	}
}
