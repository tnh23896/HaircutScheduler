<?php

namespace App\Http\Controllers\Admin\ServiceManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceManagement\Category\StoreRequest;
use App\Http\Requests\Admin\ServiceManagement\Category\UpdateRequest;
use App\Models\CategoryService;
use App\Models\Service;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(
        private CategoryService $model,
    ) {
    }

    public function index()
    {
        $category_service = $this->model->latest()->paginate(5);

        return view('admin.serviceManagement.category.index', compact('category_service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.serviceManagement.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $newCategory = $this->model::create($request->validated());

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $newCategory->image = upload_file('admin/categoryService', $request->file('image'));
                $newCategory->save();
            }
            return response()->json(['success' => 'Cập nhật danh mục dịch vụ thành công']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Cập nhật danh mục dịch vụ thất bại'], 500);
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
    public function edit($id)
    {
        $one_category_service = $this->model::find($id);

        return view('admin.serviceManagement.category.edit', compact('one_category_service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $category_service = $this->model::query()->findOrFail($id);

            $imgOld = $category_service->image;

            $category_service->fill($request->all());


            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $category_service->image = upload_file('admin/categoryService', $request->file('image'));
                delete_file($imgOld);
            }

            $category_service->save();

            return response()->json(['success' => 'Cập nhật danh mục dịch vụ']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Cập nhật danh mục dịch vụ thất bại'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $category_service = $this->model::findOrFail($id);
            $imgOld = $category_service->image;
            if ($category_service) {
                delete_file($imgOld);
                $category_service->delete();
                return response()->json(['success' => 'Xóa danh mục dịch vụ']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Xóa danh mục dịch vụ thất bại'], 500);
        }
    }
}
