<?php

namespace App\Http\Controllers\Admin\ServiceManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceManagement\Service\StoreRequest;
use App\Http\Requests\Admin\ServiceManagement\Service\UpdateRequest;
use App\Models\CategoryService;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(
        private Service $Servicemodel,
        private CategoryService $Categorymodel,
    )
    {
    }

    public function index()
    {
        $services = $this->Servicemodel->latest()->paginate(10);

        return view('admin.serviceManagement.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category_service = $this->Categorymodel::all();
        return view('admin.serviceManagement.service.create',compact('category_service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
//            dd($request->all());

            $newService = $this->Servicemodel::create($request->validated());

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $newService->image = upload_file('admin/Service', $request->file('image'));
                $newService->save();
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
    public function edit($id)
    {
        $one_service = $this->Servicemodel::find($id);
        $category_service = $this->Categorymodel::all();
        return view('admin.serviceManagement.service.edit', compact('one_service','category_service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {

            $category_service =  $this->Servicemodel::query()->findOrFail($id);

            $imgOld = $category_service->image;

            $category_service->fill($request->all());


            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $category_service->image = upload_file('admin/categoryService', $request->file('image'));
                delete_file($imgOld);
            }

            $category_service->save();

            return response()->json(['success' => 'Successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while creating the category'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $category_service =  $this->Servicemodel::findOrFail($id);
            $imgOld = $category_service->image;
            if ($category_service) {
                delete_file($imgOld);
                $category_service->delete();
                return response()->json(['success' => 'Successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the product'], 500);
        }
    }
}
