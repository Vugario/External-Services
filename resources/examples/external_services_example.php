$api = new WebshopappApiClient(...);

$api->external_services->create([
    'type'          => 'shipment',
    'name'          => 'SEOshop Shipments',
    'urlEndpoint'   => 'https://api.yourdomain.com/',
    'rateEstimate'  => true,
    'isActive'      => true
]);