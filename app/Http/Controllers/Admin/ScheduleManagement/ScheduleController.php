<?php

namespace App\Http\Controllers\Admin\ScheduleManagement;

use Exception;
use App\Models\Bill;
use App\Models\Time;
use App\Models\User;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Promotion;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;
use App\Models\BookingDetail;
use Illuminate\Support\Carbon;
use App\Models\CategoryService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\Admin\ScheduleManagement\StoreRequest;
use App\Http\Requests\Admin\ScheduleManagement\UpdateRequest;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Booking::latest()->paginate(10);
        return view('admin.scheduleManagement.index', compact('data'));
    }


    public function search(Request $request)
    {
        try {
            $search = $request->input('search');
            $fields = ['name', 'phone'];
            $data = search(Booking::class, $search, $fields)
                ->latest()
                ->paginate(10)
                ->withQueryString();
            return view('admin.scheduleManagement.index', compact('data'));
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'Tìm kiếm thất bại'
            ], 500);
        }
    }

    public function searchByDateandTime(Request $request)
    {
        try {
            $day = $request->input('day');
            $time = $request->input('time');
            $ampm = $request->input('ampm'); // SA, CH, AM, PM

            $hour = $minute = null;

            if ($time) {
                list($hour, $minute) = explode(':', $time);
                $hour = (int)$hour;
                $minute = (int)$minute;
            }

            // Kiểm tra kiểu thời gian và điều chỉnh giờ dựa trên giá trị của $ampm
            if ($ampm === 'SA' && $hour >= 12) {
                $hour -= 12;
            } elseif ($ampm === 'CH' && $hour < 12) {
                $hour += 12;
            } elseif ($ampm === 'AM' && $hour == 12) {
                $hour = 0;
            } elseif ($ampm === 'PM' && $hour != 12) {
                $hour += 12;
            }

            if ($hour !== null && $minute !== null) {
                $time = sprintf('%02d:%02d', $hour, $minute);
            }

            $query = Booking::latest();

            if (!empty($day)) {
                $query->whereRaw('DATE(day) = ?', [$day]);
            }

            if (!empty($time)) {
                $query->whereRaw('TIME(time) LIKE ?', ["$time%"]);
            }

            $bookingsByDateAndTime = $query->paginate(10)->withQueryString();

            if (empty($bookingsByDateAndTime)) {
                return view('admin.scheduleManagement.index', ['data' => $bookingsByDateAndTime]);
            } else {
                $bookingsByDateAndTime->count() > 0;
                return view('admin.scheduleManagement.index', ['data' => $bookingsByDateAndTime]);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'Tìm kiếm thất bại'
            ], 500);
        }
    }


    public function filter(Request $request)
    {
        try {
            $status = $request->input('filter');
            if ($status == "") {
                $data = Booking::latest()->paginate(10);
            } else {
                $data = Booking::where('status', $status)
                    ->latest()
                    ->paginate(10);
            }
            return view('admin.scheduleManagement.index', compact('data'));
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'Tìm kiếm thất bại'
            ], 500);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            // Lấy danh mục dịch vụ
            $serviceCategories = CategoryService::with('services')->get();

            // Ngày bắt đầu
            $startDate = Carbon::now()->startOfDay();

            // Ngày kết thúc tính lịch làm việc
            $endDateForWorkSchedule = $startDate->copy()->addDay(3)->endOfDay();

            // Lấy danh sách ngày làm việc
            $availableDates = WorkSchedule::whereBetween('day', [$startDate, $endDateForWorkSchedule])
                ->groupBy('day')
                ->pluck('day');

            // Lấy danh sách nhân viên có lịch trong 3 ngày tới
            $staffMembers = Admin::with('work_schedules')
                ->whereHas('work_schedules', function ($query) use ($startDate, $endDateForWorkSchedule) {
                    $query->whereBetween('day', [$startDate, $endDateForWorkSchedule]);
                })->get();

            // Lấy danh sách khung giờ
            $timeSlots = Time::whereHas('work_schedules', function ($query) use ($startDate) {
                $query->where('day', $startDate);
            })->whereHas('work_schedule_details', function ($query) {
                $query->where('status', 'available');
            })->get()->unique();
            return view('admin.scheduleManagement.create', compact('serviceCategories', 'staffMembers', 'availableDates', 'timeSlots'));
        } catch (Exception $e) {
            Log::error('Error in booking index: ' . $e->getMessage());
            return view('client.errors.500');
        }
    }
    public function getStaff(Request $request)
    {
        try {
            $adminId = $request->admin_id;
            $day = $request->day;
            if ($adminId && $day) {

                $workSchedules = WorkSchedule::with('times')
                    ->where('day', $day)
                    ->where('admin_id', $adminId)
                    ->firstOrFail();
                $workScheduleDetails = $workSchedules->work_schedule_details;

                $availableDetails = $workScheduleDetails->filter(function ($detail) {
                    return $detail->status === 'unavailable';
                });

                if ($availableDetails->count() === $workScheduleDetails->count()) {
                    return response()->json([
                        'message' => "Nhân viên đang bận vào ngày $day , vui lòng chọn nhân viên hoặc ngày khác",
                    ], 404);
                }
                return response()->json([
                    'times' => $workSchedules->times,
                ], 200);
            } elseif ($day) {
                $timeSlots = Time::with('work_schedules')->whereHas('work_schedules', function ($query) use ($day) {
                    $query->where('day', $day);
                })->whereHas('work_schedule_details', function ($query) {
                    $query->where('status', 'available');
                })->get()->unique();

                return response()->json([
                    'times' => $timeSlots,
                ], 200);
            }
        } catch (ModelNotFoundException $e) {
            $day = Carbon::parse($day)->format('d-m-Y');
            return response()->json([
                'message' => "Nhân viên đang bận vào ngày $day , vui lòng chọn nhân viên hoặc ngày khác"
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error in getStaff: ' . $e->getMessage());
            return response()->json([
                'message' => 'Có lỗi xảy ra, vui lòng thử lai sau!'
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $admin_id = $request->admin_id;
            $day = $request->day;
            $params = [
                'name' => $request->name,
                'admin_id' => $admin_id,
                'phone' => $request->phone,
                'total_price' => $request->total_price,
                'email' => $request->email,
                'day' => $day,
            ];
            $user = User::where('phone', $request->phone)->first();
            if ($user) {
                $params['user_id'] = $user->id;
            } else {
                $user = User::create([
                    'username' => $request->name,
                    'phone' => $request->phone,
                ]);
                $params['user_id'] = $user->id;
            }
            $time_id = $request->time;
            $time = Time::query()->findOrFail($time_id);
            $params['time'] = $time->time;
            if ($request->promo_code) {
                $promo = Promotion::where('promocode', $request->promo_code)->first();
                $params['promo_id'] = $promo->id;
            }
            $booking = Booking::query()->create($params);
            $idServicesBookingDetail = explode(',', $request->servicesId);
            foreach ($idServicesBookingDetail as $id) {
                $service = Service::query()->findOrFail($id);
                BookingDetail::query()->create([
                    'booking_id' => $booking->id,
                    'service_id' => $id,
                    'name' => $service->name,
                    'price' => $service->price,
                ]);
            }
            $workSchedule = WorkSchedule::query()->where('admin_id', $admin_id)->where('day', $day)->first();
            $findWorkScheduleDetail = DB::table('work_schedule_details')
                ->where('work_schedule_details.time_id', $time->id)
                ->where('work_schedule_details.work_schedules_id', $workSchedule->id);
            if ($findWorkScheduleDetail->first()->status == 'unavailable') {
                throw new Exception('Lịch đã được đặt rồi', 400);
            }
            $findWorkScheduleDetail->update(['work_schedule_details.status' => 'unavailable']);
            return response()->json([
                'message' => 'Thêm lịch đặt thành công',
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error in store: ' . $e->getMessage());
            if ($e->getCode() === 400) {
                return response()->json([
                    'message' => $e->getMessage()
                ], 400);
            }
            return response()->json([
                'message' => 'Có lỗi xảy ra, vui lòng thử lai sau!'
            ], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        try {
            $data = Booking::query()->findOrFail($id);

            // Lấy danh mục dịch vụ
            $serviceCategories = CategoryService::with('services')->get();
            $service = Service::all();
            // Ngày bắt đầu
            $startDate = Carbon::now()->startOfDay();

            // Ngày kết thúc tính lịch làm việc
            $endDateForWorkSchedule = $startDate->copy()->addDay(3)->endOfDay();

            // Lấy danh sách ngày làm việc
            $availableDates = WorkSchedule::whereBetween('day', [$startDate, $endDateForWorkSchedule])
                ->groupBy('day')
                ->pluck('day');

            // Lấy danh sách nhân viên có lịch trong 3 ngày tới 
            $staffMembers = Admin::with('work_schedules')
                ->whereHas('work_schedules', function ($query) use ($startDate, $endDateForWorkSchedule) {
                    $query->whereBetween('day', [$startDate, $endDateForWorkSchedule]);
                })->get();

            // Lấy danh sách khung giờ
            $day = Carbon::parse($data->day);

            $workSchedules = WorkSchedule::with('times')
                ->where('day', $day)
                ->where('admin_id', $data->admin_id)
                ->first();

            $timeSlots = $workSchedules->times;
            $timeSelected = Time::where('time', $data->time)->first();

            return view('admin.scheduleManagement.edit', compact('serviceCategories', 'data', 'staffMembers', 'availableDates', 'timeSlots', 'service', 'timeSelected'));
        } catch (Exception $e) {
            Log::error('Error in booking index: ' . $e->getMessage());
            return view('client.errors.500');
        }
    }
    public function update(UpdateRequest $request, $id)
    {
        try {

            $admin_id = $request->admin_id;
            $day = $request->day;
            $params = [
                'name' => $request->name,
                'admin_id' => $admin_id,
                'phone' => $request->phone,
                'total_price' => $request->total_price,
                'email' => $request->email,
                'day' => $day,
            ];
            $user = User::where('phone', $request->phone)->first();
            if ($user) {
                $params['user_id'] = $user->id;
            } else {
                $user = User::create([
                    'username' => $request->name,
                    'phone' => $request->phone,
                ]);
                $params['user_id'] = $user->id;
            }
            $time_id = $request->time;
            $time = Time::query()->findOrFail($time_id);
            $params['time'] = $time->time;
            if ($request->promo_code) {
                $promo = Promotion::where('promocode', $request->promo_code)->first();
                $params['promo_id'] = $promo->id;
            }
            $booking = Booking::query()->findOrFail($id);
            $bookingOld = Booking::query()->findOrFail($id);

            $booking->update($params);
            $booking->booking_details()->delete();

            $idServicesBookingDetail = explode(',', $request->servicesId);
            foreach ($idServicesBookingDetail as $id) {
                $service = Service::query()->findOrFail($id);
                BookingDetail::query()->create([
                    'booking_id' => $booking->id,
                    'service_id' => $id,
                    'name' => $service->name,
                    'price' => $service->price,
                    'admin_id' => $admin_id,
                ]);
            }

            $workSchedule = WorkSchedule::query()->where('admin_id', $admin_id)->where('day', $day)->first();
            $findWorkScheduleDetail = DB::table('work_schedule_details')
                ->where('work_schedule_details.time_id', $time->id)
                ->where('work_schedule_details.work_schedules_id', $workSchedule->id);

            $timeSelected = Time::where('time', $bookingOld->time)->first();
            $workScheduleSelected = WorkSchedule::query()->where('admin_id', $bookingOld->admin_id)->where('day', $bookingOld->day)->first();
            $findWorkScheduleDetailSelected = DB::table('work_schedule_details')
                ->where('work_schedule_details.time_id', $timeSelected->id)
                ->where('work_schedule_details.work_schedules_id', $workScheduleSelected->id)->update(['status' => 'available']);

            // $findWorkScheduleDetailSelected->update(['status' => 'available']);


            $findWorkScheduleDetail->update(['work_schedule_details.status' => 'unavailable']);
            return response()->json([
                'message' => 'Thêm lịch đặt thành công',
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error in store: ' . $e->getMessage());
            if ($e->getCode() === 400) {
                return response()->json([
                    'message' => $e->getMessage()
                ], 400);
            }
            return response()->json([
                'message' => 'Có lỗi xảy ra, vui lòng thử lai sau!'
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */

    public function updateStatus(Request $request, string $id)
    {
        try {
            $data = Booking::query()->findOrFail($id);
            $data->status = $request->status;
            $data->save();
            if ($data->status == "success") {
                $bill = Bill::create([
                    'name' => $data->name,
                    'user_id' => $data->user_id,
                    'admin_id' => $data->admin_id,
                    'phone' => $data->phone,
                    'promo_id' => $data->promo_id,
                    'total_price' => $data->total_price,
                    'email' => $data->email,
                    'day' => $data->day,
                    'time' => $data->time,
                ]);
                foreach ($data->booking_details as $item) {
                    if ($item->status == "cancel" && $item->deleted_at === null) {
                        $bill->bill_details()->create([
                            'service_id' => $item->service_id,
                            'name' => $item->name,
                            'price' => $item->price,
                            'admin_id' => $item->admin_id,
                            'bill_id' => $bill->id,
                            
                        ]);
                    }
                }
            }
            $dataOld = Booking::query()->findOrFail($id);
            if ($dataOld->status == "canceled") {
                $timeSelected = Time::where('time', $dataOld->time)->first();
                $workScheduleSelected = WorkSchedule::query()->where('admin_id', $dataOld->admin_id)->where('day', $dataOld->day)->first();
                $findWorkScheduleDetailSelected = DB::table('work_schedule_details')
                    ->where('work_schedule_details.time_id', $timeSelected->id)
                    ->where('work_schedule_details.work_schedules_id', $workScheduleSelected->id)->update(['status' => 'available']);
            }
            return response()->json([
                'status' => 200,
                'success' => 'Cập nhật trạng thái đặt lịch thành công',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'success' => 'Cập nhật trạng thái lịch đặt thất bại'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
