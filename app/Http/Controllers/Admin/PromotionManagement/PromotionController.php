<?php

namespace App\Http\Controllers\Admin\PromotionManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PromotionManagement\StoreRequest;
use App\Http\Requests\Admin\PromotionManagement\UpdateRequest;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Promotion::query()->latest()->paginate(5);
        return view('admin.PromotionManagement.index', compact('data'));
    }

    public function filter(Request $request)
    {
        try {
            $today = (\Carbon\Carbon::today());

            $filter = $request->input('filter');
            switch ($filter) {
                case 'active':
                    $data = Promotion::query()
                        ->where('expire_date', '>=', $today)
                        ->latest()
                        ->paginate(5)
                        ->withQueryString();
                    break;
                case 'inactive':
                    $data = Promotion::query()
                        ->where('expire_date', '<', $today)
                        ->latest()
                        ->paginate(5)
                        ->withQueryString();
                    break;
                default:
                    $data = Promotion::query()->latest()->paginate(5);
                    break;
            }
            return view('admin.PromotionManagement.index', compact('data'));
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Thêm mới không thành công'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.PromotionManagement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $promotion = new Promotion();
            $promotion->fill($request->all());
            $promotion->save();
            return response()->json(['success' => 'Thêm mới thành công']);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Thêm mới không thành công'], 500);
        }
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
        $promotion = Promotion::find($id);
        return view('admin.PromotionManagement.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            $promotion = Promotion::find($id);
            $promotion->fill($request->all());
            $promotion->save();
            return response()->json(['success' => 'Cập nhật thành công']);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Cập nhật không thành công'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $promotion = Promotion::find($id);
            $promotion->delete();
            return response()->json(['success' => 'Xóa thành công']);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Xóa không thành công'], 500);
        }
    }
}
