<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CategoryService;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        toastr()->error('An error has occurred please try again later.');

        $trendingStyle = Service::select('name', 'image')
            ->withCount('bill_details as service_count')
            ->orderByDesc('service_count')
            ->take(5)
            ->get();
        $latestBlog = Blog::latest()->first();

        $categoryService = CategoryService::latest()->paginate(4);

        return view('client.index', compact('trendingStyle', 'latestBlog', 'categoryService'));
    }
}
