<?php

namespace Plugins\Flutterwave\Gateway;

require_once('lib/rave.php');
require_once('lib/raveEventHandlerInterface.php');

use Flutterwave\Rave;
use Flutterwave\EventHandlerInterface;
use Illuminate\Http\Request;
use Mockery\Exception;
use Modules\Booking\Models\Payment;
use Validator;
use Illuminate\Support\Facades\Log;
use Modules\Booking\Models\Booking;

$URL = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$getData = $_GET;
$postData = $_POST;
$publicKey = env('PUBLIC_KEY');
$secretKey = env('SECRET_KEY');
$success_url = route('success');
$failure_url = route('failed');
//$env = $postData['env']; // Remember to change this to 'live' when you are going live

if($postData['amount']){
    $_SESSION['publicKey'] = $publicKey;
    $_SESSION['secretKey'] = $secretKey;
    //$_SESSION['env'] = $env;
    $_SESSION['successurl'] = $success_url;
    $_SESSION['failureurl'] = $failure_url;
    $_SESSION['currency'] = $postData['currency'];
    $_SESSION['amount'] = $postData['amount'];
}

$prefix = 'RV'; // Change this to the name of your business or app
$overrideRef = false;

// Uncomment here to enforce the useage of your own ref else a ref will be generated for you automatically
if($postData['ref']){
    $prefix = $postData['ref'];
    $overrideRef = true;
}

$ravePayment = new Rave($_SESSION['publicKey'], $_SESSION['secretKey'], $prefix, $overrideRef);

function getURL($url,$data = array()){
    $urlArr = explode('?',$url);
    $params = array_merge($_GET, $data);
    $new_query_string = http_build_query($params).'&'.$urlArr[1];
    $newUrl = $urlArr[0].'?'.$new_query_string;
    return $newUrl;
};


// This is where you set how you want to handle the transaction at different stages
class myEventHandler implements EventHandlerInterface{
    /**
     * This is called when the Rave class is initialized
     * */
    function onInit($initializationData){
        // Save the transaction to your DB.
    }
    
    /**
     * This is called only when a transaction is successful
     * */
    function onSuccessful($transactionData){
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Comfirm that the transaction is successful
        // Confirm that the chargecode is 00 or 0
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (includeing parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here
        if($transactionData->chargecode === '00' || $transactionData->chargecode === '0'){
          if($transactionData->currency == $_SESSION['currency'] && $transactionData->amount == $_SESSION['amount']){
              
              if($_SESSION['publicKey']){
                    header('Location: '.getURL($_SESSION['successurl'], array('event' => 'successful')));
                    $_SESSION = array();
                    session_destroy();
                }
          }else{
              if($_SESSION['publicKey']){
                    header('Location: '.getURL($_SESSION['failureurl'], array('event' => 'suspicious')));
                    $_SESSION = array();
                    session_destroy();
                }
          }
      }else{
          $this->onFailure($transactionData);
      }
    }
    
    /**
     * This is called only when a transaction failed
     * */
    function onFailure($transactionData){
        // Get the transaction from your DB using the transaction reference (txref)
        // Update the db transaction record (includeing parameters that didn't exist before the transaction is completed. for audit purpose)
        // You can also redirect to your failure page from here
        if($_SESSION['publicKey']){
            header('Location: '.getURL($_SESSION['failureurl'], array('event' => 'failed')));
            $_SESSION = array();
            session_destroy();
        }
    }
    
    /**
     * This is called when a transaction is requeryed from the payment gateway
     * */
    function onRequery($transactionReference){
        // Do something, anything!
    }
    
    /**
     * This is called a transaction requery returns with an error
     * */
    function onRequeryError($requeryResponse){
        // Do something, anything!
    }
    
    /**
     * This is called when a transaction is canceled by the user
     * */
    function onCancel($transactionReference){
        // Do something, anything!
        // Note: Somethings a payment can be successful, before a user clicks the cancel button so proceed with caution
        if($_SESSION['publicKey']){
            header('Location: '.getURL($_SESSION['failureurl'], array('event' => 'canceled')));
            $_SESSION = array();
            session_destroy();
        }
    }
    
    /**
     * This is called when a transaction doesn't return with a success or a failure response. This can be a timedout transaction on the Rave server or an abandoned transaction by the customer.
     * */
    function onTimeout($transactionReference, $data){
        // Get the transaction from your DB using the transaction reference (txref)
        // Queue it for requery. Preferably using a queue system. The requery should be about 15 minutes after.
        // Ask the customer to contact your support and you should escalate this issue to the flutterwave support team. Send this as an email and as a notification on the page. just incase the page timesout or disconnects
        if($_SESSION['publicKey']){
            header('Location: '.getURL($_SESSION['failureurl'], array('event' => 'timedout')));
            $_SESSION = array();
            session_destroy();
        }
    }
}



class RaveGateway extends \Modules\Booking\Gateways\BaseGateway
{
    protected $id   = 'flutterwave_gateway';
    public    $name = 'Flutterwave Checkout';
    protected $gateway;

    public function getOptionsConfigs()
    {
        return [
            [
                'type'  => 'checkbox',
                'id'    => 'enable',
                'label' => __('Enable Flutterwave checkout?')
            ],
            [
                'type'  => 'input',
                'id'    => 'saved_cards',
                'label' => __('Enable Payment via Saved Cards'),
            ],
            [
                'type'  => 'upload',
                'id'    => 'logo_id',
                'label' => __('Custom Logo'),
            ],
            [
                'type'  => 'input',
                'id'    => 'rave_public_key',
                'label' => __('Rave Public Key'),
            ],
            [
                'type'  => 'input',
                'id'    => 'rave_secret_key',
                'label' => __('Rave Secret Key'),
            ],
            [
                'type'  => 'checkbox',
                'id'    => 'flutterwave_enable_sandbox',
                'label' => __('Enable Sandbox Mode'),
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
        if ($this->getOption('flutterwave_enable_sandbox')) {

            $ravePayment->baseUrl = 'https://api.ravepay.co';
            
        } else {
            $ravePayment->baseUrl = 'https://api.ravepay.co';
        }

        $ravePayment
        ->eventHandler(new myEventHandler)
        ->setAmount($data['amount'])
        ->setPaymentOptions($data['payment_options']) // value can be card, account or both
        ->setDescription('Book Now For space etc...')
        ->setLogo($this->getOption('logo_id'))
        ->setTitle($data['title'])
        ->setCountry($data['country'])
        ->setCurrency($data['currency'])
        ->setEmail($data['email'])
        ->setFirstname($data['firstname'])
        ->setLastname($data['lastname'])
        ->setPhoneNumber($data['phone'])
        ->setPayButtonText('pay Now')
        ->setRedirectUrl($data['redirect_url'])
        //->setMetaData(array('metaname' => 'SomeDataName', 'metavalue' => 'SomeValue')) // can be called multiple times. Uncomment this to add meta datas
        // ->setMetaData(array('metaname' => 'SomeOtherDataName', 'metavalue' => 'SomeOtherValue')) // can be called multiple times. Uncomment this to add meta datas
        ->initialize();
        
    }

    public function handlePurchaseData($data, $booking, $request)
    {
        $twocheckout_args = array();
        $twocheckout_args['PBFPubKey'] = $this->getOption('rave_public_key');
        $twocheckout_args['txref'] = $booking->code;
        $twocheckout_args['merchant_order_id'] = $booking->code;
        $twocheckout_args['amount'] = (float)$booking->pay_now;
        $twocheckout_args['redirect_url'] = $this->getCancelUrl() . '?c=' . $booking->code;
        $twocheckout_args['x_receipt_link_url'] = $this->getReturnUrl() . '?c=' . $booking->code;
        $twocheckout_args['currency'] = setting_item('currency_main');
        $twocheckout_args['fullname'] = $request->input("first_name") . ' ' . $request->input("last_name");
        $twocheckout_args['customer_firstname'] = $request->input("first_name");
        $twocheckout_args['customer_lastname'] = $request->input("last_name");
        $twocheckout_args['street_address'] = $request->input("address_line_1");
        $twocheckout_args['street_address2'] = $request->input("address_line_1");
        $twocheckout_args['city'] = $request->input("city");
        $twocheckout_args['state'] = $request->input("state");
        $twocheckout_args['country'] = $request->input("country");
        $twocheckout_args['zip'] = $request->input("zip_code");
        $twocheckout_args['customer_phone'] = $request->input("phone");
        $twocheckout_args['customer_email'] = $request->input("email");
        $twocheckout_args['lang'] = app()->getLocale();
        return $twocheckout_args;
    }

    public function getDisplayHtml()
    {
        return $this->getOption('html', '');
    }

    public function confirmPayment(Request $request)
    {

        $ravePayment
        ->eventHandler(new myEventHandler)
        ->requeryTransaction($request->query('txref'));

        $c = $request->query('c');
        $booking = Booking::where('code', $c)->first();
        if (!empty($booking) and in_array($booking->status, [$booking::UNPAID])) {
            $compare_string = $this->getOption('rave_secret_key') . $this->getOption('rave_public_key') . $request->input("order_number") . $request->input("total");
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

        $ravePayment
        ->eventHandler(new myEventHandler)
        ->requeryTransaction($request->query('txref'))
        ->paymentCanceled($request->query('txref'));

        $c = $request->query('status');
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
