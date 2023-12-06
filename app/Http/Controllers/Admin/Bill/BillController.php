<?php

namespace App\Http\Controllers\Admin\Bill;

use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bill::withTrashed()
            ->join('admins', 'bills.admin_id', '=', 'admins.id')
            ->select('bills.*', 'admins.username')
            ->latest()
            ->paginate(10);

        return view('admin.BillManagement.index', compact('data'));
    }

    public function search(Request $request)
    {
        try {
            $search = $request->input('search');
            $fields = ['name', 'phone'];
            $data = Bill::withTrashed()
                ->leftJoin('admins', 'bills.admin_id', '=', 'admins.id')
                ->select('bills.*', 'admins.username')
                ->where(function($query) use ($search) {
                    $query->where('bills.name', 'like', "%$search%")
                        ->orWhere('bills.phone', 'like', "%$search%");
                })
                ->latest()
                ->paginate(10);
            return view('admin.BillManagement.index', compact('data'));
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'Tìm kiếm thất bại'
            ], 500);
        }
    }

    public function searchByDateandTime(Request $request)
    {
        try {
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

            $query = Bill::latest()
            ->withTrashed()
            ->join('admins', 'bills.admin_id', '=', 'admins.id')
            ->select('bills.*', 'admins.username');

            if (!empty($day)) {
                $query->whereRaw('DATE(day) = ?', [$day]);
            }

            if (!empty($time)) {
                $query->whereRaw('TIME(time) LIKE ?', ["$time%"]);
            }

            $bookingsByDateAndTime = $query->paginate(10)->withQueryString();

            if (empty($bookingsByDateAndTime)) {
                return view('admin.BillManagement.index', ['data' => $bookingsByDateAndTime]);
            } else {
                $bookingsByDateAndTime->count() > 0;
                return view('admin.BillManagement.index', ['data' => $bookingsByDateAndTime]);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'Tìm kiếm thất bại'
            ], 500);
        }
    }

    public function printBill($id)
    {
        $options = new Options();
        $options->set('defaultFont', 'Dejavu Sans');



        $dompdf = new Dompdf($options);
        $item = Bill::find($id);
        $pdf = PDF::loadView('admin.BillManagement.modal', compact('item'));
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('bill.pdf');
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
