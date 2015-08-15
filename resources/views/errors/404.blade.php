<!DOCTYPE html>
<html>
<head>
    <title>404 - Page not found</title>
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
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
            font-family: 'Lato';
            font-size: 72px;
            margin-bottom: 40px;
        }

        .subtitle {
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
            font-size: 40px;
            margin-bottom: 20px;
        }

        .message {
            font-family: 'Ubuntu', Helvetica, Arial, sans-serif;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Oops!!</div>
        <div class="subtitle">404 - Page not found</div>
        <div class="message">Sorry, and error has occurred, Requested page was not found!</div>
        <div><a class="btn btn-default" href="{{route('home')}}">Take me Home!</a></div>
    </div>
</div>
</body>
</html>