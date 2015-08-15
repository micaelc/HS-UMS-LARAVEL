<!DOCTYPE html>
<htm>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASACPT - Login</title>

    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/back.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-body">
                    <form class="form-signin" method="POST" action="/auth/login">
                        {!! csrf_field() !!}
                        <div id="logoplace"><img id="logocompany" src="../img/dummy_logo.png"></div>
                        <fieldset>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="Email address" required autofocus value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="Password" required>
                            </div>
                            <div>
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="remember-me"> Remember me
                                </label>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Vendor.js -->
<script src="{{ asset('/js/jquery.js') }}"></script>
<script src="{{ asset('/js/bootstrap.js') }}"></script>

</body>

</htm>