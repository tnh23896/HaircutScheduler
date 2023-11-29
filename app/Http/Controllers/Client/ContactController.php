<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Jobs\SendContactEmail;
use App\Mail\ContactMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Admin::all();
        return view('client.contact.index', compact('employees'));
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
            'phone' => 'regex:/^[0-9]{10}$/'
        ]);

        $email = $request->input('email');
        $message = $request->input('message');
        $phone = $request->input('phone');

        $ip = $request->ip();
        $limit = 5; // Số lần giới hạn
        $timeFrame = 60; // Khoảng thời gian (số giây)
        $key = 'email_send_limit_' . $ip;

        $sendCount = Session::get($key, 0);

        if ($sendCount >= $limit) {
            return response()->json(['error' => 'Exceeded email sending limit.'], 429);
        }
        SendContactEmail::dispatch($email, $message, $phone);
        Session::put($key, $sendCount + 1);
        Session::put($key . '_expires', time() + $timeFrame);

        return response()->json(['success' => true]);
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
