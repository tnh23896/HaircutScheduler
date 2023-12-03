<?php

namespace App\Http\Controllers\Admin\ScheduleManagement;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Models\BookingDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ScheduleDetailsController extends Controller
{
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
                ]);
            }
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật thất bại');
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
            return redirect()->back()->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {    
        $booking = Booking::query()->findOrFail($id);
         $sum_price = 0;
        foreach ($booking->booking_details as $item) {
            if ($item->status == "success") {
                $sum_price += $item->price;
            }
        }
        $promo = Promotion::where('id', $booking->promo_id)->first();
        if ($promo) {
            
            $sum_price_end = $sum_price - $promo->discount;
        }else{
            $sum_price_end = $sum_price;
        }
        if($booking->amount_paid > $sum_price_end){
            $retun_price = $booking->amount_paid - $sum_price_end;
        }elseif($booking->amount_paid < $sum_price_end){
            $retun_price = $sum_price_end - $booking->amount_paid;
        }else{
            $retun_price = 0;
        }
        $item = Booking::query()->findOrFail($id);
        $servicesNotInBooking = Service::whereDoesntHave('booking_details', function ($query) use ($id) {
            $query->where('booking_id', $id);
        })->get();
        return view('admin.ScheduleManagement.scheduleDetails', compact('item', 'servicesNotInBooking','sum_price_end','sum_price'));
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
            $sum_price = 0;
            foreach ($booking->booking_details as $item) {
                if ($item->status == "success") {
                    $sum_price += $item->price;
                }
            }
            $promo = Promotion::where('id', $booking->promo_id)->first();
            if ($promo) {

                $sum_price_end = $sum_price - $promo->discount;
            }else{
                $sum_price_end = $sum_price;
            }
            Booking::where('id', $id)->update([
                'total_price' => $sum_price_end,
            ]);
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật thất bại');
        }
    }

}
