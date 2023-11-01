<?php

namespace App\Http\Controllers\Client;

use Exception;
use App\Models\Time;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Service;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;
use App\Models\BookingDetail;
use Illuminate\Support\Carbon;
use App\Models\CategoryService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Booking\StoreRequest;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function booking_history()
    {
        $id = auth('web')->user()->id;
        $list_booking = Booking::query()->where('user_id', $id)->get();
        return view('client.booking_history.index', compact('list_booking'));
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
    public function store(StoreRequest $request)
    {
        try {
            $params = [
                'name' => $request->name,
                'user_id' => auth('web')->user()->id,
                'admin_id' => $request->admin_id,
                'phone' => $request->phone,
                'total_price' => $request->total_price,
                'email' => $request->email,
                'day' => $request->day,
                'time' => $request->time,
            ];
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
            return response()->json([
                'message' => 'Thêm lịch đặt thành công',
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error in store: ' . $e->getMessage());
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
        return view('client.booking_history.edit', compact('item', 'id_user','servicesNotInBooking'));
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
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $phone = $request->input('phone');
        $booking = Booking::query()->findOrFail($id);

        if ($booking->status === 'pending') {
            $user = auth()->user();

            if ($user->phone === $phone) {
                $booking->status = 'canceled'; 
                $booking->save();
                toastr()->success('Hủy đơn thành công');
                return redirect()->back();
            } else {
                toastr()->error('Hủy đơn không thành công');
                return redirect()->back();
            }
        } else {
            toastr()->error('Thao tác không khớp');
                return redirect()->back();
        }
    }
}
