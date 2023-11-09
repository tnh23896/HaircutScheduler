<?php

namespace App\Http\Controllers\Admin\ScheduleManagement;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function store(Request $request, string $id)
    {
        try {
            $booking = Booking::query()->findOrFail($id);
            foreach ($request->active as $value) {
                $service = Service::query()->findOrFail($value);
                $bookingDetail = BookingDetail::create([
                    'booking_id' => $id,
                    'service_id' => $value,
                    'status' => 'success',
                    'name' => $service->name,
                    'price' => $service->price,
                    'admin_id' => Auth::guard('admin')->user()->id,
                ]);
            }
            return redirect()->back()->with('success', 'Cập nhật chi tiết lịch đặt thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật chi tiết lịch đặt thất bại');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $item = Booking::query()->findOrFail($id);
            return view('admin.ScheduleManagement.scheduleDetails', compact('item'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật chi tiết lịch thất bại');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Booking::query()->findOrFail($id);
        $servicesNotInBooking = Service::whereDoesntHave('booking_details', function ($query) use ($id) {
            $query->where('booking_id', $id);
        })->get();

        return view('admin.ScheduleManagement.scheduleDetails', compact('item', 'servicesNotInBooking'));
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
                $bookingDetail->admin_id = Auth::guard('admin')->user()->id;
                $bookingDetail->save();
            }
            foreach ($uncheckedIds as $value) {
                $bookingDetail = BookingDetail::query()->findOrFail($value);
                $bookingDetail->status = "cancel";
                $bookingDetail->admin_id = Auth::guard('admin')->user()->id;
                $bookingDetail->save();
            }
            return redirect()->back()->with('success', 'Cập nhật chi tiết lịch đặt thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật chi tiết lịch đặt thất bại');
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
