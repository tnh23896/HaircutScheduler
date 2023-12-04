<?php

namespace App\Http\Controllers\Admin\Statistical;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceUsageStatisticsController extends Controller
{
    public function index()
    {
        $topservice = $this->baseServiceSetbyTime();
        return view('admin.Statistical.serviceUsageStatistics', compact('topservice'));
    }

    private function baseServiceSetbyTime()
    {
        // Lấy năm hiện tại
        $currentYear = now()->year;

        // Tổng số lần sử dụng mỗi dịch vụ trong năm hiện tại và tổng doanh thu
        $statistics = DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->join('services', 'bill_details.service_id', '=', 'services.id')
            ->select(
                'bill_details.service_id',
                'services.name',
                DB::raw('COUNT(*) as count'),
                DB::raw('SUM(bills.total_price) as totalRevenues')
            )
            ->groupBy('bill_details.service_id', 'services.name')
            ->having('count', '>=', 0)
            ->whereYear('bills.day', $currentYear) // Lọc theo năm hiện tại
            ->orderByDesc('count')
            ->get();

        // Tổng doanh thu của năm hiện tại
        $totalRevenue = DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->whereYear('bills.day', $currentYear)
            ->sum('bills.total_price');

        // Định dạng dữ liệu để trả về
        $serviceStatistics = [];

        foreach ($statistics as $item) {
            $serviceId = $item->service_id;
            $name = $item->name;
            $count = $item->count;
            $totalRevenues = $item->totalRevenues;

            // Tính phần trăm chiếm trong tổng doanh thu
            $percentage = ($totalRevenues / $totalRevenue) * 100;

            $serviceStatistics[$serviceId] = [
                'name' => $name,
                'count' => $count,
                'totalRevenues' => $totalRevenues,
                'percentage' => $percentage,
            ];
        }

        // Sắp xếp theo phần trăm giảm dần và lấy ra 5 dịch vụ
        $sortedServiceStatistics = collect($serviceStatistics)->sortByDesc('percentage')->take(5)->toArray();

        // Tính tổng phần trăm của 5 dịch vụ đầu tiên
        $totalPercentage = array_sum(array_column($sortedServiceStatistics, 'percentage'));

        // Tính tổng count và totalRevenues của tất cả các dịch vụ
        $totalCount = DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->whereYear('bills.day', $currentYear)
            ->count();

        $totalRevenuesAll = DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->whereYear('bills.day', $currentYear)
            ->sum('bills.total_price');

        // Lấy count và totalRevenues của phần tử "Others"
        $othersCount = $totalCount - array_sum(array_column($sortedServiceStatistics, 'count'));
        $othersTotalRevenues = $totalRevenuesAll - array_sum(array_column($sortedServiceStatistics, 'totalRevenues'));

        // Tạo phần tử "Others" với count và totalRevenues
        $others = [
            'name' => 'Dịch vụ khác',
            'count' => $othersCount,
            'totalRevenues' => $othersTotalRevenues,
            'percentage' => 100 - $totalPercentage,
        ];

        // Thêm phần tử "Others" vào mảng kết quả
        $result = $sortedServiceStatistics;
        $result[] = $others;

        return $result;
    }

    public function ServiceSetbyTime(Request $request)
    {
        $topservice = $this->baServiceSetbyTime($request);
        return response()->json(['topservice' => $topservice]);
    }

    private function baServiceSetbyTime(Request $request)
    {
        // Lấy năm từ request hoặc năm hiện tại nếu không có
        $year = $request->year ?? now()->year;

        // Tổng số lần sử dụng mỗi dịch vụ trong năm và tổng doanh thu
        $statistics = DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->join('services', 'bill_details.service_id', '=', 'services.id')
            ->select(
                'bill_details.service_id',
                'services.name',
                DB::raw('COUNT(*) as count'),
                DB::raw('SUM(bills.total_price) as totalRevenues')
            )
            ->groupBy('bill_details.service_id', 'services.name')
            ->having('count', '>=', 0)
            ->whereYear('bills.day', '=', $year) // Sửa thành "="
            ->orderByDesc('count')
            ->get();

        // Tổng doanh thu của năm
        $totalRevenue = DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->whereYear('bills.day', '=', $year) // Sửa thành "="
            ->sum('bills.total_price');

        // Định dạng dữ liệu để trả về
        $serviceStatistics = [];

        foreach ($statistics as $item) {
            $serviceId = $item->service_id;
            $name = $item->name;
            $count = $item->count;
            $totalRevenues = $item->totalRevenues;

            // Tính phần trăm chiếm trong tổng doanh thu
            $percentage = ($totalRevenues / $totalRevenue) * 100;

            $serviceStatistics[$serviceId] = [
                'name' => $name,
                'count' => $count,
                'totalRevenues' => $totalRevenues,
                'percentage' => $percentage,
            ];
        }

        // Sắp xếp theo phần trăm giảm dần và lấy ra 5 dịch vụ
        $sortedServiceStatistics = collect($serviceStatistics)->sortByDesc('percentage')->take(5)->toArray();

        // Tính tổng phần trăm của 5 dịch vụ đầu tiên
        $totalPercentage = array_sum(array_column($sortedServiceStatistics, 'percentage'));

        // Tính tổng count và totalRevenues của tất cả các dịch vụ
        $totalCount = DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->whereYear('bills.day', '=', $year) // Sửa thành "="
            ->count();

        $totalRevenuesAll = DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->whereYear('bills.day', '=', $year) // Sửa thành "="
            ->sum('bills.total_price');

        // Lấy count và totalRevenues của phần tử "Others"
        $othersCount = $totalCount - array_sum(array_column($sortedServiceStatistics, 'count'));
        $othersTotalRevenues = $totalRevenuesAll - array_sum(array_column($sortedServiceStatistics, 'totalRevenues'));

        // Tạo phần tử "Others" với count và totalRevenues
        $others = [
            'name' => 'Dịch vụ khác',
            'count' => $othersCount,
            'totalRevenues' => $othersTotalRevenues,
            'percentage' => 100 - $totalPercentage,
        ];

        // Thêm phần tử "Others" vào mảng kết quả
        $result = $sortedServiceStatistics;
        $result[] = $others;

        return $result;
    }
}