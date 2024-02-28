<?php

namespace App\Http\Controllers\Admin\Rating;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
	//
	public function index()
	{
		$data = Review::select('reviews.*', 'bookings.name as user_name', 'admins.username as admin_name', 'bookings.phone as user_phone')
			->leftJoin('bookings', 'reviews.booking_id', '=', 'bookings.id')
			->leftJoin('admins', 'reviews.admin_id', '=', 'admins.id')->latest()->paginate(10);
		$category = Admin::get(['id', 'username', 'email']);
		return view('admin.rating.index', compact('data', 'category'));
	}

	public function search(Request $request)
	{
		try {
			$search = $request->input('search');
			$category = Admin::get(['id', 'username', 'email']);
			$fields = ['user_name', 'admin_name'];

			$data = Review::select('reviews.*', 'bookings.name as user_name', 'admins.username as admin_name')
				->leftJoin('bookings', 'reviews.booking_id', '=', 'bookings.id')
				->leftJoin('admins', 'reviews.admin_id', '=', 'admins.id')
				->where(function ($query) use ($search) {
					$query->where('bookings.name', 'like', '%' . $search . '%')
						->orWhere('admins.username', 'like', '%' . $search . '%');
				})
				->latest()
				->paginate(10)
				->withQueryString();

			return view('admin.rating.index', compact('data', 'category'));
		} catch (\Throwable $th) {
			return response()->json($th);
		}
	}
	public function filter(Request $request)
	{
		$filter = $request->input('filter');
		$category = Admin::get(['id', 'username', 'email']);
		if ($filter == "") {
			$data = Review::select('reviews.*', 'bookings.name as user_name', 'admins.username as admin_name')
				->leftJoin('bookings', 'reviews.booking_id', '=', 'bookings.id')
				->leftJoin('admins', 'reviews.admin_id', '=', 'admins.id')->latest()->paginate(10);
		} else {
			$data = Review::select('reviews.*', 'bookings.name as user_name', 'admins.username as admin_name')
				->leftJoin('bookings', 'reviews.booking_id', '=', 'bookings.id')
				->leftJoin('admins', 'reviews.admin_id', '=', 'admins.id')
				->where('reviews.admin_id', $filter)
				->latest()->paginate(10);
		}
		return view('admin.rating.index', compact('data', 'category'));
	}

	public function destroy(string $id)
	{
		//
		try {
			$rating = Review::findOrFail($id);
			if ($rating) {
				$rating->delete();
				return response()->json(['success' => 'Xóa đánh giá thành công']);
			}
		} catch (\Exception $e) {
			return response()->json(['error' => 'Xóa đánh giá thất bại'], 500);
		}
	}
}
