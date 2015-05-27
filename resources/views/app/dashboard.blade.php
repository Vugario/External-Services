@extends('app')

@section('content')

<div class="intro">
    <p>Welcome to the External Services demo.</p>
    <a href="{{ url('/') }}" target="_blank" class="btn btn-lg btn-default">Read documentation</a>

    <a class="muted" href="#installed-services">See the installed services</a>
</div>

<hr style="margin-top: 0;" />

<div class="section clearfix">
    <h1 id="installed-services">The installed services</h1>

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

@endsection()
