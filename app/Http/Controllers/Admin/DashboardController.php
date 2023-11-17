<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function index()
	{
		$getuser = $this->getuser();
		$getservice = $this->getservice();
		$getadmin = $this->getadmin();
		$getbill = $this->getbill();
		$topservice = $this->baseServiceSetbyTime();
		$topBooker = $this->basetopBooker();
		$topEmployeesData = $this->baseTopEmployees();
		$data = $this->baseScheduleSetbyTime();
		$totalRevenue = $this->calculateBillRevenue();
		$lastMonthrevenue = $this->revenue();
		$revenue = $this->currentMonthRevenue();

		return view('admin.dashboard', compact('data', 'totalRevenue', 'topBooker', 'topservice', 'revenue', 'lastMonthrevenue', 'topEmployeesData', 'getbill', 'getadmin', 'getservice', 'getuser'));
	}
	public function getbill()
	{
		$getbill = DB::table('bills')->count();
		return $getbill;
	}
	public function getadmin()
	{
		$getadmin = DB::table('admins')->count();
		return $getadmin;
	}
	public function getservice()
	{
		$getservice = DB::table('services')->count();
		return $getservice;
	}
	public function getuser()
	{
		$getuser = DB::table('users')->count();
		return $getuser;
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
	public function topBooker(Request $request)
	{
		$bookerData = $this->basefilterTopBooker($request);
		return response()->json(['bookerData' => $bookerData]);
	}
	public function ScheduleSetbyTime(Request $request)
	{
		$data = $this->baScheduleSetbyTime($request);
		return response()->json(['data' => $data]);
	}
	public function ServiceSetbyTime(Request $request)
	{
		$topservice = $this->baServiceSetbyTime($request);
		return response()->json(['topservice' => $topservice]);
	}
	private function baseServiceSetbyTime()
	{
		// Tổng số lần sử dụng mỗi dịch vụ
		$statistics =  DB::table('bill_details')
			->join('services', 'bill_details.service_id', '=', 'services.id')
			->select('bill_details.service_id', 'services.name', DB::raw('COUNT(*) as count'))
			->groupBy('bill_details.service_id', 'services.name')
			->having('count', '>=', 0) // Chỉ lấy những giá trị có count lớn hơn 1 (tức là trùng nhau)
			->orderByDesc('count') // Sắp xếp theo count giảm dần
			->get();

		// Định dạng dữ liệu để trả về
		$topservice = [];
		foreach ($statistics as $item) {
			$serviceId = $item->service_id;
			$name = $item->name;

			$topservice[$serviceId] = [
				'name' => $name,
				'count' => $item->count,
			];
		}

		return $topservice;
	}
	private function baServiceSetbyTime(Request $request)
	{
		$month = $request->month;
		$year = $request->year;
		$statistics = DB::table('bill_details')
			->join('services', 'bill_details.service_id', '=', 'services.id')
			->join('bills', 'bill_details.bill_id', '=', 'bills.id') // Join với bảng bill
			->select('bill_details.service_id', 'services.name', DB::raw('COUNT(*) as count'))
			->groupBy('bill_details.service_id', 'services.name')
			->having('count', '>=', 0)
			->when($month, function ($query, $month) {
				return $query->whereMonth('bills.day', $month); // Sử dụng cột day từ bảng bill
			})
			->when($year, function ($query, $year) {
				return $query->whereYear('bills.day', $year); // Sử dụng cột day từ bảng bill
			})
			->orderByDesc('count')
			->get();
		$topservice = [];
		foreach ($statistics as $item) {
			$serviceId = $item->service_id;
			$name = $item->name;
			$topservice[$serviceId] = [
				'name' => $name,
				'count' => $item->count,
			];
		}
		if (empty($topservice)) {
			$topservice[] = [
				'name' => "Không có dữ liệu",
				'count' => 0,
			];
		}
		return $topservice;
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
	// Tổng hợp dữ liệu của tất cả
	private function baseScheduleSetbyTime()
	{
		$query = Booking::selectRaw('MONTH(day) as month, COUNT(*) as totalBookings')
			->selectRaw('SUM(CASE WHEN status = "success" THEN 1 ELSE 0 END) as successfulBookings')
			->selectRaw('SUM(CASE WHEN status = "canceled" THEN 1 ELSE 0 END) as cancelledBookings')
			->groupBy('month')
			->orderBy('month', 'asc');

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

	// Top 5 nhân viên nhiều lịch đặt
	public function topEmployee(Request $request)
	{
		$topEmployeesData = $this->basefilterTopEmployee($request);
		return response()->json(['topEmployeesData' => $topEmployeesData]);
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
			->groupBy('admins.id');
		$data = $query->orderByDesc('totalBookings')
			->take(5)
			->get();
		return $data;
	}

	private function basefilterTopEmployee(Request $request)
	{
		$month = $request->month;
		$year = $request->year;

		$query = Booking::selectRaw('admins.username, admins.avatar, COUNT(DISTINCT bookings.id) as totalBookings')
			->selectRaw('COUNT(DISTINCT reviews.id) as totalRatings')
			->selectRaw('IFNULL(AVG(reviews.star), 0) as avgRating')
			->join('admins', 'admins.id', '=', 'bookings.admin_id')
			->leftJoin('reviews', function ($join) {
				$join->on('admins.id', '=', 'reviews.admin_id');
			})
			->groupBy('admins.id');

		if ($month) {
			$query->whereMonth('bookings.day', $month);
		}

		if ($year) {
			$query->whereYear('bookings.day', $year);
		}

		$topEmployeesData = $query->orderByDesc('totalBookings')->take(5)->get();
		return $topEmployeesData;
	}

	//
	private function basetopBooker()
	{
		$query = Bill::select('bills.name', 'users.avatar')
			->selectRaw('count(bills.id) as totalBookings')
			->selectRaw('SUM(bills.total_price) as totalPrice')
			->join('users', 'bills.user_id', '=', 'users.id')
			->groupBy('bills.name', 'users.avatar')
			->orderBy('totalBookings', 'desc')
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

		$bookerData = $query->get();
		return $bookerData;
	}
}