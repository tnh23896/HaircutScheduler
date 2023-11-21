<?php

namespace App\Http\Controllers\Admin\Statistical;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RevenueStatisticsController extends Controller
{
    public function index(){
        $totalRevenue = $this->calculateBillRevenue();
		$lastMonthrevenue = $this->revenue();
		$revenue = $this->currentMonthRevenue();
        return view('admin.Statistical.revenueStatistics',
                compact('totalRevenue','lastMonthrevenue','revenue'));
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
			->selectRaw('SUM(CASE WHEN promo_id IS NULL THEN total_price ELSE total_price - promotions.discount END) as totalRevenues')
			->leftJoin('promotions', 'bills.promo_id', '=', 'promotions.id')
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
			->selectRaw('SUM(CASE WHEN promo_id IS NULL THEN total_price ELSE total_price - promotions.discount END) as totalRevenues')
			->leftJoin('promotions', 'bills.promo_id', '=', 'promotions.id')
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
		$query = Bill::selectRaw('MONTH(day) as month, COUNT(*) as totalBills')
			->selectRaw('SUM(CASE WHEN promo_id IS NULL THEN total_price ELSE total_price - promotions.discount END) as totalRevenues')
			->leftJoin('promotions', 'bills.promo_id', '=', 'promotions.id')
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
}
