<?php

namespace App\Http\Controllers\Admin\ScheduleManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScheduleManagement\UpdateRequest;
use App\Models\Bill;
use App\Models\Booking;
use App\Models\BookingDetail;
use Illuminate\Http\Request;

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
                return view('admin.BillManagement.index', ['data' => $bookingsByDateAndTime]);
            } else {
                $bookingsByDateAndTime->count() > 0;
                return view('admin.BillManagement.index', ['data' => $bookingsByDateAndTime]);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $data = Booking::query()->findOrFail($id);
        return view('admin.scheduleManagement.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
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
                    if ($item->status == "success") {
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
            return response()->json([
                'status' => 200,
                'success' => 'Cập nhật lịch đặt thành công'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'success' => 'Cập nhật lịch đặt thất bại'
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
