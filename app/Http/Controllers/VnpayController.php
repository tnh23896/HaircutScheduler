<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;


class VnpayController extends Controller
{
    private mixed $vnp_TmnCode;
    private mixed $vnp_HashSecret;
    private mixed $vnp_Url;
    private mixed $vnp_Returnurl;
    private string $vnp_OrderInfo;
    private string $vnp_OrderType;
    private string $vnp_Locale;
    private string $vnp_BankCode;
    private mixed $vnp_IpAddr;
    private string $vnp_Bill_State;
    public function __construct()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->vnp_TmnCode    = "AUOGLFUH";
        $this->vnp_HashSecret = "GVTYEMYJEHIQHBAUVYJAPQSDYIIKZEIK";
        $this->vnp_Url        = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $this->vnp_Returnurl  = route('vnpay.callback');
        $this->vnp_OrderInfo  = 'Thanh toán hóa đơn';
        $this->vnp_OrderType  = 'billpayment';
        $this->vnp_Locale     = 'vn';
        $this->vnp_BankCode   = '';
        $this->vnp_Bill_State   = '';
        $this->vnp_IpAddr     = $_SERVER['REMOTE_ADDR'];
    }
    public function process(Request $request)
    {
        $order_code = $request->order_code;
        $amount = $request->amount;
        $inputData = array(
            "vnp_Version"       => "2.1.0",
            "vnp_TmnCode"       => $this->vnp_TmnCode,
            "vnp_Amount"        => (integer)$amount * 100,
            "vnp_Command"       => "pay",
            "vnp_CreateDate"    => date('YmdHis'),
            "vnp_CurrCode"      => "VND",
            "vnp_IpAddr"        => $this->vnp_IpAddr,
            "vnp_Locale"        => $this->vnp_Locale,
            "vnp_OrderInfo"     => $this->vnp_OrderInfo,
            "vnp_OrderType"     => $this->vnp_OrderType,
            "vnp_ReturnUrl"     => $this->vnp_Returnurl,
            "vnp_TxnRef"        => $order_code,
        );
        if (isset($this->vnp_BankCode) && $this->vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $this->vnp_BankCode;
        }
        if (isset($this->vnp_Bill_State) && $this->vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $this->vnp_Bill_State;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $vnp_Url = $this->vnp_Url . "?" . $query;
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $this->vnp_HashSecret);
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        return redirect($vnp_Url);
    }
    public function callback(Request $request)
    {
        $vnp_SecureHash = $request->vnp_SecureHash;
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        $secureHash = hash_hmac('sha512', $hashData, $this->vnp_HashSecret);
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                // Booking::where('id', $_GET['vnp_TxnRef'])->update([
                //     // 'status' => 'pending',
                // ]);
                session()->flash('success', 'Payment successful!');
                return redirect()->route('home.index');
            }
            else {
                Booking::where('id', $_GET['vnp_TxnRef'])->update([
                    'status'     => 'canceled',
                ]);
                session()->flash('error', 'Deo duoc');
            return redirect()->route('home.index');
                // thanh toán thất bại
            }
        } else {
            Booking::where('id', $_GET['vnp_TxnRef'])->update([
                'status' => 'canceled',
            ]);
            // lỗi thanh toán
                session()->flash('error', 'Deo duoc');

            return redirect()->route('home.index');
        }
        // return route nào đấy
    }
}
