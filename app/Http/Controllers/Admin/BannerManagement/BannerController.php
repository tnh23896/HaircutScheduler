<?php

namespace App\Http\Controllers\Admin\BannerManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\StoreRequest;
use App\Http\Requests\Admin\Banner\UpdateRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('status', 'desc')->latest()->paginate(10);
        return view('admin.Banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.Banners.create');
    }

    public function store(StoreRequest $request)
    {
        try {
            $banner = new Banner();

            $banner->fill($request->all());

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $banner->image = upload_file('admin/Banner', $request->file('image'));
            }
            $banner->save();
            return response()->json(['success' => 'Thêm mới Banner thành công']);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Thêm mới Banner thất bại']);
        }
    }

    public function edit($id)
    {
        $one_banner = Banner::find($id);
        return view('admin.Banners.edit', compact('one_banner'));
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $banner = Banner::query()->findOrFail($id);
            $imgOld = $banner->image;
            $banner->fill($request->all());
            if ($request->status === 'active') {
                Banner::where('status', 'active')->where('id', '!=', $banner->id)->update(['status' => 'inactive']);
            }
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $banner->image = upload_file('admin/Banner', $request->file('image'));
                delete_file($imgOld);
            }
            $banner->save();
            return response()->json(['success' => 'Cập nhật Banner thành công']);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Cập nhật Banner thất bại']);
        }
    }


    public function delete($id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            delete_file($banner->image);
            $banner->delete();
            return response()->json(['success' => 'Xóa Banner thành công']);
        } else {
            return response()->json(['error' => 'Xóa Banner thất bại']);
        }
    }
}
