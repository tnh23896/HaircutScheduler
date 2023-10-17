<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function list_blog()
    {
        $listBlogs = Blog::latest()->paginate(4);

        return view('client.blog', compact('listBlogs'));
    }
}
