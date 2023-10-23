<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Profile\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $id = auth()->user()->id;
        $data = User::where('id', $id)->first();
        return view('client.profile.index',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            $data = User::findOrFail($id);
            $params = $request->validated();
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $file = $request->file('avatar');
                $avatarName = upload_file('client/avatar', $file);
                $params['avatar'] = $avatarName;
                delete_file($data->avatar);
            }
            $data->update($params);
            return response()->json([
                "success" => "Created successfully ",
                "status" => 200
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => 'Cập nhật thất bại'
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
