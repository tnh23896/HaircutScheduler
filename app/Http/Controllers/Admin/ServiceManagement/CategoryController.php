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
    )
    {
    }

    public function index()
    {
        $category_service = $this->model->latest()->paginate(10);

        return view('admin.ServiceManagement.Category.index', compact('category_service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ServiceManagement.Category.create');
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
            return response()->json(['success' => 'Thêm mới thành công']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Thêm mới thất bại'], 500);
        }
    }

    /**
     * Search category service.
     */

    public function search(Request $request)
    {
        $search = $request->input('search');
        $fields = ['name'];

        $category_service = search(CategoryService::class, $search, $fields)
            ->latest()
            ->paginate(10)
            ->withQueryString();
        return view('admin.ServiceManagement.Category.index', compact('category_service'));
    }

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


        return view('admin.ServiceManagement.Category.edit', compact('one_category_service'));
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

            return response()->json(['success' => 'Cập nhật thành công']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Cập nhật thất bại'], 500);
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
                return response()->json(['success' => 'Xóa thành công']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Xóa thất bại'], 500);
        }
    }
}