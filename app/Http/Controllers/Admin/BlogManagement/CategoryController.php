<?php

namespace App\Http\Controllers\Admin\BlogManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogManagement\Category\UpdateRequest;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\BlogManagement\Category\StoreRequest;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function __construct(
		private CategoryBlog $model,
	) {
	}
	public function index()
	{
		$list_blog_category = $this->model->latest()->paginate(5);
		return view('admin.blogManagement.category.index', compact('list_blog_category'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//\
		return view('admin.blogManagement.category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreRequest $request)
	{
		try {
			$newCategory = $this->model::create($request->validated());
			$newCategory->save();
			return response()->json(['success' => 'Thêm danh mục tin tức thành công']);
		} catch (\Exception $e) {
			return response()->json(['error' => 'Thêm danh mục tin tức thất bại'], 500);
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
		//
		$one_category_blog = $this->model::find($id);

		return view('admin.blogManagement.category.edit', compact('one_category_blog'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateRequest $request, string $id)
	{
		//
		try {
			$category_service = $this->model::query()->findOrFail($id);

			$category_service->fill($request->all());

			$category_service->save();

			return response()->json(['success' => 'Cập nhật danh mục tin tức']);
		} catch (\Exception $e) {
			return response()->json(['error' => 'Cập nhật danh mục tin tức thất bại'], 500);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
		try {
			$category_service = $this->model::findOrFail($id);
			if ($category_service) {
				$category_service->delete();
				return response()->json(['success' => 'Xóa danh mục tin tức thành công']);
			}
		} catch (\Exception $e) {
			return response()->json(['error' => 'Xóa danh mục tin tức thất bại'], 500);
		}
	}
}
