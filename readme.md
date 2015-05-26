## External Services
You can now integrate your shipping and payment services into our worldwide e-commerce platform.

### How to get started
We have multiple tutorials ready for you to dive into and create your own integration. [Create a shipping integration](http://developers.webshopapp.net/api/tutorials/create-a-shipping-integration) or [Create a payment service integration](http://developers.webshopapp.net/api/tutorials/create-a-payment-service-integration).

### Online preview
We have a demo webshop with a sample external service integration. Buy a product and choose for "1 hour delivery" and "SEOcoin" in te checkout to see how the external service flow would go. [Open the demo webshop](http://hidde.webshopapp.net/)

### More information
We have much more information about the integration and the technical details to get you started.
[See more info right here](https://apps.prototypje.com)

### How to install this sample app
This sample app has been created on top of Laravel 5. Therefore the setup is exactly the same as installing a Laravel 5 application.

```
git clone git@github.com:Vugario/External-Services.git
cd External-Services
cp .env.example .env
```

Lets run [composer](https://getcomposer.org/) to fetch our dependencies. Also give the storage directory write permissions.

```
composer install
chmod -R 0777 storage/
```

Now that we have the code lets configure the app. Open up the .env file and edit your database settings. Run the following commands to populate your db

```
php artisan migrate
php artisan db:seed
```

The seeding process will create a shipping method and some payment methods. These will demonstrate the basic use of these methods.

Now your ready!

GET `http://localhost/External-Services/public/shipment_methods` should return a list of shipment methods and `http://localhost/External-Services/public/payment_methods` will give you payment methods.
