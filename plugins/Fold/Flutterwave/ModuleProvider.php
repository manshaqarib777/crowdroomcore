<?php
namespace Plugins\Flutterwave;

use Modules\ModuleServiceProvider;
use Plugins\Flutterwave\Gateway\RaveGateway;

class ModuleProvider extends ModuleServiceProvider
{
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getPaymentGateway()
    {
        return [
            'rave_gateway' => RaveGateway::class
        ];
    }

    public static function getPluginInfo()
    {
        return [
            'title'   => __('Gateway RaveCheckout'),
            'desc'    => __('Flutterwave is one of the best payment Gateway to accept online payments from buyers around the world which allow your customers to make purchases in many payment methods, 15 languages, 87 currencies, and more than 200 markets in the world.'),
            'author'  => "Flutterwave",
            'version' => "1.0.0",
        ];
    }
}
