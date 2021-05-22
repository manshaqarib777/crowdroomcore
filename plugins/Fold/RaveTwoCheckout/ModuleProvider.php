<?php
namespace Plugins\PaymentTwoCheckout;

use Modules\ModuleServiceProvider;
use Plugins\PaymentTwoCheckout\Gateway\TwoCheckoutGateway;

class ModuleProvider extends ModuleServiceProvider
{
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getPaymentGateway()
    {
        return [
            'two_checkout_gateway' => TwoCheckoutGateway::class
        ];
    }

    public static function getPluginInfo()
    {
        return [
            'title'   => __('Flutterwave'),
            'desc'    => __('Flutterwave is the easiest way to make and accept payments from customers anywhere in the world.'),
            'author'  => "Flutterwave Developers",
            'version' => "1.0.1",
        ];
    }
}
