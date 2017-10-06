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
		<h1>Reset Password</h1>
			<div class="panel-body">
				<form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
					{{ csrf_field() }}

					<input type="hidden" name="token" value="{{ $token }}">

					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Email address" required autofocus>
						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
					
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						
						<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
					
					<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
						
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
						@if ($errors->has('password_confirmation'))
							<span class="help-block">
								<strong>{{ $errors->first('password_confirmation') }}</strong>
							</span>
						@endif
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary">
							Reset Password
						</button>
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
