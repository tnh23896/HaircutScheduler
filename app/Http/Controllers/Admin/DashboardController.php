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
        $topEmployeesData = $this->baseTopEmployees();
        $data = $this->baseScheduleSetbyTime();
        $totalRevenue = $this->calculateBillRevenue();

        return view('admin.dashboard', compact('data', 'totalRevenue', 'topservice', 'topEmployeesData', 'getbill', 'getadmin', 'getservice', 'getuser'));
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

    // Lọc dịch vụ theo ngày
    public function ServiceSetbyTime(Request $request)
    {
        $topservice = $this->baServiceSetbyTime($request);
        return response()->json(['topservice' => $topservice]);
    }

    // Tổng dịch vụ theo ngày
    private function baseServiceSetbyTime()
    {
        $currentDate = date('Y-m-d'); // Lấy ngày hiện tại
        // Tổng số lần sử dụng mỗi dịch vụ trong ngày hiện tại
        $statistics =  DB::table('bill_details')
            ->join('services', 'bill_details.service_id', '=', 'services.id')
            ->join('bills', 'bill_details.bill_id', '=', 'bills.id')
            ->select('bill_details.service_id', 'services.name', DB::raw('COUNT(*) as count'))
            ->whereDate('bills.day', $currentDate) // Chỉ lấy dữ liệu của ngày hiện tại
            ->groupBy('bill_details.service_id', 'services.name')
            ->having('count', '>=', 0) // Chỉ lấy những giá trị có count lớn hơn 1 (tức là trùng nhau)
            ->orderByDesc('count') // Sắp xếp theo count giảm dần
            ->get();

        // Định dạng dữ liệu để trả về
        $topService = [];

        foreach ($statistics as $item) {
            $serviceId = $item->service_id;
            $name = $item->name;

            $topService[$serviceId] = [
                'name' => $name,
                'count' => $item->count,
            ];
        }

        if (empty($topService)) {
            $topService[] = [
                'name' => "Không có dữ liệu",
                'count' => 0,
            ];
        }

        return $topService;
    }

    // Thống kê dịch vụ ajax
    private function baServiceSetbyTime(Request $request)
    {
        $currentMonth = date('m'); // Lấy tháng hiện tại

        $day = $request->input('day'); // Lấy ngày từ request

        $statistics = DB::table('bill_details')
            ->join('services', 'bill_details.service_id', '=', 'services.id')
            ->join('bills', 'bill_details.bill_id', '=', 'bills.id') // Join với bảng bill
            ->select('bill_details.service_id', 'services.name', DB::raw('COUNT(*) as count'))
            ->groupBy('bill_details.service_id', 'services.name')
            ->having('count', '>=', 0)
            ->whereMonth('bills.day', $currentMonth) // Lọc theo tháng hiện tại
            ->whereDay('bills.day', $day) // Lọc theo ngày từ request
            ->orderByDesc('count')
            ->get();

        $topService = [];

        foreach ($statistics as $item) {
            $serviceId = $item->service_id;
            $name = $item->name;
            $topService[$serviceId] = [
                'name' => $name,
                'count' => $item->count,
            ];
        }

        if (empty($topService)) {
            $topService[] = [
                'name' => "Không có dữ liệu",
                'count' => 0,
            ];
        }

        return $topService;
    }

    // Doanh thu ngày hiện tại
    private function calculateBillRevenue()
    {
        $currentMonth = date('n'); // Lấy tháng hiện tại

        $daysInMonth = range(1, \Carbon\Carbon::now()->daysInMonth); // Tạo mảng chứa tất cả các ngày trong tháng

        $query = Bill::selectRaw('DAY(day) as day, SUM(total_price) as totalRevenue')
            ->whereMonth('day', $currentMonth) // Lọc theo tháng hiện tại
            ->groupBy('day')
            ->orderBy('day', 'asc');

        $result = $query->get();

        $totalRevenue = [];

        // Gộp kết quả từ cơ sở dữ liệu vào mảng chứa tất cả các ngày trong tháng
        foreach ($daysInMonth as $day) {
            $totalRevenue[$day] = [
                'totalRevenue' => 0,
            ];
        }

        foreach ($result as $row) {
            $totalRevenue[$row->day] = [
                'totalRevenue' => $row->totalRevenue,
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
            ->selectRaw('SUM(CASE WHEN status = "success" THEN 1 ELSE 0 END) as successfulBookings')
            ->selectRaw('SUM(CASE WHEN status = "canceled" THEN 1 ELSE 0 END) as cancelledBookings')
            ->whereMonth('day', $currentMonth) // Lọc theo tháng hiện tại
            ->groupBy('day')
            ->orderBy('day', 'asc');

        $result = $query->get();

        $data = [];

        // Gộp kết quả từ cơ sở dữ liệu vào mảng chứa tất cả các ngày trong tháng
        foreach ($daysInMonth as $day) {
            $data[$day] = [
                'totalBookings' => 0,
                'successfulBookings' => 0,
                'cancelledBookings' => 0,
            ];
        }

        foreach ($result as $row) {
            $data[$row->day] = [
                'totalBookings' => $row->totalBookings,
                'successfulBookings' => $row->successfulBookings,
                'cancelledBookings' => $row->cancelledBookings,
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
        $currentMonth = date('m'); // Lấy tháng hiện tại

        $day = $request->input('day'); // Lấy ngày từ request

        $query = Booking::selectRaw('admins.username, admins.avatar, COUNT(DISTINCT bookings.id) as totalBookings')
            ->selectRaw('COUNT(DISTINCT CASE WHEN bookings.status = "success" THEN bookings.id END) as totalSuccessfulBookings')
            ->selectRaw('COUNT(DISTINCT CASE WHEN bookings.status = "canceled" THEN bookings.id END) as totalCancelledBookings')
            ->selectRaw('COUNT(DISTINCT reviews.id) as totalRatings')
            ->selectRaw('IFNULL(AVG(reviews.star), 0) as avgRating')
            ->join('admins', 'admins.id', '=', 'bookings.admin_id')
            ->leftJoin('reviews', function ($join) {
                $join->on('admins.id', '=', 'reviews.admin_id');
            })
            ->groupBy('admins.id');

        if ($currentMonth) {
            $query->whereMonth('bookings.day', $currentMonth);

            if ($day) {
                $query->whereDay('bookings.day', $day);
            }
        }

        $topEmployeesData = $query->orderByDesc('totalBookings')->take(5)->get();

        return $topEmployeesData;
    }

    private function baseTopEmployees()
    {
        $currentDate = date('Y-m-d');  // Lấy ngày hiện tại

        $query = Booking::selectRaw('admins.username, admins.avatar')
            ->selectRaw('COUNT(DISTINCT bookings.id) as totalBookings')
            ->selectRaw('COUNT(DISTINCT CASE WHEN bookings.status = "success" THEN bookings.id END) as totalSuccessfulBookings')
            ->selectRaw('COUNT(DISTINCT CASE WHEN bookings.status = "canceled" THEN bookings.id END) as totalCancelledBookings')
            ->selectRaw('IFNULL(COUNT(DISTINCT reviews.id), 0) as totalRatings')  // Nếu không có đánh giá, đặt giá trị là 0
            ->selectRaw('IFNULL(AVG(reviews.star), 0) as avgRating')  // Nếu không có đánh giá, đặt giá trị là 0
            ->join('admins', 'admins.id', '=', 'bookings.admin_id')
            ->leftJoin('reviews', function ($join) use ($currentDate) {
                $join->on('admins.id', '=', 'reviews.admin_id')
                    ->whereDate('reviews.created_at', '=', $currentDate);
            })
            ->whereDate('bookings.day', '=', $currentDate)
            ->groupBy('admins.id', 'admins.username', 'admins.avatar');

        $data = $query->orderByDesc('totalBookings')
            ->take(5)
            ->get();
        return $data;
    }
}