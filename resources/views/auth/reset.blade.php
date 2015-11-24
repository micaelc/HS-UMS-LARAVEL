<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>ASACPT - Login</title>

	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/login.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

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
					<form method="POST" action="/password/reset">
						{!! csrf_field() !!}
						<input type="hidden" name="token" value="{{ $token }}">

						<div id="logoplace" class="clearfix">
							<img id="logocompany" src="/img/dummy_logo.png">

							<div id="page-item">{{trans('back.pages.resetPassword')}}</div>
						</div>
						<fieldset>
							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control"
								       placeholder="{{ trans('back.login.email-address') }}" required autofocus
								       value="{{ old('email') }}">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control"
								       placeholder="{{ trans('back.login.password') }}" required>
							</div>
							<div class="form-group">
								<input type="password" name="password_confirmation" id="password_confirmation"
								       class="form-control"
								       placeholder="{{ trans('back.login.confirmPassword') }}" required>
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
							<button class="btn btn-primary btn-lg btn-block"
							        type="submit">{{ trans('back.actions.reset') }}</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- Vendor.js -->
<script src="{{ asset('/js/jquery.js') }}"></script>
<!-- Toaster JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>{!! Toastr::render() !!}
</body>

</html>