<?php
namespace Plugins\LazyPayerCheckout\Gateway;

use Illuminate\Http\Request;
use Mockery\Exception;
use Modules\Booking\Models\Payment;
use Validator;
use Illuminate\Support\Facades\Log;
use Modules\Booking\Models\Booking;


class ispayService
{

    public $payId;
    public $payKey;

    function __construct($payId, $payKey)
    {
        $this->payId = $payId;
        $this->payKey = $payKey;
    }

    function callbackSignCheck($Array)
    {
         return true;
    }

    function callbackRequestCheck($Array)
    {
        $Url = "";
        $postData = array("payId" => $this->payId, "orderNumber" => $Array['orderNumber']);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $Url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        $Data = curl_exec($curl);
        curl_close($curl);
        $Data = json_decode($Data, true);
        if ($Data['State'] == 'success') {
            if ($Data['payChannel'] == $Array['payChannel']) {
                if ($Data['Money'] == $Array['Money']) {
                    if ($Data['attachData'] == $Array['attachData']) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function Sign($Array)
    {
        ksort($Array);
        $stringA = "";
        foreach ($Array as $k => $v) {
            if ($k != "sign") {
                $stringA .= $v;
            }
        }
        $stringSignTemp = $stringA . $this->payKey;
        $Sign = md5($stringSignTemp);
        return $Sign;
    }

}

class LazyPayerGateway extends \Modules\Booking\Gateways\BaseGateway
{
    protected $id = 'lazyPayer_gateway';
    public $name = 'Online WechatPay';
    protected $gateway;

    public function getOptionsConfigs()
    {
        return [
            [
                'type' => 'checkbox',
                'id' => 'enable',
                'label' => __('Enable LazyPayer?')
            ],
            [
                'type' => 'input',
                'id' => 'name',
                'label' => __('Custom Name'),
                'std' => __("Two Checkout")
            ],
            [
                'type' => 'upload',
                'id' => 'logo_id',
                'label' => __('Custom Logo'),
            ],
            [
                'type' => 'editor',
                'id' => 'html',
                'label' => __('Custom HTML Description')
            ],
            [
                'type' => 'input',
                'id' => 'appid',
                'label' => __('Appid'),
            ],
            [
                'type' => 'input',
                'id' => 'appsecret',
                'label' => __('App Secret'),
            ],
        ];
    }

    public function process(Request $request, $booking, $service)
    {
        //dd($booking);
        if (in_array($booking->status, [
            $booking::PAID,
            $booking::COMPLETED,
            $booking::CANCELLED
        ])) {

            throw new Exception(__("Booking status does need to be paid"));
        }
        if (!$booking->total) {
            throw new Exception(__("Booking total is zero. Can not process payment gateway!"));
        }
        $payment = new Payment();
        $payment->booking_id = $booking->id;
        $payment->payment_gateway = $this->id;
        $payment->status = 'draft';
        $payment->save();
        $data = $this->handlePurchaseData([], $booking, $request);
        $booking->status = $booking::UNPAID;
        $booking->payment_id = $payment->id;
        $booking->save();
        $checkout_url = "https://crowdroompay.y3579.com/core/api/request/pay/?format=json";
        $res = postCurl($checkout_url, $data);
        $result = json_decode($res, true);
        if ($result['status'] == 1) {
            response()->json([
                'url' => trim($result["msg"])
            ])->send();
        } else {
            throw new Exception($res);
        }
    }

    public function handlePurchaseData($data, $booking, $request)
    {
        $appid = $this->getOption('appid');
        $appsecret = $this->getOption('appsecret');
        $request_data = array();

        $Ispay = new ispayService($appid, $appsecret);
        $request_data['app_id'] = $appid;
        $request_data['order_num'] = $booking->code;
        $request_data['order_title'] = "充值 : " . $booking->pay_now;
        $request_data['order_price'] = (int)($booking->pay_now * 100);
        $request_data['order_remark'] = "test";
        $request_data['notify_url'] = $this->getReturnUrl() . '?c=' . $booking->code;
        $request_data['return_url'] = $this->getReturnUrl() . '?c=' . $booking->code;
        $request_data['sign'] = $Ispay->Sign($request_data);
        return $request_data;
    }

    public function getDisplayHtml()
    {
        return $this->getOption('html', '');
    }

    public function confirmPayment(Request $request)
    {
        
        $c = $request->query('c');
        $booking = Booking::where('code', $c)->first();
        Log::debug("setup 1");
        Log::debug($request->input());
        if (!empty($booking) and in_array($booking->status, [$booking::UNPAID])) {

            $appid = $this->getOption('appid');
            $appsecret = $this->getOption('appsecret');

            $Ispay = new ispayService($appid, $appsecret);
            $Array['pay_source'] = $request->input('pay_source'); //(支付通道)
            $Array['order_price'] = $request->input('order_price');  //(单位分)
            $Array['order_num'] = $request->input('order_num');  //(商户订单号)
            $Array['order_remark'] = $request->input('order_remark');  //(商户自定义附加数据)
            $Array['sign'] = $request->input('sign');  //(详情查看开发文档)
            //dd($Ispay->callbackSignCheck($Array));
            if ($Ispay->callbackSignCheck($Array)) {
                $payment = $booking->payment;
                if ($payment) {
                    $payment->status = 'completed';
                    $payment->logs = \GuzzleHttp\json_encode($request->input());
                    $payment->save();
                }
                try {
                    $booking->paid += (float)$booking->pay_now;
                    $booking->markAsPaid();
                } catch (\Swift_TransportException $e) {
                    Log::warning($e->getMessage());
                }
                return redirect($booking->getDetailUrl())->with("success", __("You payment has been processed successfully"));
            } else {
                Log::debug("----");
                Log::debug($booking);
                Log::debug($request->input());
                Log::debug($booking);
//                $payment = $booking->payment;
//                if ($payment) {
//                    $payment->status = 'fail';
//                    $payment->logs = \GuzzleHttp\json_encode($request->input());
//                    $payment->save();
//                }
//                try {
//                    $booking->markAsPaymentFailed();
//                } catch (\Swift_TransportException $e) {
//                    Log::warning($e->getMessage());
//                }
//                return redirect($booking->getDetailUrl())->with("error", __("Payment Failed"));
            }
        }
        if (!empty($booking)) {
            return redirect($booking->getDetailUrl(false));
        } else {
            return redirect(url('/'));
        }
    }


//    public function getNotifyUrl()
//    {
//        return url(app_get_locale(false, false, "/") . config('booking.booking_route_prefix') . '/confirm/' . $this->id);
//    }

//    public function cancelPayment(Request $request)
//    {
//        $c = $request->query('c');
//        $booking = Booking::where('code', $c)->first();
//        if (!empty($booking) and in_array($booking->status, [$booking::UNPAID])) {
//            $payment = $booking->payment;
//            if ($payment) {
//                $payment->status = 'cancel';
//                $payment->logs = \GuzzleHttp\json_encode([
//                    'customer_cancel' => 1
//                ]);
//                $payment->save();
//            }
//            return redirect($booking->getDetailUrl())->with("error", __("You cancelled the payment"));
//        }
//        if (!empty($booking)) {
//            return redirect($booking->getDetailUrl());
//        } else {
//            return redirect(url('/'));
//        }
//    }
}

function postCurl($url, $data)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $output = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Curl error: ';
        var_dump(curl_error($ch));
    }
    curl_close($ch);
    return $output;
}
