<?php
namespace Plugins\LazyPayerCheckout;

use Modules\ModuleServiceProvider;
use Plugins\LazyPayerCheckout\Gateway\LazyPayerGateway;

class ModuleProvider extends ModuleServiceProvider
{
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getPaymentGateway()
    {
        return [
            'lazypayer_gateway' => LazyPayerGateway::class
        ];
    }

    public static function getPluginInfo()
    {
        return [
            'title' => __('Gateway LazyPayer'),
            'desc' => __('Gateway LazyPayer is one of the best payment Gateway.'),
            'author' => "Booking Core",
            'version' => "1.0.0",
        ];
    }
}
