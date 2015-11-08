<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Micael Campos">
	<meta name="_token" content="{!! csrf_token() !!}"/>

	<title>BASE Project - ADMIN - {{ $title }}</title>
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/back.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.1.0/metisMenu.min.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<div id="wrapper">

	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{route('admin:admin')}}"><img src="/img/dummy_logo_admin.png"></a>
		</div>
		<!-- /.navbar-header -->

		<ul class="nav navbar-top-links navbar-right">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i><strong> {{ Auth::user()->firstName }} {{ Auth::user()->lastName }} </strong><i
							class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li>
						@if(Auth::user()->can(Config::get('permissions.user.profile_edit')))
							<a href="{{ route('users.show', Auth::id()) }}"><i
										class="fa fa-user fa-fw"></i>{{ trans('back.user-profile') }}</a>
						@elseif(Auth::user()->can(Config::get('permissions.user.profile_view')))
							<a href="{{ route('users.show', Auth::id()) }}"><i
										class="fa fa-user fa-fw"></i>{{ trans('back.user-profile') }}</a>
						@endif
					</li>
					<li class="divider"></li>
					<li>
						<a href="{{ url('/auth/logout') }}"><i
									class="fa fa-sign-out fa-fw"></i>{{ trans('back.logout') }}</a>
					</li>
				</ul>
				<!-- /.dropdown-user -->
			</li>
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->
		@include('back.sidebar')

	</nav>

	@yield('content')

</div>
<!-- /#wrapper -->

<!-- Vendor.js -->
<script src="{{ asset('/js/jquery.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Toaster JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- Metis Menu JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.1.0/metisMenu.min.js"></script>
<!-- Custom JavaScript -->
<script src="{{ asset('/js/back.js') }}"></script>
{!! Toastr::render() !!}

</body>

</html>
