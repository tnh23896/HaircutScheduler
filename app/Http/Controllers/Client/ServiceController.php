<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CategoryService;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function list_service()
    {
        $categoryService= CategoryService::select('id', 'name','image')->get();

        $listServices = [];

        foreach ($categoryService as $category) {
            $services = Service::select('name','price')
                ->where('category_services_id', $category->id)
                ->get();

            $listServices[] = [
                'category' => $category->name,
                'services' => $services,
            ];
        }
        return view('client.service', compact('categoryService','listServices'));
    }
}
