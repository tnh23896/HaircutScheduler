<?php

namespace App\Http\Controllers\Client;

use Exception;
use App\Models\Time;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\WorkSchedule;
use App\Models\BookingDetail;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\CategoryService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

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
            $categoriesServices = CategoryService::with('services')->get();
            $startDay = Carbon::now()->startOfDay(); 
            $endDay = $startDay->copy()->addDay(3)->endOfDay();
            
            $staffs = Admin::all();

            $times = Time::all();


            return view('client.booking', compact('categoriesServices', 'staffs', 'times'));
        } catch (Exception $e) {
            Log::error('Error in booking index: ' . $e->getMessage());
            return view('client.errors.500');
        }
    }
    public function getStaff(Request $request)
    {
        try {
            $admin_id = $request->admin_id;
            $day = $request->day;

            $workSchedule = WorkSchedule::with('times')->where('admin_id', $admin_id)->where('day', $day)->first();

            if ($workSchedule) {
                $times = $workSchedule->times;

                return response()->json([
                    'admin_id' => $admin_id,
                    'day' => $day,
                    'times' => $times
                ]);
            } else {
                return response()->json([
                    'message' => 'Work schedule not found'
                ], 404);
            }
        } catch (\Exception $e) {
            Log::error('Error in getAdminWorkSchedule: ' . $e->getMessage());
            return response()->json([
                'message' => 'An error occurred'
            ], 500);
        }
    }
    public function store(Request $request)
    {
        return response()->json([
            'request' => $request->all()
        ]);
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
    public function destroy(string $id)
    {
        //
    }
}
