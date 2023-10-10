<?php

namespace App\Http\Controllers\Admin\BlogManagement;

use App\Http\Controllers\Controller;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\BlogManagement\Category\StoreRequest;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
		$list_blog_category = CategoryBlog::all();
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
		//
		$category_blog = new CategoryBlog();
		$category_blog->fill($request->all());
		$category_blog->save();
		return response()->json(['success' => 'category_blog created successfully']);
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
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
