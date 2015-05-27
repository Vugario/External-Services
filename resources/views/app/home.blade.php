@extends('app')

@section('content')

<div class="intro">
    <p>Connect your shipping or payment service with the SEOshop platform.</p>
    <a href="http://developers.webshopapp.net/api/tutorials/create-a-shipping-integration" target="_blank" class="btn btn-lg btn-default">Shipping service</a>
    <a href="http://developers.webshopapp.net/api/tutorials/create-a-payment-service-integration" target="_blank" class="btn btn-lg btn-default">Payment service</a>

    <a class="muted" href="#give-it-a-spin">Give it a spin</a>
</div>

<hr style="margin-top: 0;" />

<div class="section clearfix">
    <h1 id="how-we-fetch-shipment-methods">How to get started</h1>
    <div class="code visible-lg visible-md">
        <div class="header clearfix">
            <span class="request">POST /external_services.json</span>
        </div>

        <h2>Your payload</h2>
        <div class="payload">
            <pre><code class="json">{{ App\Helpers\Code::payload('external_services') }}</code></pre>
        </div>

        <h2>PHP sample</h2>
        <div class="payload">
            <pre><code class="php">{{ App\Helpers\Code::example('external_services') }}</code></pre>
        </div>
    </div>

    <p>
        We will call your endpoint during the checkout process. First you'll have to send us your endpoint information. Do this by calling our <code>/external_services.json</code> endpoint.
    </p>

    <p>A external service can either be a shipment or a payment service. If you'd like to offer both simply create two external services, each with a different type. The endpoint must be accessible over HTTPS. The <code>rateEstimate</code> field is only applicable for shipment services. <a href="#how-we-fetch-shipment-methods">Read more about that here</a>.</p>

    <p>Please note that a external service is unique per shop. So for every shop that wants to use your service you'll have to create a new external service.</p>

    <p>Our PHP client supports the external service resource and makes it super easy to use. <a href="http://developers.webshopapp.net/api/libraries/php-client" target="_blank">Learn more about the PHP client</a>.</p>

    <p><a href="http://developers.webshopapp.net/api/tutorials/create-a-shipping-integration" target="_blank">A more detailed tutorial is available right here</a>.</p>
</div>

<hr />

<div class="section clearfix">
    <h1 id="how-we-fetch-shipment-methods">How we fetch shipment methods</h1>
    <div class="code visible-lg visible-md">
        <div class="header clearfix">
            <a href="{{ url('shipment_methods') }}" target="_blank" class="preview pull-right">Live example</a>
            <span class="request">POST /shipment_methods</span>
        </div>

        <h2>Our payload</h2>
        <div class="payload">
            <pre><code class="json">{{ App\Helpers\Code::payload('shipment_methods') }}</code></pre>
        </div>

        <h2>Your response</h2>
        <div class="response">
            <pre><code class="json">{{ App\Helpers\Code::response('shipment_methods') }}</code></pre>
        </div>
    </div>

    <p>
        When a customer enters the checkout, we'll send a POST request to your endpoint to fetch the shipment methods. The payload contains all relevant information regarding the current checkout including customer and product data.
    </p>

    <p>Now you'll respond with a valid json document that contains a field <code>shipment_methods</code>. This field is an array with all available shipment methods.</p>

    <p>There are two types of payloads, depending on the <code>rate_estimate</code> field. When this field states true, we do not have much customer information yet and are simply asking for a fare estimate of the shipping methods. This request is performed in the shopping cart. When the field states false, we will send you much more information.</p>

    <p><a href="http://developers.webshopapp.net/api/tutorials/create-a-shipping-integration#rate-estimate-call" target="_blank">Read more on the rate estimate call</a>.</p>

    <p>Unlike with the payment service integration, we will not send you a call when one of your shipment methods has been chosen. Instead you can hook into the order creation event (See <a href="http://developers.webshopapp.net/api/tutorials/webhooks" target="_blank">webhooks</a>) to see if your service has been chosen.</p>
</div>

<hr />

<div class="section clearfix">
    <h1 id="how-we-fetch-payment-methods">How we fetch payment methods</h1>
    <div class="code visible-lg visible-md">
        <div class="header clearfix">
            <a href="{{ url('payment_methods') }}" target="_blank" class="preview pull-right">Live example</a>
            <span class="request">POST /payment_methods</span>
        </div>

        <h2>Our payload</h2>
        <div class="payload">
            <pre><code class="json">{{ App\Helpers\Code::payload('payment_methods') }}</code></pre>
        </div>

        <h2>Your response</h2>
        <div class="response">
            <pre><code class="json">{{ App\Helpers\Code::response('payment_methods') }}</code></pre>
        </div>
    </div>

    <p>
        When a customer reaches the payment method step in the checkout, we'll call your endpoint to fetch the available payment methods. The request contains an extensive payload with all relevant information about the customer, the products he is buying, and the shipment method that was chosen. Based on this information you can decide which payment methods should be available.
    </p>

    <p>Now you'll respond with a valid json document that contains a field <code>payment_methods</code>. This field is an array with all available payment methods. Each payment method must consist of a unique identifier, a title, an icon, and a price.</p>

    <p>When one of your payment methods has been chosen and the checkout is finished, we'll call your endpoint again.</p>

    <p><a href="#the-payment-process">Read more about the payment process</a>.</p>
</div>

<hr />

<div class="section clearfix">
    <h1 id="the-payment-process">The payment process</h1>
    <div class="code visible-lg visible-md">
        <div class="header clearfix">
            <span class="request">POST /payment</span>
        </div>

        <h2>Our payload</h2>
        <div class="payload">
            <pre><code class="json">{{ App\Helpers\Code::payload('payment') }}</code></pre>
        </div>

        <h2>Your response</h2>
        <div class="response">
            <pre><code class="json">{{ App\Helpers\Code::response('payment') }}</code></pre>
        </div>
    </div>

    <p>
        If the customer has selected one of your payment methods, we will call your endpoint when he confirms the purchase. The request contains all relevant information about the customer and his order.
    </p>

    <p>Based on the payment method the customer might need to pay on your platform. Therefore you can reply with a <code>payment_url</code> in the response. If this is present we'll redirect the customer to this url. If you do not provide a payment url we will send the customer to the regular thank you page and the order has not yet been paid.</p>

    <p>In the initial request we have send you two urls. When the customer is done on your platform you send him to the provided <code>redirect_url</code>. Some payments take longer to process, in these cases you can notify us about the payment status through the <code>webook_url</code> as provided in the request.</p>
</div>

<hr />

<div class="section clearfix">
    <h1 id="verify-the-payment-status">Verify the payment status</h1>

    <div class="code visible-lg visible-md">
        <div class="header clearfix">
            <a href="{{ url('payment/3161') }}" target="_blank" class="preview pull-right">Live example</a>
            <span class="request">GET /payment/{order_id}</span>
        </div>

        <h2>Your response</h2>
        <div class="response">
            <pre><code class="json">{{ App\Helpers\Code::response('payment_status') }}</code></pre>
        </div>
    </div>

    <p>
        After you redirect the customer back to the <code>redirect_url</code>, we'll have to verify the status of the payment. We do this by performing a GET request to your endpoint based on the order id. In the response you can reply with a <code>status</code>, that can either be paid, unpaid, or cancelled.
    </p>

    <p>When the payment has been cancelled we give the customer the option to choose another payment method. At this point we'll call your endpoint again to fetch the available payment methods and the cycle may repeat itself.</p>

    <p>If the order has been paid or unpaid we send the customer to the thank you page. The order has now been completed. In this case we see unpaid as may-be-paid-later. If this is not the case then send us the status cancelled so we can let the customer pay again through another payment method.</p>
</div>

<hr />

<div class="section clearfix">
    <img src="{{ asset('images/Bitmap2x.png') }}" width="271" alt="" class="pull-right">

    <h1 id="give-it-a-spin">Give it a spin</h1>

    <p>We have set up a demo shop with this external service integrated. The methods as seen in the request <a href="{{ url('shipment_methods') }}">/shipment_methods</a> and <a href="{{ url('payment_methods') }}">/payment_methods</a> will show up in the checkout.</p>
    <p>Try ordering something with the SEOcoin payment method and see how we redirect the user, and back.</p>
    <p>
        <a class="button" href="http://hidde.webshopapp.net" target="_blank">Give it a spin</a>
        <a class="button" href="https://github.com/Vugario/External-Services" target="_blank">Check the code</a>
    </p>
</div>

@endsection()
