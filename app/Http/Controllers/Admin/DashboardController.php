<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function index()
    {
        $getuser = $this->getuser();
        $getservice = $this->getservice();
        $getadmin = $this->getadmin();
        $getbill = $this->getbill();
        $topservice = $this->baseServiceSetbyTime();
        $topEmployeesData = $this->baseTopEmployees();
        $data = $this->baseScheduleSetbyTime();
        $totalRevenue = $this->calculateBillRevenue();
        $revenue = $this->revenue();
        $revenueDay = $this->currentDayRevenue();
        return view('admin.dashboard', compact('data', 'totalRevenue', 'topservice', 'topEmployeesData', 'getbill', 'getadmin', 'getservice', 'getuser', 'revenue', 'revenueDay'));
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

    public function serviceSetByTime(Request $request)
    {
        $topservice = $this->baseServiceSetByTime($request);
        return response()->json(['topservice' => $topservice]);
    }

    private function baseServiceSetByTime(Request $request = null)
    {
        // Lấy ngày hiện tại
        $currentDate = now();
        $month = $currentDate->month;

        // Nếu có yêu cầu từ người dùng, sử dụng ngày từ yêu cầu, ngược lại sử dụng ngày hiện tại
        $day = $request ? $request->input('day', $currentDate->day) : $currentDate->day;

        $statistics = $this->getServiceStatistics($month, $day);
        $totalRevenue = $this->getTotalRevenue($month, $day);
        $serviceStatistics = $this->formatServiceStatistics($statistics, $totalRevenue);
        $sortedServiceStatistics = $this->sortAndLimitServiceStatistics($serviceStatistics, 5);

        $totalPercentage = array_sum(array_column($sortedServiceStatistics, 'percentage'));
        $totalCount = $this->getTotalCount($month, $day);
        $totalRevenuesAll = $this->getTotalRevenuesAll($month, $day);

        $others = $this->createOthers($sortedServiceStatistics, $totalPercentage, $totalCount, $totalRevenuesAll);

        $result = array_merge($sortedServiceStatistics, [$others]);

        return $result;
    }

    private function getServiceStatistics($month, $day)
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
            ->whereMonth('bills.day', $month)
            ->whereDay('bills.day', $day)
            ->orderByDesc('count')
            ->get();
    }

    private function getTotalRevenue($month, $day)
    {
        return DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->whereMonth('bills.day', $month)
            ->whereDay('bills.day', $day)
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

    private function getTotalCount($month, $day)
    {
        return DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->whereMonth('bills.day', $month)
            ->whereDay('bills.day', $day)
            ->count();
    }

    private function getTotalRevenuesAll($month, $day)
    {
        return DB::table('bill_details')
            ->join('bills', 'bills.id', '=', 'bill_details.bill_id')
            ->whereMonth('bills.day', $month)
            ->whereDay('bills.day', $day)
            ->sum('bills.total_price');
    }

    private function createOthers($sortedServiceStatistics, $totalPercentage, $totalCount, $totalRevenuesAll)
    {
        $othersCount = $totalCount - array_sum(array_column($sortedServiceStatistics, 'count'));
        $othersTotalRevenues = $totalRevenuesAll - array_sum(array_column($sortedServiceStatistics, 'totalRevenues'));
        if (count($sortedServiceStatistics) >= 1) {
            return [
                'name' => 'Dịch vụ khác',
                'count' => $othersCount,
                'totalRevenues' => $othersTotalRevenues,
                'percentage' => 100 - $totalPercentage,
            ];
        }
        return [
            'name' => 'Không có dữ liệu',
            'count' => '0',
            'totalRevenues' => '0',
            'percentage' => 100 - $totalPercentage,
        ];
    }

    // Doanh thu ngày hiện tại
    private function calculateBillRevenue()
    {
        $currentMonth = date('n'); // Lấy tháng hiện tại

        $daysInMonth = range(1, \Carbon\Carbon::now()->daysInMonth); // Tạo mảng chứa tất cả các ngày trong tháng

        $query = Bill::selectRaw('DAY(day) as day, SUM(total_price) as totalRevenue')
            ->selectRaw('SUM(CASE WHEN shifts.id = 1 THEN bills.total_price ELSE 0 END) as ca1') // Tính tổng doanh thu cho ca có shift_id = 1
            ->selectRaw('SUM(CASE WHEN shifts.id = 2 THEN bills.total_price ELSE 0 END) as ca2') // Tính tổng doanh thu cho ca có shift_id = 1
            ->selectRaw('SUM(CASE WHEN shifts.id = 3 THEN bills.total_price ELSE 0 END) as ca3') // Tính tổng doanh thu cho ca có shift_id = 1
            ->join('times', 'bills.time', '=', 'times.time')
            ->join('shifts', 'times.shift_id', '=', 'shifts.id')
            ->whereYear('day', date('Y'))
            ->whereMonth('day', $currentMonth) // Lọc theo tháng hiện tại
            ->groupBy('day')
            ->orderBy('day', 'asc');

        $result = $query->get();

        $totalRevenue = [];

        // Gộp kết quả từ cơ sở dữ liệu vào mảng chứa tất cả các ngày trong tháng
        foreach ($daysInMonth as $day) {
            $totalRevenue[$day] = [
                'totalRevenue' => 0,
                'ca1'  => 0,
                'ca2'  => 0,
                'ca3'  => 0,
            ];
        }

        foreach ($result as $row) {
            $totalRevenue[$row->day] = [
                'totalRevenue' => $row->totalRevenue,
                'ca1'  => $row->ca1,
                'ca2'  => $row->ca2,
                'ca3'  => $row->ca3,
            ];
        }
        return $totalRevenue;
    }

    // Tổng hợp dữ liệu lịch đặt
    private function baseScheduleSetbyTime()
    {
        $currentMonth = date('n'); // Lấy tháng hiện tại

        $daysInMonth = range(1, \Carbon\Carbon::now()->daysInMonth); // Tạo mảng chứa tất cả các ngày trong tháng

        $query = Booking::selectRaw('DAY(day) as day, COUNT(*) as totalBookings')
            ->selectRaw('SUM(CASE WHEN shifts.id = 1 THEN 1 ELSE 0 END) as ca1')
            ->selectRaw('SUM(CASE WHEN shifts.id = 2 THEN 1 ELSE 0 END) as ca2')
            ->selectRaw('SUM(CASE WHEN shifts.id = 3 THEN 1 ELSE 0 END) as ca3')
            ->join('times', 'bookings.time', '=', 'times.time')
            ->join('shifts', 'times.shift_id', '=', 'shifts.id')
            ->whereYear('day', date('Y'))
            ->whereMonth('day', $currentMonth) // Lọc theo tháng hiện tại
            ->groupBy('day')
            ->orderBy('day', 'asc');

        $result = $query->get();

        $data = [];

        // Gộp kết quả từ cơ sở dữ liệu vào mảng chứa tất cả các ngày trong tháng
        foreach ($daysInMonth as $day) {
            $data[$day] = [
                'totalBookings' => 0,
                'ca1'  => 0,
                'ca2'  => 0,
                'ca3'  => 0,
            ];
        }

        foreach ($result as $row) {
            $data[$row->day] = [
                'totalBookings' => $row->totalBookings,
                'ca1'  => $row->ca1,
                'ca2'  => $row->ca2,
                'ca3'  => $row->ca3,
            ];
        }

        return $data;
    }


    public function topEmployee(Request $request)
    {
        $topEmployeesData = $this->basefilterTopEmployee($request);

        return response()->json(['topEmployeesData' => $topEmployeesData]);
    }

    private function basefilterTopEmployee(Request $request)
    {
        $currentMonth = now()->format('m');
        $currentDay = now()->format('d');

        $day = $request->input('day', 0);

        if ($day == 0) {
            $day = $currentDay;
        }

        $query = Admin::select('admins.username', 'admins.avatar')
            ->selectRaw('COUNT(DISTINCT bookings.id) as totalBookings')
            ->selectRaw('COUNT(DISTINCT CASE WHEN bookings.status = "success" THEN bookings.id END) as totalSuccessfulBookings')
            ->selectRaw('COUNT(DISTINCT CASE WHEN bookings.status = "canceled" THEN bookings.id END) as totalCancelledBookings')
            ->selectRaw('COUNT(DISTINCT reviews.id) as totalRatings')
            ->selectRaw('IFNULL(AVG(reviews.star), 0) as avgRating')
            ->leftJoin('work_schedules', 'admins.id', '=', 'work_schedules.admin_id')
            ->leftJoin('bookings', function ($join) use ($day) {
                $join->on('admins.id', '=', 'bookings.admin_id')
                    ->whereRaw('DATE(bookings.day) = ?', [now()->format('Y-m') . '-' . $day]);
            })
            ->leftJoin('reviews', 'admins.id', '=', 'reviews.admin_id')
            ->groupBy('admins.id', 'admins.username', 'admins.avatar');

        if ($currentMonth) {
            $query->whereRaw('MONTH(work_schedules.day) = ?', [$currentMonth])
                ->whereRaw('DAY(work_schedules.day) = ?', [$day]);
        }

        $topEmployeesData = $query->orderByDesc('totalBookings')->get();

        return $topEmployeesData;
    }


    private function baseTopEmployees()
    {
        $currentDate = now()->format('Y-m-d'); // Lấy ngày hiện tại

        $query = Admin::select('admins.username', 'admins.avatar')
            ->selectRaw('COUNT(DISTINCT bookings.id) as totalBookings')
            ->selectRaw('COUNT(DISTINCT CASE WHEN bookings.status = "success" THEN bookings.id END) as totalSuccessfulBookings')
            ->selectRaw('COUNT(DISTINCT CASE WHEN bookings.status = "canceled" THEN bookings.id END) as totalCancelledBookings')
            ->selectRaw('COUNT(DISTINCT reviews.id) as totalRatings')
            ->selectRaw('IFNULL(AVG(reviews.star), 0) as avgRating')  // Nếu không có đánh giá, đặt giá trị là 0
            ->leftJoin('work_schedules', 'admins.id', '=', 'work_schedules.admin_id')
            ->leftJoin('bookings', function ($join) use ($currentDate) {
                $join->on('admins.id', '=', 'bookings.admin_id')
                    ->where('bookings.day', '=', $currentDate);
            })
            ->leftJoin('reviews', 'admins.id', '=', 'reviews.admin_id')
            ->where('work_schedules.day', '=', $currentDate)
            ->groupBy('admins.id', 'admins.username', 'admins.avatar');

        $data = $query->orderByDesc('totalBookings')->get();

        return $data;
    }

    private function revenue()
    {
        // Lấy ngày hôm qua
        $yesterday = Carbon::yesterday();

        $query = Bill::selectRaw('COUNT(*) as totalBills')
            ->selectRaw('SUM(total_price) as totalRevenues')
            ->whereDate('day', $yesterday)
            ->get();

        $data = $query->isEmpty() ? 0 : $query[0]->totalRevenues;

        return $data;
    }
    private function currentDayRevenue()
    {
        // Lấy ngày hiện tại
        $today = Carbon::now();

        $query = Bill::selectRaw('COUNT(*) as totalBills')
            ->selectRaw('SUM(total_price) as totalRevenues')
            ->whereDate('day', $today)
            ->get();

        $data = $query->isEmpty() ? 0 : $query[0]->totalRevenues;

        return $data;
    }
}