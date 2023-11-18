<?php

namespace App\Http\Controllers\Client;

use App\Events\AdminNotifications;
use App\Events\CancelShcheduleNotifications;
use Exception;
use App\Models\Time;
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
use App\Http\Requests\Client\Booking\StoreRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function booking_history(Request $request)
    {
        try {
            $id = auth('web')->user()->id;
            $list_booking = Booking::query()
                ->where('user_id', $id)
                ->latest()
                ->paginate(10);

            if ($request->ajax()) {
                return view('client.booking_history.list_booking', compact('list_booking'));
            }

            return view('client.booking_history.index', compact('list_booking'));
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function index()
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
                ->pluck('day')
                ->sort();

            // Lấy danh sách nhân viên có lịch trong 3 ngày tới
            $staffMembers = Admin::with('work_schedules')
                ->whereHas('work_schedules', function ($query) use ($startDate, $endDateForWorkSchedule) {
                    $query->whereBetween('day', [$startDate, $endDateForWorkSchedule]);
                })->get();

            // Lấy danh sách khung giờ

            $timeSlots = Time::with('work_schedules')->orderBy('time')
                ->whereHas('work_schedules', function ($query) use ($startDate) {
                    $query->where('day', $startDate);
                })
                ->whereHas('work_schedule_details', function ($query) {
                    $query->where('status', 'available');
                })
                ->get();


            return view('client.booking', compact('serviceCategories', 'staffMembers', 'availableDates', 'timeSlots'));
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

                $workSchedules = WorkSchedule::with(['times' => function ($query) {
                    $query->orderBy('time');
                }])
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
                $timeSlots = Time::with('work_schedules')->orderBy('time')
                    ->whereHas('work_schedules', function ($query) use ($day) {
                        $query->where('day', $day);
                    })
                    ->whereHas('work_schedule_details', function ($query) {
                        $query->where('status', 'available');
                    })
                    ->get();


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

    public function store(StoreRequest $request)
    {
        try {

            $admin_id = $request->admin_id;
            $day = $request->day;
            $params = [
                'name' => $request->name,
                'user_id' => auth('web')->user()->id,
                'phone' => $request->phone,
                'total_price' => $request->total_price,
                'email' => $request->email,
                'day' => $day,
            ];
            $time_id = $request->time;
            $time = Time::query()->findOrFail($time_id);
            if($admin_id == "random"){
            $params['admin_id'] = DB::table('work_schedule_details')
                ->join('times', 'work_schedule_details.time_id', '=', 'times.id')
                ->join('work_schedules', 'work_schedule_details.work_schedules_id', '=', 'work_schedules.id')
                ->where('times.id', $time_id)
                ->where('work_schedule_details.status', 'available')
                ->inRandomOrder() // Lấy ngẫu nhiên
                ->value('work_schedules.admin_id');
            }else{
                $params['admin_id'] = $admin_id;
            }
      
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
          
            $workSchedule = WorkSchedule::query()->where('admin_id', $params['admin_id'])->where('day', $day)->first();

            $findWorkScheduleDetail = DB::table('work_schedule_details')
                ->where('work_schedule_details.time_id', $time->id)
                ->where('work_schedule_details.work_schedules_id', $workSchedule->id);
            if ($findWorkScheduleDetail->first()->status == 'unavailable') {
                throw new Exception('Lịch đã được đặt rồi', 400);
            }
            $findWorkScheduleDetail->update(['work_schedule_details.status' => 'unavailable']);
            event(new AdminNotifications([
                'created_at' => Carbon::now()->format('H:i:s d-m-Y'),
                'message' => 'Lịch đặt mới',
                'id' => 'Hóa đơn số' . ' ' . $booking->id,
                'day' => Carbon::parse($request->day)->format('d-m-Y'),
                'time' => Carbon::parse($time->time)->format('H:i'),
            ]));
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id_user = auth('web')->user()->id;
        $item = Booking::query()->findOrFail($id);
        $servicesNotInBooking = Service::whereDoesntHave('booking_details', function ($query) use ($id) {
            $query->where('booking_id', $id);
        })->get();
        return view('client.booking_history.edit', compact('item', 'id_user', 'servicesNotInBooking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $booking = Booking::query()->findOrFail($id);
            $allIds = $booking->booking_details()->pluck('id');
            $uncheckedIds = $allIds->diff($request->status);
            foreach ($request->status as $value) {
                $bookingDetail = BookingDetail::query()->findOrFail($value);
                $bookingDetail->status = "success";
                $bookingDetail->save();
            }
            foreach ($uncheckedIds as $value) {
                $bookingDetail = BookingDetail::query()->findOrFail($value);
                $bookingDetail->status = "cancel";
                $bookingDetail->save();
            }
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $phone = $request->input('phone');
        $booking = Booking::query()->findOrFail($id);
        if ($booking->status === 'pending') {
            $user = auth()->user();
            if ($user->phone === $phone) {
                $booking->status = 'canceled';
                $booking->save();
                $bookingOld = Booking::query()->findOrFail($id);
                if ($bookingOld->status == "canceled") {
                    $timeSelected = Time::where('time', $bookingOld->time)->first();
                    $workScheduleSelected = WorkSchedule::query()->where('admin_id', $bookingOld->admin_id)->where('day', $bookingOld->day)->first();
                    $findWorkScheduleDetailSelected = DB::table('work_schedule_details')
                        ->where('work_schedule_details.time_id', $timeSelected->id)
                        ->where('work_schedule_details.work_schedules_id', $workScheduleSelected->id)->update(['status' => 'available']);
                }

                event(new CancelShcheduleNotifications([
                    'created_at' => Carbon::now()->format('H:i:s d-m-Y'),
                    'message' => 'Lịch đặt đã bị hủy',
                    'id' => 'Hóa đơn số' . ' ' . $booking->id,
                    'day' => Carbon::parse($booking->day)->format('d-m-Y'),
                    'time' => Carbon::parse($booking->time)->format('H:i'),
                ]));
                toastr()->success('Hủy đơn thành công');
                return response()->json(['success' => true]);
            } else {
                toastr()->error('Hủy đơn không thành công');
                return response()->json(['success' => false]);
            }
        } else {
            toastr()->error('Thao tác không khớp');
            return response()->json(['success' => false]);
        }
    }
}
