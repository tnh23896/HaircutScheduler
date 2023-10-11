<?php

namespace App\Http\Controllers\Admin\BlogManagement;

use App\Models\Blog;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Cache\Store;
use App\Http\Requests\Admin\BlogManagement\Blog\StoreRequest;

class BlogController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function __construct(
		private Blog $blogmodel,
		private CategoryBlog $Categorymodel,
	) {
	}

	public function index()
	{
		//
		$blogs = $this->blogmodel->latest()->paginate(10);
		return view('admin.blogManagement.blog.index', compact('blogs'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
		$category_blog = $this->Categorymodel::all();
		return view('admin.blogManagement.blog.create', compact('category_blog'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreRequest $request)
	{
		try {
			$newblog = $this->blogmodel::create($request->validated());
			if ($request->hasFile('image') && $request->file('image')->isValid()) {
				$newblog->image = upload_file('admin/blog', $request->file('image'));
				$newblog->save();
			}
			return response()->json(['success' => 'Successfully']);
		} catch (\Exception $e) {
			// Xử lý lỗi và thông báo cho người dùng
			return response()->json(['error' => 'An error occurred while creating the category'], 500);
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
		$one_blog = $this->blogmodel::find($id);
		$category_blog = $this->Categorymodel::all();
		return view('admin.blogManagement.blog.edit', compact('one_blog', 'category_blog'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
		try {

			$category_blog =  $this->blogmodel::query()->findOrFail($id);
			$imgOld = $category_blog->image;
			$category_blog->fill($request->all());

			if ($request->hasFile('image') && $request->file('image')->isValid()) {
				$category_blog->image = upload_file('admin/categoryblog', $request->file('image'));
				delete_file($imgOld);
			}

			$category_blog->save();

			return response()->json(['success' => 'Successfully']);
		} catch (\Exception $e) {
			return response()->json(['error' => 'An error occurred while creating the category'], 500);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
		try {
			$category_blog =  $this->blogmodel::findOrFail($id);
			$imgOld = $category_blog->image;
			if ($category_blog) {
				delete_file($imgOld);
				$category_blog->delete();
				return response()->json(['success' => 'Successfully']);
			}
		} catch (\Exception $e) {
			return response()->json(['error' => 'An error occurred while deleting the product'], 500);
		}
	}
}
