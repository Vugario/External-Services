<?php namespace App\libraries;

use Illuminate\Support\Facades\Auth;

class Webshop extends \WebshopappApiClient
{
    protected static $instance;

    public function __construct()
    {
        $config = config('services.seoshop');

        return parent::__construct($config['env'], $config['key'], md5(Auth::user()->token . $config['secret']), Auth::user()->language);
    }

    public static function instance()
    {
        if (self::$instance)
        {
            return self::$instance;
        }

        return self::$instance = new self();
    }

    /**
     * This method will fetch the current external services
     * If these do not exist yet it will create them
     */
    public function installExternalServices()
    {
        $currentServices = Webshop::instance()->external_services->get();

        $hasShipmentService = false;
        $hasPaymentService  = false;

        foreach ($currentServices as $currentService)
        {
            if ($currentService['type'] == 'shipment')
            {
                $hasShipmentService = true;
            }

            if ($currentService['type'] == 'payment')
            {
                $hasPaymentService = true;
            }
        }

        if ($hasShipmentService === false)
        {
            Webshop::instance()->external_services->create([
                'type'          => 'shipment',
                'name'          => 'My Awesome Shipping Service',
                'urlEndpoint'   => url('/', [], true),
                'rateEstimate'  => true,
                'isActive'      => true
            ]);
        }

        if ($hasPaymentService === false)
        {
            Webshop::instance()->external_services->create([
                'type'          => 'payment',
                'name'          => 'My Awesome Payment Service',
                'urlEndpoint'   => url('/', [], true),
                'isActive'      => true
            ]);
        }
    }
}
