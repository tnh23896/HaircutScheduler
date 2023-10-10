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
        $banners = Banner::paginate(5);
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

            if ($request->hasFile('image')) {
                $banner->image = upload_file('uploads', $request->file('image'));
            }

            $banner->save();

            return response()->json(['success' => 'Banner created successfully']);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Banner created false']);
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
            $banner->fill($request->all());
            $imgOld = $banner->image;
            if ($request->hasFile('image')) {
                $banner->image = upload_file('uploads', $request->file('image'));
                delete_file($imgOld);
            }
            $banner->save();

            return response()->json(['success' => 'Banner updated successfully']);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Banner updated false']);
        }
    }


    public function delete($id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            delete_file($banner->image);
            $banner->delete();
            return response()->json(['success' => 'Banner deleted successfully']);
        } else {
            return response()->json(['error' => 'Banner not found']);
        }
    }
}
