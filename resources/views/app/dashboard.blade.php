@extends('app')

@section('content')

<div class="intro">
    <p>Welcome to the External Services demo.</p>
    <a href="{{ url('/') }}" target="_blank" class="btn btn-lg btn-default">Read documentation</a>

    <div class="clearfix"></div>

    <a class="muted" href="#installed-services" style="display: inline-block;">See the installed services</a>
    or
    <a class="muted" href="#test-the-integration" style="display: inline-block;">test the integration</a>
</div>

<hr style="margin-top: 0;" />

<div class="section clearfix">
    <h1 id="installed-services">The installed external services</h1>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Name</th>
                <th>Endpoint</th>
                <th>Active</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($external_services as $external_service)
                <tr>
                    <td>{{ $external_service['id'] }}</td>
                    <td>{{ $external_service['type'] }}</td>
                    <td>{{ $external_service['name'] }}</td>
                    <td>{{ $external_service['urlEndpoint'] }}</td>
                    <td>{{ $external_service['isActive'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<hr>

<div class="section clearfix">
    <img src="{{ asset('images/Bitmap2x.png') }}" width="271" alt="" class="pull-right">
    
    <h1 id="test-the-integration">Test the integration</h1>
    <p>The external services were created. Now if you go to your shop and enter the checkout you'll see that there are shipping methods and payment methods that are fetched in realtime from this sample app. Given that this application runs in a publicly available HTTPS environment.</p>
    <p><a href="http://{{ $shop['mainDomain'] }}/" target="_blank">Visit {{ $shop['mainDomain'] }}</a></p>
</div>

@endsection()
