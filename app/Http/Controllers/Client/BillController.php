<?php

namespace App\Http\Controllers\Client;

use App\Models\Review;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Bill;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $id = auth('web')->user()->id;
            $list_bill = Bill::where('user_id', $id)->latest()->paginate(4);
            if ($request->ajax()) {
                return view('client.bill_history.list_bill', compact('list_bill'));
            }
            $reviews = Review::all();
            return view('client.bill_history.index', compact('list_bill', 'reviews'));
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function printBill($id)
    {
        $options = new Options();
        $options->set('defaultFont', 'Dejavu Sans');
        $dompdf = new Dompdf($options);
        $item = Bill::find($id);
        $pdf = PDF::loadView('client.bill_history.printBill', compact('item'));
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
