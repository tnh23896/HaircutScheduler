<?php

namespace App\Http\Controllers\Admin\Bill;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bill::latest()->paginate(5);
        return view('admin.BillManagement.index', compact('data'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $fields = ['name', 'phone'];
        $data = search(Bill::class, $search, $fields)
            ->latest()
            ->paginate(5)
            ->withQueryString();
        return view('admin.BillManagement.index', compact('data'));
    }

    public function searchByDateandTime(Request $request)
    {

        $day = $request->input('day');
        $time = $request->input('time');
        $ampm = $request->input('ampm'); // SA, CH, AM, PM

        $hour = $minute = null;

        if ($time) {
            list($hour, $minute) = explode(':', $time);
            $hour = (int)$hour;
            $minute = (int)$minute;
        }

        // Kiểm tra kiểu thời gian và điều chỉnh giờ dựa trên giá trị của $ampm
        if ($ampm === 'SA' && $hour >= 12) {
            $hour -= 12;
        } elseif ($ampm === 'CH' && $hour < 12) {
            $hour += 12;
        } elseif ($ampm === 'AM' && $hour == 12) {
            $hour = 0;
        } elseif ($ampm === 'PM' && $hour != 12) {
            $hour += 12;
        }

        if ($hour !== null && $minute !== null) {
            $time = sprintf('%02d:%02d', $hour, $minute);
        }

        $query = Bill::latest();

        if (!empty($day)) {
            $query->whereRaw('DATE(day) = ?', [$day]);
        }

        if (!empty($time)) {
            $query->whereRaw('TIME(time) LIKE ?', ["$time%"]);
        }

        $bookingsByDateAndTime = $query->paginate(5)->withQueryString();

        if ($bookingsByDateAndTime->isEmpty()) {
            return redirect()->route('admin.BillManagement.index');
        }

        return view('admin.BillManagement.index', ['data' => $bookingsByDateAndTime]);
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
