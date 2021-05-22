<?php
namespace Plugins\PaymentTwoCheckout\Gateway;

use Illuminate\Http\Request;
use Mockery\Exception;
use Modules\Booking\Models\Payment;
use Validator;
use Illuminate\Support\Facades\Log;
use Modules\Booking\Models\Booking;

class TwoCheckoutGateway extends \Modules\Booking\Gateways\BaseGateway
{
    protected $id   = 'Flutterwave';
    public    $name = 'Flutterwave Checkout';
    protected $gateway;

    public function getOptionsConfigs()
    {
        return [
            [
                'type'  => 'checkbox',
                'id'    => 'enable',
                'label' => __('Enable Flutterwave?')
            ],
            [
                'type'  => 'input',
                'id'    => 'name',
                'label' => __('Custom Name'),
                'std'   => __("Rave Checkout"),
                'multi_lang' => "1"
            ],
            [
                'type'  => 'upload',
                'id'    => 'logo_id',
                'label' => __('Custom Logo'),
            ],
            [
                'type'  => 'editor',
                'id'    => 'html',
                'label' => __('Custom HTML Description'),
                'multi_lang' => "1"
            ],
           [
                'type'       => 'input',
                'id'        => 'rave_secret_key',
                'label'     => __('Secret Key'),
            ],
            [
                'type'       => 'input',
                'id'        => 'rave_public_key',
                'label'     => __('Public Key'),
            ],
            [
                'type'       => 'checkbox',
                'id'        => 'rave_enable_sandbox',
                'label'     => __('Enable Sandbox Mode'),
            ],
            [
                'type'       => 'input',
                'id'        => 'rave_test_secret_key',
                'label'     => __('Test Secret Key'),
            ],
            [
                'type'       => 'input',
                'id'        => 'rave_test_public_key',
                'label'     => __('Test Public Key'),
            ]
            
        ];
    }

    public function process(Request $request, $booking, $service)
    {
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
        
        if ($this->getOption('rave_enable_sandbox')) {
            
            $pubKey = $this->getOption('rave_test_public_key');
            $secKey = $this->getOption('rave_test_secret_key');
        $client = new \GuzzleHttp\Client();
            $raveUrl = "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay";
            $raveresponse = $client->request('POST',$raveUrl, [
            'form_params' => [
                'txref' => $data['merchant_order_id'],
                'PBFPubKey' => $pubKey,
                'customer_email' => $data['email'],
                'amount' => $data['total'],
                'currency' => $data['currency_code'],
                'redirect_url' => $data['x_receipt_link_url']
                //'onclose'=> $this->onclose()
        ]
        ]);
    
        $response = json_decode($raveresponse->getBody(), true);
        
        
        
        $response = $request->send();
        } else {
            
            
            
            $pubKey = $this->getOption('rave_public_key');
            $secKey = $this->getOption('rave_secret_key');
            $payload = array('txref' => $data['merchant_order_id'],
            'PBFPubKey' => 'FLWPUBK-fe2e150d12829b5d59d1010c6dc5b4ce-X',
            'customer_email' => $data['email'],
            'amount' => $data['total'],
            'currency' => $data['currency_code'],
            'redirect_url' => $data['x_receipt_link_url']
            //'onclose'=> $this->onclose()
        );
            $client = new \GuzzleHttp\Client();
            $raveUrl = "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay";
            $raveresponse = $client->request('POST',$raveUrl, [
            'form_params' => [
                'txref' => $data['merchant_order_id'],
                'PBFPubKey' => $pubKey,
                'customer_email' => $data['email'],
                'currency' => $data['currency_code'],
                'amount' => $data['total'],
                'redirect_url' => $data['x_receipt_link_url']
                //'redirect_url' => $redirect_url,
                //'onclose'=> $this->onclose()
        ]
    
            
            ]);
        
        $response = json_decode($raveresponse->getBody(), true);
            
        }

        $flwlink =  $response['data']['link'];
  
        response()->json([
            'url' => $flwlink
        ])->send();
        
        
    }

    public function handlePurchaseData($data, $booking, $request)
    {
        $twocheckout_args = array();
        $twocheckout_args['sid'] = $this->getOption('twocheckout_account_number');
        $twocheckout_args['paypal_direct'] = 'Y';
        $twocheckout_args['cart_order_id'] = $booking->code;
        $twocheckout_args['merchant_order_id'] = $booking->code;
        $twocheckout_args['total'] = (float)$booking->pay_now;
        $twocheckout_args['return_url'] = $this->getCancelUrl() . '?c=' . $booking->code;
        $twocheckout_args['x_receipt_link_url'] = $this->getReturnUrl() . '?c=' . $booking->code;
        $twocheckout_args['currency_code'] = setting_item('currency_main');
        $twocheckout_args['card_holder_name'] = $request->input("first_name") . ' ' . $request->input("last_name");
        $twocheckout_args['street_address'] = $request->input("address_line_1");
        $twocheckout_args['street_address2'] = $request->input("address_line_1");
        $twocheckout_args['city'] = $request->input("city");
        $twocheckout_args['state'] = $request->input("state");
        $twocheckout_args['country'] = $request->input("country");
        $twocheckout_args['zip'] = $request->input("zip_code");
        $twocheckout_args['phone'] = "";
        $twocheckout_args['email'] = $request->input("email");
        $twocheckout_args['lang'] = app()->getLocale();
        
        

        return $twocheckout_args;
    }

    public function getDisplayHtml()
    {
        return $this->getOption('html', '');
    }

    public function confirmPayment(Request $request)
    {
        $c = $request->query('c');
        $booking = Booking::where('code', $c)->first();
        if (!empty($booking) and in_array($booking->status, [$booking::UNPAID])) {
            $compare_string = $this->getOption('twocheckout_secret_word') . $this->getOption('twocheckout_account_number') . $request->input("order_number") . $request->input("total");
            $compare_hash1 = strtoupper(md5($compare_string));
            $compare_hash2 = $request->input("key");
            if ($compare_hash1 != $compare_hash2) {
                $payment = $booking->payment;
                if ($payment) {
                    $payment->status = 'fail';
                    $payment->logs = \GuzzleHttp\json_encode($request->input());
                    $payment->save();
                }
                try {
                    $booking->markAsPaymentFailed();
                } catch (\Swift_TransportException $e) {
                    Log::warning($e->getMessage());
                }
                return redirect($booking->getDetailUrl())->with("error", __("Payment Failed"));
            } else {
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
            }
        }
        if (!empty($booking)) {
            return redirect($booking->getDetailUrl(false));
        } else {
            return redirect(url('/'));
        }
    }

    public function cancelPayment(Request $request)
    {
        $c = $request->query('c');
        $booking = Booking::where('code', $c)->first();
        if (!empty($booking) and in_array($booking->status, [$booking::UNPAID])) {
            $payment = $booking->payment;
            if ($payment) {
                $payment->status = 'cancel';
                $payment->logs = \GuzzleHttp\json_encode([
                    'customer_cancel' => 1
                ]);
                $payment->save();
            }
            return redirect($booking->getDetailUrl())->with("error", __("You cancelled the payment"));
        }
        if (!empty($booking)) {
            return redirect($booking->getDetailUrl());
        } else {
            return redirect(url('/'));
        }
    }
}
