<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index()
	{
		$topBookers = Booking::select('users.username')
		 	->selectRaw('count(bookings.id) as total_bookings')
			->selectRaw('SUM(bookings.total_price) as total_price')
			->where('bookings.status','success')
			->join('users', 'bookings.user_id', '=', 'users.id')
			->groupBy('users.username')
			->orderBy('total_bookings', 'desc')
			->take(5)
			->get();
		return view('admin.dashboard', compact('topBookers'));
	}

	public function filterByMonthAndYear(Request $request)
	{
		$month = $request->month;
		$year = $request->year;

		$query = Booking::join('users', 'users.id', '=', 'bookings.user_id')
			->select('users.username', 'bookings.user_id')
			->selectRaw('SUM(bookings.total_price) as total_price')
			->selectRaw('COUNT(*) as totalBookings')
			->where('bookings.status','success')
			->groupBy('bookings.user_id', 'users.username')
			->orderByDesc('totalBookings');
		if ($month) {
			$query->whereMonth('day', $month);
		}

		if ($year) {
			$query->whereYear('day', $year);
		}

		$filteredData = $query->get();

		return response()->json(['filterData' => $filteredData]);
	}
}
