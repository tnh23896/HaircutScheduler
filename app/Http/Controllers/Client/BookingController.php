<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingDetail;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function booking_history()
    {
//        $id = auth()->user()->id;
        $id = 1;
        $list_booking = Booking::query()->where('user_id', $id)->get();
//        dd($list_booking);
        return view('client.booking_history.index', compact('list_booking'));
    }

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
    public function store(Request $request)
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
        $id_user = 1;
        $item = Booking::query()->findOrFail($id);
        return view('client.booking_history.edit', compact('item', 'id_user'));
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
