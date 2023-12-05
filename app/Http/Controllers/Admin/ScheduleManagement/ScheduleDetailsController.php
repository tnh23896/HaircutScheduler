<?php

namespace App\Http\Controllers\Admin\ScheduleManagement;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Models\BookingDetail;
use App\Http\Controllers\Controller;
use App\Models\HistoryAction;
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
			$addedServiceNames = [];

			foreach ($request->active as $value) {
				$service = Service::query()->findOrFail($value);

				$bookingDetail = BookingDetail::create([
					'booking_id' => $id,
					'service_id' => $value,
					'status' => 'success',
					'name' => $service->name,
					'price' => $service->price,
				]);

				// Thêm tên dịch vụ vào mảng
				$addedServiceNames[] = $bookingDetail->name;
			}

			// Tạo lịch sử hành động với tất cả các tên dịch vụ được thêm vào
			HistoryAction::create([
				'booking_id' => $booking->id,
				'admin_id' => Auth::guard('admin')->user()->id,
				'action' => 'Thêm thành công dịch vụ: ' . implode(', ', $addedServiceNames),
			]);

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
		} else {
			$sum_price_end = $sum_price;
		}
		if ($booking->amount_paid > $sum_price_end) {
			$retun_price = $booking->amount_paid - $sum_price_end;
		} elseif ($booking->amount_paid < $sum_price_end) {
			$retun_price = $sum_price_end - $booking->amount_paid;
		} else {
			$retun_price = 0;
		}
		$history_action = HistoryAction::where('booking_id', $id)->latest('created_at')->get();
		$item = Booking::query()->findOrFail($id);
		$servicesNotInBooking = Service::whereDoesntHave('booking_details', function ($query) use ($id) {
			$query->where('booking_id', $id);
		})->get();
		return view('admin.ScheduleManagement.scheduleDetails', compact('item', 'servicesNotInBooking', 'sum_price_end', 'sum_price', 'history_action'));
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
			$addedServiceNames = [];
			$uncheckedIdsServiceName = [];
			foreach ($request->status as $value) {
				$bookingDetail = BookingDetail::query()->findOrFail($value);
				$bookingDetail->status = "success";
				$bookingDetail->save();
				$addedServiceNames[] = $bookingDetail->name;
			}
			foreach ($uncheckedIds as $value) {
				$bookingDetail = BookingDetail::query()->findOrFail($value);
				$bookingDetail->status = "cancel";
				$bookingDetail->save();
				$uncheckedIdsServiceName[] = $bookingDetail->name;
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
			} else {
				$sum_price_end = $sum_price;
			}
			Booking::where('id', $id)->update([
				'total_price' => $sum_price_end,
			]);
			// if ($bookingDetail->status == 'success') {
			// 	$statusVn = 'Hủy dich vụ ';
			// }
			// if ($bookingDetail->status == 'cancel') {
			// 	$statusVn = 'Sử dụng dịch vụ ';
			// }
			if (count($addedServiceNames) > 0) {
				$bienchung[] = 'Sử dụng dịch vụ: ' . implode(', ', $addedServiceNames).'.';
			}
			if (count($uncheckedIdsServiceName) > 0) {
				$bienchung[] = 'Hủy dịch vụ: ' . implode(', ', $uncheckedIdsServiceName);
			}
			HistoryAction::create([
				'booking_id' => $booking->id,
				'admin_id' => Auth::guard('admin')->user()->id,
				'action' => implode(', ', $bienchung),
			]);
			return redirect()->back()->with('success', 'Cập nhật thành công');
		} catch (\Exception $e) {
			return redirect()->back()->with('error', 'Cập nhật thất bại');
		}
	}
}
