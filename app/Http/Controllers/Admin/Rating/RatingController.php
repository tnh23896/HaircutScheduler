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
		$data = Review::select('reviews.*', 'users.username as user_name', 'admins.username as admin_name')
			->leftJoin('users', 'reviews.user_id', '=', 'users.id')
			->leftJoin('admins', 'reviews.admin_id', '=', 'admins.id')->latest()->paginate(10);
		return view('admin.rating.index', compact('data'));
	}

	public function search(Request $request)
	{
		try {
			$search = $request->input('search');
			$fields = ['user_name', 'admin_name'];

			$data = Review::select('reviews.*', 'users.username as user_name', 'admins.username as admin_name')
				->leftJoin('users', 'reviews.user_id', '=', 'users.id')
				->leftJoin('admins', 'reviews.admin_id', '=', 'admins.id')
				->where(function ($query) use ($search) {
					$query->where('users.username', 'like', '%' . $search . '%')
						->orWhere('admins.username', 'like', '%' . $search . '%');
				})
				->latest()
				->paginate(10)
				->withQueryString();

			return view('admin.rating.index', compact('data'));
		} catch (\Throwable $th) {
			return response()->json($th);
		}
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
