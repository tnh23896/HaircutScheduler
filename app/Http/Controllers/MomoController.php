<?php

namespace App\Http\Controllers;

use App\Jobs\BookedMail;
use App\Models\Booking;
use App\Models\Time;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MomoController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momo_payment(Request $request)
    {
        $order_code = $request->order_code;
        $total_price = $request->total_price;
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $total_price;
        $orderId = time() . "";
        $redirectUrl = route('momo.callback');
        $ipnUrl = route('momo.callback');
        $extraData = $order_code;
        $requestId = time() . "";
        $requestType = "payWithATM";
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        return redirect()->to($jsonResult['payUrl']);
    }
    public function momo_callback(Request $request)
    {
        $id = $request->extraData;
        if ($request->message == 'Transaction denied by user.') {
            Booking::where('id', $id)->update([
                'status' => 'canceled',
                'amount_paid' => 0,
            ]);
            $bookingOld = Booking::query()->findOrFail($id);
            if ($bookingOld->status == "canceled") {
                $timeSelected = Time::where('time', $bookingOld->time)->first();
                $workScheduleSelected = WorkSchedule::query()->where('admin_id', $bookingOld->admin_id)->where('day', $bookingOld->day)->first();
                $findWorkScheduleDetailSelected = DB::table('work_schedule_details')
                    ->where('work_schedule_details.time_id', $timeSelected->id)
                    ->where('work_schedule_details.work_schedules_id', $workScheduleSelected->id)->update(['status' => 'available']);
            }
            return redirect()->route('booking_history');
        } else {
            $booking = Booking::where('id', $id)->update([
                'status' => 'confirmed',
                'amount_paid' => $request->amount,
            ]);
            dispatch(new BookedMail($booking));
            return redirect()->route('booking_history');
        }
    }
}
