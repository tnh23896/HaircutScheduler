<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
	public function index(Request $request)
	{
		$topservice= $this->baseServiceSetbyTime();
		$data = $this->baseScheduleSetbyTime($request);

		return view('admin.dashboard', compact('data', 'topservice'));
	}

	public function ScheduleSetbyTime(Request $request)
	{
		$data = $this->baScheduleSetbyTime($request);
		return response()->json(['data' => $data]);
	}
	public function ServiceSetbyTime(Request $request){
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
    private function baServiceSetbyTime(Request $request){
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
