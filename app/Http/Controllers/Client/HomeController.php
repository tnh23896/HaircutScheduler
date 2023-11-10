<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Banner;
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
        // dd($activeBanners);
        $trendingStyle = Service::select('name', 'image')
            ->withCount('bill_details as service_count')
            ->orderByDesc('service_count')
            ->take(6)
            ->get();

        $latestBlogs = Blog::select('id','title','image','description','created_at')->latest()->take(2)->get();

        $categoryService= CategoryService::select('id', 'name','image')->get();

        $listServices = [];

        foreach ($categoryService as $category) {
            $services = Service::select('name','price')
                ->where('category_services_id', $category->id)
                ->get();

            $listServices[] = [
                'category' => $category->name,
                'image' => $category->image,
                'services' => $services,
            ];
        }

        $personnels = Admin::take(6)->get();

        return view('client.index', compact(
            'trendingStyle',
            'latestBlogs',
            'categoryService',
            'personnels',
            'listServices',
        ));
    }
}
