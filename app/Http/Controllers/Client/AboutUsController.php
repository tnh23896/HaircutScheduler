<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\CategoryService;
use App\Models\Service;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function list_employee()
    {

        $employees = Admin::all();
        $categoryService = CategoryService::select('id', 'name', 'image')->get();
        $listServices = [];
        foreach ($categoryService as $category) {
            $services = Service::select('name', 'price')
                ->where('category_services_id', $category->id)
                ->get();

            $listServices[] = [
                'category' => $category->name,
                'image' => $category->image,
                'services' => $services,
            ];
        }
        return view('client.about_us.about_us', compact('employees', 'categoryService', 'listServices'));
    }
}
