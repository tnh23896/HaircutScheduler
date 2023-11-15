<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $id = auth('web')->user()->id;
            $list_reviews = Review::query()
                ->where('user_id', $id)
                ->latest()
                ->paginate(10);
            return view('client.review.index', compact('list_reviews'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'star' => 'required',
                'comment' => 'required|max:255',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Không được để trống đánh giá');
            }
            $data = new Review();
            $data->fill($request->all());
            $data->save();
            return redirect()->route('bill')->with('success', 'Đánh giá thành công');
        } catch (\Exception $e) {
            abort(404);
        }
    }


}
