<?php

namespace App\Http\Controllers\Client;

use Exception;
use App\Models\Time;
use App\Models\Admin;
use App\Models\Review;
use App\Models\Booking;
use App\Models\Service;
use App\Jobs\BookedMail;
use App\Models\Promotion;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;
use App\Models\BookingDetail;
use Illuminate\Support\Carbon;
use App\Models\CategoryService;
use App\Events\AdminNotifications;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Events\SendEmailBookedEvent;
use App\Http\Controllers\Controller;
use App\Events\CancelShcheduleNotifications;
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
            $reviews = Review::all();
            if ($request->ajax()) {
                return view('client.booking_history.list_booking', compact('list_booking', 'reviews'));
            }

            return view('client.booking_history.index', compact('list_booking', 'reviews'));
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function index()
    {
        try {
            $today = Carbon::today();
            // Lấy danh mục dịch vụ
            $serviceCategories = CategoryService::with('services')->get();
            $promotion = Promotion::query()->where('expire_date', '>=', $today)->get()->toArray();
            // Ngày bắt đầu
            $startDate = Carbon::now()->startOfDay();

            // Ngày kết thúc tính lịch làm việc
            $endDateForWorkSchedule = $startDate->copy()->addDay(5)->endOfDay();
            // Lấy danh sách ngày làm việc
            $availableDates = WorkSchedule::whereBetween('day', [$startDate, $endDateForWorkSchedule])
                ->groupBy('day')
                ->pluck('day')
                ->sort();

            // Lấy danh sách nhân viên có lịch trong 3 ngày tới
            $staffMembers = Admin::with(['work_schedules', 'reviews'])
                ->whereHas('work_schedules', function ($query) use ($startDate, $endDateForWorkSchedule) {
                    $query->whereBetween('day', [$startDate, $endDateForWorkSchedule]);
                })->get();

            //Lấy trung bình đánh giá sao của admin có id tương ứng
            $averageRatings = [];

            foreach ($staffMembers as $staffMember) {
                $reviews = Review::where('admin_id', $staffMember->id)->get();

                $totalRating = $reviews->sum('star');
                $reviewCount = $reviews->count();

                $averageRating = $reviewCount > 0 ? $totalRating / $reviewCount : 0;

                // Cập nhật giá trị trong mảng $averageRatings
                $averageRatings[$staffMember->id] = $averageRating;
            }

            // dd($averageRatings);

            // Lấy danh sách khung giờ
            $dateString = $startDate;
            if (!$availableDates->isEmpty()) {
                $dateString = min($availableDates->toArray());
            }
            $dateToCheck = Carbon::parse($dateString);
            $timeSlots = Time::whereHas('work_schedule_details', function ($query) use ($dateString) {
                $query->where('status', 'available')
                    ->whereHas('work_schedules', function ($query) use ($dateString) {
                        $query->where('day', $dateString);
                    });
            })->get();
            if ($dateToCheck->isToday()) {
                // Lọc các time slot sau thời gian quy định (ví dụ: sau 10 giờ)
                $currentTime = Carbon::now();
                $timeSlots = $timeSlots->filter(function ($timeSlot) use ($currentTime) {
                    $slotTime = Carbon::parse($timeSlot->time);
                    return $slotTime->gt($currentTime);
                });
            }
            return view('client.booking', compact('serviceCategories', 'staffMembers', 'availableDates', 'timeSlots', 'promotion', 'averageRatings'));
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
            if ($adminId == "random") {
                if ($day) {
                    $timeSlots = Time::whereHas('work_schedule_details', function ($query) use ($day) {
                        $query->where('status', 'available')
                            ->whereHas('work_schedules', function ($query) use ($day) {
                                $query->where('day', $day);
                            });
                    })->orderBy('time')->get();
                } else {
                    $timeSlots = Time::with('work_schedules')->orderBy('time')
                        ->whereHas('work_schedule_details', function ($query) {
                            $query->where('status', 'available');
                        })
                        ->get();
                }
                $dateToCheck = Carbon::parse($day);
                if ($dateToCheck->isToday()) {
                    // Lọc các time slot sau thời gian quy định (ví dụ: sau 10 giờ)
                    $currentTime = Carbon::now();
                    $timeSlots = $timeSlots->filter(function ($timeSlot) use ($currentTime) {
                        $slotTime = Carbon::parse($timeSlot->time);
                        return $slotTime->gt($currentTime);
                    });
                }

                return response()->json([
                    'times' => $timeSlots,
                ], 200);
            } else if ($adminId && $day) {

                $workSchedules = WorkSchedule::with([
                    'times' => function ($query) {
                        $query->orderBy('time');
                    }
                ])
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
                $timeSlots = $workSchedules->times;
                $dateToCheck = Carbon::parse($day);
                if ($dateToCheck->isToday()) {
                    // Lọc các time slot sau thời gian quy định (ví dụ: sau 10 giờ)
                    $currentTime = Carbon::now();
                    $timeSlots = $workSchedules->times->filter(function ($timeSlot) use ($currentTime) {
                        $slotTime = Carbon::parse($timeSlot->time);
                        return $slotTime->gt($currentTime);
                    });
                }
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
            $bookingsCount = DB::table('bookings')
                ->select(DB::raw('COUNT(*) as booking_count'))
                ->where('user_id', auth('web')->user()->id)
                ->whereDate('created_at', now()) // Filter by today's date
                ->groupBy('user_id')
                ->having('booking_count', '>', 1)
                ->get();

            if ($bookingsCount->isNotEmpty()) {
                // User has made more than 3 bookings today, show an error
                return response()->json(['error' => 'Yêu cầu đặt lịch bị từ chối do nghi ngờ là spam. Xin lỗi vì sự bất tiện này!'], 422);
            }
            $admin_id = $request->admin_id;
            $day = $request->day;
            $params = [
                'name' => $request->name,
                'user_id' => auth('web')->user()->id,
                'phone' => $request->phone,
                'admin_id' => $admin_id,
                'total_price' => $request->total_price,
                'email' => $request->email,
                'day' => $day,
            ];
            if ($request->payment == 'vnpay') {
                $params['payment'] = $request->payment;
            }
            if ($request->payment == 'momo') {
                $params['payment'] = $request->payment;
            }
            $time_id = $request->time;
            $time = Time::query()->findOrFail($time_id);
            if ($admin_id == "random") {
                $params['admin_id'] = DB::table('work_schedule_details')
                    ->join('times', 'work_schedule_details.time_id', '=', 'times.id')
                    ->join('work_schedules', 'work_schedule_details.work_schedules_id', '=', 'work_schedules.id')
                    ->where('times.id', $time_id)
                    ->where('work_schedule_details.status', 'available')
                    ->where('work_schedules.day', $day)
                    ->inRandomOrder() // Lấy ngẫu nhiên
                    ->value('work_schedules.admin_id');
            } else {
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
                throw new Exception('Lịch đã được đặt. Vui lòng chọn một lịch khác.', 400);
            }

            $findWorkScheduleDetail->update(['work_schedule_details.status' => 'unavailable']);
            event(new AdminNotifications([
                'created_at' => Carbon::now()->format('H:i:s d-m-Y'),
                'message' => 'Lịch đặt mới',
                'id' => 'Hóa đơn số' . ' ' . $booking->id,
                'day' => Carbon::parse($request->day)->format('d-m-Y'),
                'time' => Carbon::parse($time->time)->format('H:i'),
            ]));
            if ($request->payment == 'vnpay') {
                return response()->json([
                    'payment_method' => 'vnpay',
                    'url' => route('vnpay.process', [
                        'order_code' => $booking->id,
                        'amount' => $request->total_price,
                    ]),
                ], 200);
            }else if ($request->payment == 'momo') {
                return response()->json([
                    'payment_method' => 'momo',
                    'url' => route('momo.momo', [
                        'order_code' => $booking->id,
                        'total_price' => $request->total_price,
                    ]),
                ], 200);
            }else {
                dispatch(new BookedMail($booking))->onQueue('email_booked');
                return response()->json([
                    'message' => 'Đặt lịch thành công',
                    'booking' => $booking,
                ], 200);
            }
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
        $booking = Booking::query()->findOrFail($id);
        if ($booking->status === 'pending') {
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
            $id = auth('web')->user()->id;
            $list_booking = Booking::query()
                ->where('user_id', $id)
                ->latest()
                ->paginate(10);
            // dd($list_booking);
            return response()->json(['list_booking' => $list_booking,'success' => 'Hủy đơn thành công']);
        } else {
            return response()->json(['error' => 'Hủy đơn không thành công']);
        }

    }

}
