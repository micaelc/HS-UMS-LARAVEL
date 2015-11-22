<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script>

	</script>
</head>

<body>

<div id="container" style="width: 500px; margin: 0 auto; padding-top: 50px;">
	<div>
		<img id="logocompany" src="{{url('/')}}/img/dummy_logo.png">
	</div>
	<div style="">
		Dear {{$user->firstName}} {{$user->lastName}}
		Click here to reset your password: {{ url('password/reset/'.$token) }}
	</div>
	<div>
		<a href="{{ url('password/reset/'.$token) }}" class="btn-primary">Click here to reset your password</a>
	</div>
</div>


</body>
</html>


