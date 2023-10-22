<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	public function list_blog()
	{
		$listBlogs = Blog::latest()->paginate(5);

		return view('client.blog.blog', compact('listBlogs'));
	}

	public function detail_blog($id)
	{
		$blog = Blog::find($id);
		$listBlogs = Blog::where('category_blog_id', $blog->category_blog_id)->latest()->paginate(2);
		return view('client.blog.blog_detail', compact('blog', 'listBlogs'));
	}

	public function list_blog_category($id)
	{
		$listBlogs = Blog::where('category_blog_id', $id)->latest()->paginate(5);
		return view('client.blog.blog', compact('listBlogs'));
	}
}
