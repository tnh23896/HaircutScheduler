<?php

namespace App\Http\Controllers\Admin\Statistical;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceUsageStatisticsController extends Controller
{
    public function index(){
        $topservice = $this->baseServiceSetbyTime();
        return view('admin.Statistical.serviceUsageStatistics',compact('topservice'));
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
    public function ServiceSetbyTime(Request $request)
	{
		$topservice = $this->baServiceSetbyTime($request);
		return response()->json(['topservice' => $topservice]);
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
}
