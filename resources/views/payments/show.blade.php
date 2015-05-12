<html>
<head>
    <title>Laravel</title>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
            margin-bottom: 40px;
        }

        .quote {
            font-size: 24px;
        }

        .quote a {
            text-decoration: none;
        }

        .yes {
            color: #62DE83;
        }

        .no {
            color: #FC7272;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Transaction #{{ $transaction->id }}</div>
        <div class="quote">
            <a href="{{ url('payment/pay/'.$transaction->id.'/paid') }}" class="yes">Yes I pay</a> -
            <a href="{{ url('payment/pay/'.$transaction->id.'/cancelled') }}" class="no">No pay</a>
        </div>
    </div>
</div>
</body>
</html>
