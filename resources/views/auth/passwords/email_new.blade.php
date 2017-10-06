<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>New Forgot Password</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
<div class="wrapper">
	<div class="panel panel-default">
		<div class="container condes" id="forgotPart">
			<h1>Forgot password emailnew</h1>
			<div class="panel-body">
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
				<form class="form-horizontal form" method="POST" action="{{ route('password.email') }}">
					{{ csrf_field() }}
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<p>When you fill in your registered email address, you will be sent instructions on how to reset your password.<br></br></p>
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="email address" required>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">
							Send Password Reset Link
						</button>
					</div>
					<div class="etc-login-form">
						<p>already have an account? <a href="{{ URL::action('CommandController@index') }}">Login here</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
	
</div>
 
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="{{ asset('js/index.js') }}"></script>
  
  
</body>
</html>
