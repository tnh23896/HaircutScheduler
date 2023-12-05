<?php

namespace App\Http\Controllers\Admin\Statistical;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceUsageStatisticsController extends Controller
{
    public function index()
    {
        $topservice = $this->baseServiceSetByTime();
        return view('admin.Statistical.serviceUsageStatistics', compact('topservice'));
    }

    public function serviceSetByTime(Request $request)
    {
        $topservice = $this->baseServiceSetByTime($request);
        return response()->json(['topservice' => $topservice]);
    }

    private function baseServiceSetByTime(Request $request = null)
    {
        $year = $request ? $request->input('year', now()->year) : now()->year;

        $statistics = $this->getServiceStatistics($year);
        $totalRevenue = $this->getTotalRevenue($year);
        $serviceStatistics = $this->formatServiceStatistics($statistics, $totalRevenue);
        $sortedServiceStatistics = $this->sortAndLimitServiceStatistics($serviceStatistics, 5);

        $totalPercentage = array_sum(array_column($sortedServiceStatistics, 'percentage'));
        $totalCount = $this->getTotalCount($year);
        $totalRevenuesAll = $this->getTotalRevenuesAll($year);

        $others = $this->createOthers($sortedServiceStatistics, $totalPercentage, $totalCount, $totalRevenuesAll);

        $result = array_merge($sortedServiceStatistics, [$others]);

        return $result;
    }

    private function getServiceStatistics($year)
    {
        return DB::table('bill_details')
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
            ->whereYear('bills.day', $year)
            ->orderByDesc('count')
            ->get();
    }

    private function getTotalRevenue($year)
    {
        return DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->whereYear('bills.day', $year)
            ->sum('bills.total_price');
    }

    private function formatServiceStatistics($statistics, $totalRevenue)
    {
        // Kiểm tra chia cho 0
        if ($totalRevenue == 0) {
            // Xử lý trường hợp $totalRevenue bằng 0 ở đây, có thể return hoặc set giá trị mặc định.
            return [];
        }

        $serviceStatistics = [];

        foreach ($statistics as $item) {
            // Kiểm tra tồn tại của các thuộc tính
            if (property_exists($item, 'service_id') && property_exists($item, 'name') && property_exists($item, 'count') && property_exists($item, 'totalRevenues')) {
                $serviceId = $item->service_id;
                $name = $item->name;
                $count = $item->count;
                $totalRevenues = $item->totalRevenues;

                $percentage = ($totalRevenues / $totalRevenue) * 100;

                // Sử dụng $serviceStatistics[$serviceId] để tránh thay đổi giá trị
                $serviceStatistics[$serviceId] = [
                    'name' => $name,
                    'count' => $count,
                    'totalRevenues' => $totalRevenues,
                    'percentage' => $percentage,
                ];
            }
        }

        // Kiểm tra tồn tại của $serviceStatistics để tránh lỗi khi không có dữ liệu
        if (empty($serviceStatistics)) {
            return [];
        }

        // Tính toán hệ số để điều chỉnh phần trăm
        $totalPercentage = array_sum(array_column($serviceStatistics, 'percentage'));
        $factor = 100 / $totalPercentage;

        // Điều chỉnh phần trăm mà không làm tròn
        foreach ($serviceStatistics as &$item) {
            $item['percentage'] *= $factor;
        }

        return $serviceStatistics;
    }

    private function sortAndLimitServiceStatistics($serviceStatistics, $limit)
    {
        return collect($serviceStatistics)->sortByDesc('percentage')->take($limit)->toArray();
    }

    private function getTotalCount($year)
    {
        return DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->whereYear('bills.day', $year)
            ->count();
    }

    private function getTotalRevenuesAll($year)
    {
        return DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->whereYear('bills.day', $year)
            ->sum('bills.total_price');
    }

    private function createOthers($sortedServiceStatistics, $totalPercentage, $totalCount, $totalRevenuesAll)
    {
        $othersCount = $totalCount - array_sum(array_column($sortedServiceStatistics, 'count'));
        $othersTotalRevenues = $totalRevenuesAll - array_sum(array_column($sortedServiceStatistics, 'totalRevenues'));
        if (!empty($othersCount && $othersTotalRevenues)) {
            return [
                'name' => 'Dịch vụ khác',
                'count' => $othersCount,
                'totalRevenues' => $othersTotalRevenues,
                'percentage' => 100 - $totalPercentage,
            ];
        } else {
            return [
                'name' => 'Không có dữ liệu',
                'count' => '0',
                'totalRevenues' => $othersTotalRevenues,
                'percentage' => 100 - $totalPercentage,
            ];
        }
    }
}